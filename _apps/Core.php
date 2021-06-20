<?php

//Write your custome class/methods here
namespace Apps;

use \Apps\MysqliDb;
use \Apps\Session;
use \Verot\UploadFiles;

class Core extends Model
{

	public $token = NULL;
	public $accid = NULL;
	public $toast = false;

	public function __construct()
	{
		parent::__construct();
	}

	public function GenPassword($length = 6)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function Passwordify($password)
	{
		$Passwordify = md5($password);
		return $Passwordify;
	}

	public function ToMoney($amount)
	{
		$amount = number_format($amount, 2, ".", ",");
		return "₦ " . $amount;
	}


	public function cleanup($text)
	{
		$text = preg_replace('/[\t\n\r\0\x0B]/', '', $text);
		$text = preg_replace('/([\s])\1+/', ' ', $text);
		$text = trim($text);
		return strtolower($text);
	}

	public function PostType($haystack, $i = "i", $word = "W")
	{
		$needle_need = "i need";
		$needle_have = "i have";
		if (strtoupper($word) == "W") {   // if $word is "W" then word search instead of string in string search.
			if (preg_match("/\b{$needle_need}\b/{$i}", $haystack)) {
				return "buying";
			}
			if (preg_match("/\b{$needle_have}\b/{$i}", $haystack)) {
				return "selling";
			}
		} else {
			if (preg_match("/{$needle_need}/{$i}", $haystack)) {
				return "buying";
			}
			if (preg_match("/{$needle_have}/{$i}", $haystack)) {
				return "selling";
			}
		}
		return "others";
		// Put quotes around true and false above to return them as strings instead of as bools/ints.
	}

	public function Login($username, $password)
	{
		$Login = mysqli_query($this->dbCon, "select * from accounts where email='$username' AND password='$password'");
		$Login = mysqli_fetch_object($Login);
		return $Login;
	}

	
	public  function UserInfo($username)
	{
		$UserInfo = mysqli_query($this->dbCon, "SELECT * FROM accounts WHERE email='$username' OR accid='$username'");
		$UserInfo = mysqli_fetch_object($UserInfo);
		return $UserInfo;
	}

	public static function slugify($string)
	{
		$table = array(
			'Š' => 'S', 'š' => 's', 'Đ' => 'Dj', 'đ' => 'dj', 'Ž' => 'Z', 'ž' => 'z', 'Č' => 'C', 'č' => 'c', 'Ć' => 'C', 'ć' => 'c',
			'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
			'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O',
			'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss',
			'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
			'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o',
			'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b',
			'ÿ' => 'y', 'Ŕ' => 'R', 'ŕ' => 'r', '/' => '-', ' ' => '-',','=>'', '&' => 'and'
		);
		// -- Remove duplicated spaces
		$stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/', '/[^a-z0-9]/i'), ' ', $string);
		// -- Returns the slug
		
		return strtolower(strtr($string, $table));
	}




	
	public function LoadPages()
	{
		return mysqli_query($this->dbCon, "SELECT * FROM pages ORDER BY sort ASC");
	}

	public function CountMenuPages()
	{
		$rootpage = $this->getSiteInfo('defaultlandingpage');
		$this->sql("select pageid from pages where parent='{$rootpage}'");
		return $this->countAffected();
	}
	public function LoadSubMenus($shn)
	{
		return mysqli_query($this->dbCon, "select * from pages where parent='$shn'");
	}

	public function CountSubMenus($shn)
	{
		$this->sql("select pageid from pages where parent='$shn'");
		return $this->countAffected();
	}

	public function LoadParentMenus()
	{
		$rootpage = $this->getSiteInfo('defaultlandingpage');
		$result = mysqli_query($this->dbCon, "SELECT * FROM  pages WHERE parent='{$rootpage}' ORDER BY sort ASC");
		return $result;
	}


	public  function SiteInfos()
	{
		$SiteInfos = mysqli_query($this->dbCon, "SELECT * FROM settings");
		return $SiteInfos;
	}

	public  function getSiteInfo($name)
	{
		$getSiteInfo = mysqli_query($this->dbCon, "SELECT value FROM settings WHERE name='$name'");
		$getSiteInfo = mysqli_fetch_object($getSiteInfo);
		return $getSiteInfo->value;
	}

	public  function setSiteInfo($name, $value)
	{
		mysqli_query($this->dbCon, "UPDATE settings SET value='$value' WHERE name='$name'");
		return $this->countAffected();
	}


	function LoadSiteInfo($appid)
	{
		$results = mysqli_query($this->dbCon, "select * from siteinfo where appid='$appid' LIMIT 0,1");
		$result = mysqli_fetch_object($results);
		return $result;
	}






























	






	public  function setWebPartInfo($webpartid, $name, $value)
	{
		mysqli_query($this->dbCon, "UPDATE webparts SET `$name`='$value' WHERE id='$webpartid'");
		return $this->countAffected();
	}

	public  function WebPartHeader($phpfile = "")
	{
		$PHPfile = file_get_contents($phpfile);
		preg_match('/^Name:[^\r\n]*/m', $PHPfile, $matches);
		$result = explode(":", $matches[0]);
		return $result[1];
	}

	public function CheckWebParts($pageid,$webpart)
	{
		$CheckWebParts = mysqli_query($this->dbCon, "SELECT count(id) AS cnt FROM webparts WHERE page='$pageid' AND webpart='$webpart'" );
		$CheckWebParts = mysqli_fetch_object($CheckWebParts);
		return (int)$CheckWebParts->cnt;
	}

	public function WebPartId($pageid,$webpart)
	{
		$WebPartId = mysqli_query($this->dbCon, "SELECT id FROM webparts WHERE page='$pageid' AND webpart='$webpart'" );
		$WebPartId = mysqli_fetch_object($WebPartId);
		return (int)$WebPartId->id;
	}

	public function CountWebParts($pageid)
	{
		$CountWebParts = mysqli_query($this->dbCon, "SELECT count(id) AS cnt FROM webparts WHERE page='$pageid'" );
		$CountWebParts = mysqli_fetch_object($CountWebParts);
		return (int)$CountWebParts->cnt;
	}

	public function PageWebParts($pageid)
	{
		$PageWebParts = mysqli_query($this->dbCon, "SELECT * FROM webparts WHERE page='$pageid' ORDER BY sort ASC");
		return $PageWebParts;
	}

	public function CountPagedWebParts($webpart)
	{
		mysqli_query($this->dbCon, "SELECT id FROM webparts WHERE webpart='$webpart'");
		return (int) $this->countAffected();
	}


	public function CountPageWebParts($pageid)
	{
		mysqli_query($this->dbCon, "SELECT id FROM webparts WHERE page='$pageid'");
		return (int) $this->countAffected();
	}

	// DATI ADMIN//
	public function setEditable()
	{
		$Template = new Session;
		if ($Template->auth) {
			return ' editable';
		}
		return null;
	}

	public function Editable()
	{
		$Template = new Template;
		if ($Template->auth) {
			return ' editable';
		}
		return null;
	}

	public function AdminListPages()
	{
		$AdminListPages = mysqli_query($this->dbCon, "SELECT * FROM pages WHERE homepage='0' ");
		return $AdminListPages;
	}

	public function AddView($page)
	{
		$AddView = mysqli_query($this->dbCon, "UPDATE pages SET `views` = (`views` + 1) WHERE id='$page'");
		return $this->countAffected();
	}

	public function Articles()
	{
		$Articles = mysqli_query($this->dbCon, "SELECT * FROM pages WHERE type='blog'");
		return $Articles;
	}

	public function ServicePages()
	{
		$ServicePages = mysqli_query($this->dbCon, "SELECT * FROM pages WHERE type='services'");
		return $ServicePages;
	}

	public function Blogs($limit = 0)
	{
		if ($limit) {
			$Blogs = mysqli_query($this->dbCon, "SELECT * FROM pages WHERE type='blog' ORDER BY RAND() LIMIT $limit");
		} else {
			$Blogs = mysqli_query($this->dbCon, "SELECT * FROM pages WHERE type='blog'");
		}
		return $Blogs;
	}

	public  function GetNextSort()
	{
		$GetNextSort = mysqli_query($this->dbCon, "SELECT count(pageid) AS cnt FROM pages");
		$GetNextSort = mysqli_fetch_object($GetNextSort);
		if (isset($GetNextSort->cnt)) {
			return (int) $GetNextSort->cnt + 1;
		}
		return 1;
	}

	public  function HasPages($page)
	{
		$HasPages = mysqli_query($this->dbCon, "SELECT count(pageid) AS cnt FROM pages WHERE parent='$page'");
		$HasPages = mysqli_fetch_object($HasPages);
		return $HasPages->cnt;
	}

	public  function SubPages($parent)
	{
		$SubPages = mysqli_query($this->dbCon, "SELECT * FROM pages WHERE parent='$parent' ORDER BY sort ASC");
		return $SubPages;
	}

	public  function setBG($url)
	{
		$htm = "";
		$htm .= "style=\"background: url({$url}) no-repeat center center / cover;\"";
		return $htm;
	}


	public function Galleries()
	{
		$Galleries = mysqli_query($this->dbCon, "SELECT * FROM photos");
		return $Galleries;
	}


	public  function  GalleryInfo($photoid)
	{
		$GalleryInfo = mysqli_query($this->dbCon, "SELECT * FROM photos WHERE id='$photoid'");
		$GalleryInfo = mysqli_fetch_object($GalleryInfo);
		return $GalleryInfo;
	}


	public function Upload($FileDir, $fileObj, $height = 1000, $width = 1000)
	{
		$handle = new  Upload($fileObj);
		if ($handle->uploaded) {
			$handle->file_new_name_body = sha1($FileDir  . $height .  time());

			$handle->dir_auto_create = true;
			$handle->image_resize	= true;
			$handle->image_y	= $height;
			$handle->image_x	= $width;
			$handle->file_overwrite = true;
			$handle->dir_chmod = 0777;
			$handle->image_ratio = true;

			$handle->process($FileDir);
			if ($handle->processed) {
				return $handle->file_dst_pathname;
				$handle->clean();
			} else {
				return false;
			}
		}
	}


	public function Sliders()
	{
		$Sliders = mysqli_query($this->dbCon, "SELECT * FROM slides");
		return $Sliders;
	}
	public function Products()
	{
		$Products = mysqli_query($this->dbCon, "SELECT * FROM products");
		return $Products;
	}
	public  function ProductInfo($product)
	{
		$ProductInfo = mysqli_query($this->dbCon, "SELECT * FROM products WHERE id='$product'");
		$ProductInfo = mysqli_fetch_object($ProductInfo);
		return $ProductInfo;
	}

	public  function setProductInfo($product, $name, $value)
	{
		mysqli_query($this->dbCon, "UPDATE products SET `$name`='$value' WHERE id='$product'");
		return $this->countAffected();
	}

	public  function SliderInfo($slide)
	{
		$SliderInfo = mysqli_query($this->dbCon, "SELECT * FROM slides WHERE id='$slide'");
		$SliderInfo = mysqli_fetch_object($SliderInfo);
		return $SliderInfo;
	}

	public  function setSliderInfo($slide, $name, $value)
	{
		mysqli_query($this->dbCon, "UPDATE slides SET `$name`='$value' WHERE id='$slide'");
		return $this->countAffected();
	}


	public function Pages()
	{
		$rootpage = $this->getSiteInfo('defaultlandingpage');
		$Pages = mysqli_query($this->dbCon, "SELECT * FROM pages WHERE pagestyle='page' OR type='store' OR pagestyle='newspage' AND parent='{$rootpage}' ORDER BY sort ASC");
		return $Pages;
	}

	public function CatPages($cat)
	{
		$rootpage = $this->getSiteInfo('defaultlandingpage');
		$CatPages = mysqli_query($this->dbCon, "SELECT * FROM pages WHERE categories  LIKE '%$cat%' AND pageid!='{$rootpage}' ORDER BY sort ASC");
		return $CatPages;
	}

	public function CMS($id, $cms)
	{
		$CMS = mysqli_query($this->dbCon, "SELECT count(id) AS cnt FROM cms WHERE id='$id'");
		$CMS = mysqli_fetch_object($CMS);
		if ($CMS->cnt) {
			mysqli_query($this->dbCon, "UPDATE cms SET cms='$cms' WHERE id='$id'");
			if ($this->countAffected()) {
				return "updated";
			}
			return "failed";
		} else {
			mysqli_query($this->dbCon, "INSERT INTO sa_cms(id,cms) VALUES('$id','$cms')");
			if ($this->getLastId()) {
				return "created";
			}
			return "failed";
		}
	}

	public function CMSkey($cmskey,$pageid, $webpart, $cms)
	{

		$Template = new Template;
		$accid = $Template->storage("accid");

		$CMS = mysqli_query($this->dbCon, "SELECT count(id) AS cnt FROM cms WHERE cmskey='$cmskey'");
		$CMS = mysqli_fetch_object($CMS);
		if ($CMS->cnt) {
			mysqli_query($this->dbCon, "UPDATE cms SET cms='$cms',admin='$accid' WHERE cmskey='$cmskey'");
			if ($this->countAffected()) {
				return "updated";
			}
			return "failed";
		} else {
			mysqli_query($this->dbCon, "INSERT INTO cms(cmskey,pageid,webpart,cms,admin) VALUES('$cmskey','$pageid','$webpart','$cms','$accid')");
			if ($this->getLastId()) {
				return "created";
			}
			return "failed";
		}
	}

	function clean($string)
	{
		$string = str_replace('%20', ' ', $string);
		return $string;
	}

	public  function getCMS($page, $part, $id, $deftext = "Please add text")
	{
		$cmskey = "{$page}-{$part}-{$id}";
		$cmsinfo = mysqli_query($this->dbCon, "SELECT `cms` FROM cms WHERE cmskey='$cmskey'");
		$cmsinfo = mysqli_fetch_object($cmsinfo);
		if ($cmsinfo) {
			$sl = (int) strlen( strip_tags($cmsinfo->cms) );
			if ($sl) {
				return $cmsinfo->cms;
			} else {
				return $deftext;
			}
		} else {
			return $deftext;
		}
	}

	public  function cmsinfo($id, $deftext = "Please add text")
	{
		$cmsinfo = mysqli_query($this->dbCon, "SELECT `cms` FROM cms WHERE  id='$id'");
		$cmsinfo = mysqli_fetch_object($cmsinfo);
		if ($cmsinfo) {
			$sl = (int) strlen( strip_tags($cmsinfo->cms) );
			if ($sl) {
				return $cmsinfo->cms;
			} else {
				return $deftext;
			}
		} else {
			return $deftext;
		}
	}

	public  function get_cms($cmskey, $deftext = "Please add text")
	{
		$cmsinfo = mysqli_query($this->dbCon, "SELECT `cms` FROM cms WHERE  cmskey='$cmskey'");
		$cmsinfo = mysqli_fetch_object($cmsinfo);
		if ($cmsinfo) {
			$sl = (int) strlen( strip_tags($cmsinfo->cms) );
			if ($sl) {
				return $cmsinfo->cms;
			} else {
				return $deftext;
			}
		} else {
			return $deftext;
		}
	}



	public function GetParentMenuName($pname)
	{
		$val = '';
		$result = mysqli_query($this->dbCon, "select menutitle,shortname from pages where shortname='$pname' LIMIT 0,1");
		$pnm = mysqli_fetch_array($result);
		$val = $pnm['menutitle'];
		if ($val) {
			return $val;
		} else {
			return "Top Menu (Home)";
		}
	}
	public function LoadPageInfo($shortname)
	{
		$results = mysqli_query($this->dbCon, "select * from pages where shortname='$shortname' OR pageid='$shortname' LIMIT 0,1");
		$result = mysqli_fetch_object($results);
		return $result;
	}
	
	public function PageInfo($shortname)
	{
		$results = mysqli_query($this->dbCon, "select * from pages where shortname='$shortname' OR pageid='$shortname' LIMIT 0,1");
		$result = mysqli_fetch_object($results);
		return $result;
	}
	
	public function DeletePage($pid)
	{
		$result = mysqli_query($this->dbCon, "delete pages.* from pages where pageid='$pid' OR shortname='$pid'");
		return $result;
	}





	public function AdminListVisitors()
	{
		$AdminListVisitors = mysqli_query($this->dbCon, "SELECT * FROM activities");
		return $AdminListVisitors;
	}




}
