<?php
/*
CREDITS::
https://www.daggerhart.com/simple-php-template-class/
*/

namespace Apps;

use \Apps\Session;
use \Apps\MysqliDb;
use stdClass;

class Template extends Session
{

	public $installed = false;
	public $MysqliDb = NULL;
	public $Core = NULL;

	public $version = version;
	public $referrer = NULL;

	public $variables = array();
	public $errors = array();

	public $Me = NULL;
	public $ME = NULL;
	public $Self = NULL;
	public $template = NULL;
	public $domain = domain;

	public $folder = "";
	public $root = templates_dir;
	public $templates_dir = templates_dir;
	public $templates_default = templates_default;
	public $templates_default_route = templates_default_route;

	public $public_dir = public_dir;
	public $assets = assets_dir;
	public $adminassets = admin_assets_dir;

	
	public $plugins = plugins_dir;

	public $vendor = vendor_dir;
	public $layouts = layouts_dir;
	public $store = store_dir;
	public $template_file = "";
	public $has_error = false;
	public $error = "";
	public $session = NULL;

	public $output = '';
	public $header_file = '';
	public $footer_file = '';
	public $robots = '';

	public $header_css_html = '';
	public $header_jss_html = '';
	public $header_asset_html = '';

	public $footer_css_html = '';
	public $footer_jss_html = '';
	public $footer_asset_html = '';

	public $header_jss_scripts = '';
	public $header_css_scripts = '';

	public $footer_jss_scripts = '';
	public $footer_css_scripts = '';

	public $tempArr = array();
	public $template_extension = template_file_extension;

	public $UIX = "";
	public $uix = "";
	public $uix_ver = "";
	public $token = NULL;
	public $encrypt_salt = encrypt_salt;

	public $webparts = array();


	public $session_timout = session_timout;
	public $auth = false;
	public $referred = false;
	public $auth_url = auth_url;

	public $config = "";

	public function __construct($auth_url = NULL)
	{

		parent::__construct($auth_url);
		$this->config = $this->GetSettings();

		if (isset($this->data[auth_session_key])) {
			//user is logged in//
			if (isset($this->data['auth_time'])) {
				$s_now = strtotime(date('d-m-Y H:i:s'));
				$s_jvt = strtotime($this->data['auth_time']);
				$s_dif = $s_now - $s_jvt;
				//Check the session
				if ($s_dif <= ($this->session_timout * 60)) {
					$this->store('auth_time', date('d-m-Y H:i:s'));
					$this->auth = true;
					$this->store(auth_session_key, true);
				} else {
					$this->secure = false;
					$this->auth = false;
					$this->expired = (int)$this->expire();
				}
			}
			//user is logged in//
		}

		$this->set_folder($this->templates_dir);
		$config = get_defined_constants(true);

		$config_class = array();
		foreach ($config as $key => $value) {
			$config_class[$key] = $value;
		}

		$this->token = $this->tokenize();
		$this->config = $config_class;
		$this->Core = new Core;
		$this->MysqliDb = new MysqliDb;
		
	}





	public function __call($method, $args)
	{
		$this->MysqliDb->$method($args[0]);
	}


	/**
	 * @param mixed $posted_array 
	 * @return \stdClass 
	 */
	public function post($posted_array)
	{
		$this->form_posted_array = $posted_array;
		$forms = new stdClass;
		if (is_array($posted_array)) {
			foreach ($posted_array as $key => $val) {
				if (is_array($val)) {
					$this->returned_posted_array[$key] = $val;
					$forms->$key = $val;
				} else {
					$this->returned_posted_array[$key] = $val;
					$forms->$key = $val;
				}
			}
			return $forms;
		} else {
			exit('Error: Form not good');
		}
	}

	public function stripSlashesDeep($value)
	{
		$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
		return $value;
	}

	public function removeMagicQuotes()
	{
		$_GET = $this->stripSlashesDeep($_GET);
		$_POST = $this->stripSlashesDeep($_POST);
		$_COOKIE = $this->stripSlashesDeep($_COOKIE);
	}

	public function unregisterGlobals()
	{
		if (ini_get('register_globals')) {
			$array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
			foreach ($array as $value) {
				foreach ($GLOBALS[$value] as $key => $var) {
					if ($var === $GLOBALS[$key]) {
						unset($GLOBALS[$key]);
					}
				}
			}
		}
	}

	public function config($Constantkey = null)
	{
		$config_proc = get_defined_constants(true);
		$config_proc = $config_proc['user'];
		$object = json_decode(json_encode((object) $config_proc), FALSE);
		return $object->$Constantkey;
	}
	public function GetSettings()
	{
		$config_proc = get_defined_constants(true);
		$config_proc = $config_proc['user'];
		$object = json_decode(json_encode((object) $config_proc), FALSE);
		return $object;
	}

	public function debug($data = "Debug::Stoped")
	{
		if (is_array($data)) {
			print_r($data);
		} else {
			print_r($data);
		}
		exit();
	}


	public function authorize($accid = null)
	{
		if (!isset($this->data[auth_session_key])) {
			$this->store('auth_time', date('d-m-Y H:i:s'));
			$this->store('accid', $accid);
			$this->store(auth_session_key, true);
		}
	}

	public function __set($key, $val)
	{
		$this->variables[$key] = $val;
	}

	public function __get($key)
	{
		if (array_key_exists($key, $this->variables)) {
			return $this->variables[$key];
		}
		return false;
	}


	/**
	 * @param mixed $route 
	 * @param mixed $error 
	 * @param string $type // 'success','danger','warning'
	 * @return exit 
	 */
	public function setError($error, $type = 'success', $route = NULL)
	{
		$er_array = array(
			"error" => $error,
			"type" => $type,
			"route" => $route
		);
		$this->store('errors', $er_array);
		return $er_array;
	}

	public function getError()
	{
		$toast = array();
		$_route = $_SERVER['REQUEST_URI'];
		if (isset($this->data['errors'])) {
			$getError = $this->data['errors'];
			if (count($getError)) {
				$_toast = $this->storage("errors");
				$route = $_toast['route'];
				if ($route == $_route) {
					$toast = $_toast;
					$this->store('errors', array());
				}
			}
		}
		return $toast;
	}


	public function Toast()
	{
		$html = "";
		$getError = $this->getError();
		if (count($getError)) {
			$type = $getError['type'];
			$msg =  $getError['error'];
			$html .= "<div class=\"text-center my-4\"><span class=\"text-{$type}\">{$msg}</span></div>";
		}
		return $html;
	}


	public function jsToast()
	{
		$inf = new stdClass;
		$inf->error = false;
		$getError = $this->getError();
		if (count($getError)) {
			$inf->error = true;
			$inf->msg = $getError['error'];
			$type = $getError['type'];
			switch ($type) {
				case 'success':
					$inf->title = "Action Successful";
					break;
				case 'warning':
					$inf->title = "Action Not Successful";
					break;
				case 'danger':
					$inf->title = "Action Failed";
					break;
				default:
					$inf->title = "Oops! something went wrong";
					break;
			}
		}
		return $inf;
	}


	public function set_folder($folder)
	{
		$this->folder = rtrim($folder, '/');
	}

	public function token($dtoken, $redir = "/auth/token")
	{
		$sess = new Session;
		$token = $sess->data['token'];
		$t_tik = $token->tik;
		$d_tik = $dtoken->tik;
		if ($d_tik != $t_tik) {
			$this->redirect("{$redir}?token={$token->token}");
		}
	}

	public function tokenize()
	{
		$otp = md5(sha1(time() . $this->encrypt_salt));
		$tiktok = new \stdClass;
		$html = "";

		$tik = time();
		$tok = sha1($tik . $this->encrypt_salt);
		$token = sha1($tik . $tok . $this->encrypt_salt);

		$html .= "<input type=\"hidden\" name=\"tik\" value=\"{$tik}\" /> \r\n";
		$html .= "<input type=\"hidden\" name=\"tok\" value=\"{$tok}\" /> \r\n";
		$html .= "<input type=\"hidden\" name=\"token\" value=\"{$otp}\" /> \r\n";

		$tiktok->tik = $tik;
		$tiktok->tik = $tik;
		$tiktok->tok = $tok;
		$tiktok->token = $token;

		$this->store("token", $tiktok);

		return $html;
	}



	public function error($error = "")
	{
		$this->error = $error;
		$this->has_error = true;
	}


	public function redirect($url = "/", $error = null, $mode = "sucess")
	{
		if ($error != null) {
			$this->errors = array(
				'route' => $url,
				'error' => $error,
				'mode' => $mode,
			);
			$this->store('errors', $this->errors);
		}
		header("Location: {$url}");
		exit();
	}


	public function render($suggestions, $variables = array())
	{
		$template = $this->search_template($suggestions);
		$this->template_file = $suggestions;
		if ($template) {
			$output = $this->render_template($template, $variables);
		} else {
			$template = $this->search_template($this->templates_default);
			$output = $this->render_template($template, $variables);
		}
		return print($output);
	}

	public function SetupPage($suggestions, $variables = array())
	{

		$pagename = trim(strtolower($suggestions));
		$pagename = preg_replace('/\s+/', '', $pagename);
		$pagetitle = trim($suggestions);
		$pagetitle = str_replace('-', ' ', $pagetitle);
		$pagetitle = ucwords($pagetitle);
		$this->template_file = $suggestions;

		$template = $this->search_template($suggestions);
		if ($template) {
			$info = new \stdClass;
			$info->page = $pagename;
			$info->title = $pagetitle;
			return $info;
		} else {
			//Create dummy template file//
			$page_path = "{$this->templates_dir}";
			if (chmod($page_path, 0777)) {
				$page_save_path = "{$this->templates_dir}{$pagename}.{$this->template_extension}";
				$file = file_put_contents($page_save_path, "");
				$info = new \stdClass;
				$info->page = $pagename;
				$info->title = $pagetitle;
				return $info;
			}
		}
	}


	public function add($template, $show = true)
	{

		$suggestions_arr = explode(".", $template);
		$suggestions_arr_count = (int)count($suggestions_arr);
		$suggestions_arr_count_dir = (int)($suggestions_arr_count - 2);
		$suggestions_arr_count_file = (int)($suggestions_arr_count - 1);
		$suggestions_dir = '';
		for ($i = 0; $i <= $suggestions_arr_count_dir; ++$i) {
			$suggestions_dir .= "{$suggestions_arr[$i]}/";
		}
		$suggestions_dir = rtrim($suggestions_dir, '/');
		$suggestions = $suggestions_arr[$suggestions_arr_count_file];
		if (!is_array($suggestions)) {
			$suggestions = array($suggestions);
		}
		$suggestions = array_reverse($suggestions);
		$found = false;
		foreach ($suggestions as $suggestion) {
			$file = "{$this->folder}/{$suggestions_dir}/{$suggestion}.{$this->template_extension}";
			if (file_exists($file)) {
				if ($show) {
					require $file;
				}
				break;
			}
		}
	}



	public function addpart($template, $variables = array())
	{

		$suggestions_arr = explode(".", $template);
		$suggestions_arr_count = (int)count($suggestions_arr);
		$suggestions_arr_count_dir = (int)($suggestions_arr_count - 2);
		$suggestions_arr_count_file = (int)($suggestions_arr_count - 1);
		$suggestions_dir = '';
		for ($i = 0; $i <= $suggestions_arr_count_dir; ++$i) {
			$suggestions_dir .= "{$suggestions_arr[$i]}/";
		}
		$suggestions_dir = rtrim($suggestions_dir, '/');
		$suggestions = $suggestions_arr[$suggestions_arr_count_file];
		if (!is_array($suggestions)) {
			$suggestions = array($suggestions);
		}
		$suggestions = array_reverse($suggestions);
		$found = false;
		foreach ($suggestions as $suggestion) {
			$file = "{$this->folder}/{$suggestions_dir}/{$suggestion}.{$this->template_extension}";
			if (file_exists($file)) {
				$found = true;
				$this->webparts[] = $file;
				break;
			}
		}
		return $found;
	}

	public function addheader($header)
	{
		$header_arr = explode(".", $header);
		$header_arr_count = (int)count($header_arr);
		$header_arr_count_dir = (int)($header_arr_count - 2);
		$header_arr_count_file = (int)($header_arr_count - 1);
		$header_dir = '';
		for ($i = 0; $i <= $header_arr_count_dir; ++$i) {
			$header_dir .= "{$header_arr[$i]}/";
		}
		$header_dir = rtrim($header_dir, '/');
		$suggestions = $header_arr[$header_arr_count_file];
		if (!is_array($suggestions)) {
			$suggestions = array($suggestions);
		}
		$suggestions = array_reverse($suggestions);
		$found = false;
		foreach ($suggestions as $suggestion) {
			$file = "{$this->folder}/{$header_dir}/{$suggestion}.{$this->template_extension}";
			if (file_exists($file)) {
				$this->header_file = $file;
				break;
			}
		}
	}

	public function addfooter($footer)
	{
		$footer_arr = explode(".", $footer);
		$footer_arr_count = (int)count($footer_arr);
		$footer_arr_count_dir = (int)($footer_arr_count - 2);
		$footer_arr_count_file = (int)($footer_arr_count - 1);
		$footer_dir = '';
		for ($i = 0; $i <= $footer_arr_count_dir; ++$i) {
			$footer_dir .= "{$footer_arr[$i]}/";
		}
		$header_dir = rtrim($footer_dir, '/');
		$suggestions = $footer_arr[$footer_arr_count_file];
		if (!is_array($suggestions)) {
			$suggestions = array($suggestions);
		}
		$suggestions = array_reverse($suggestions);
		$found = false;
		foreach ($suggestions as $suggestion) {
			$file = "{$this->folder}/{$footer_dir}/{$suggestion}.{$this->template_extension}";
			if (file_exists($file)) {
				$this->footer_file = $file;
				break;
			}
		}
	}



	public function assign($arrKey, $arrVal)
	{
		$this->tempArr[$arrKey] = $arrVal;
	}

	public function find_template($suggestions)
	{
		if (!is_array($suggestions)) {
			$suggestions = array($suggestions);
		}
		$suggestions = array_reverse($suggestions);
		$found = false;
		foreach ($suggestions as $suggestion) {
			$file = "{$this->folder}/{$suggestion}.{$this->template_extension}";
			if (file_exists($file)) {
				$found = $file;
				break;
			}
		}
		return $found;
	}


	public function search_template($teplate)
	{

		$template_arr = explode(".", $teplate);
		$template_arr_count = (int)count($template_arr);
		$template_arr_count_dir = (int)($template_arr_count - 2);
		$template_arr_count_file = (int)($template_arr_count - 1);
		$template_dir = '';
		for ($i = 0; $i <= $template_arr_count_dir; ++$i) {
			$template_dir .= "{$template_arr[$i]}/";
		}
		$template_dir = rtrim($template_dir, '/');
		$suggestions = $template_arr[$template_arr_count_file];

		if (!is_array($suggestions)) {
			$suggestions = array($suggestions);
		}
		$suggestions = array_reverse($suggestions);
		$found = false;
		foreach ($suggestions as $suggestion) {
			$file = "{$this->folder}/{$template_dir}/{$suggestion}.{$this->template_extension}";
			if (file_exists($file)) {
				$found = $file;
				break;
			}
		}
		return $found;
	}



	public function render_template($template, $variables)
	{
		ob_start();
		foreach (func_get_args()[1] as $key => $value) {
			${$key} = $value;
		}
		foreach ($this->tempArr as $key => $value) {
			${$key} = $value;
		}

		$ME = $this;
		$Me = $this;
		$me = $this;
		$SELF = $this;
		$Self = $this;
		$self = $this;
		$Template = $this;

		$error = $this->error;
		$has_error = $this->has_error;
		$root = $this->root;
		$assets = $this->assets;
		$adminassets = $this->adminassets;
		$plugins = $this->plugins;
		$token = $this->token;
		$layouts = $this->layouts;
		$store = $this->store;
		$template_file = $this->template_file;
		$public_dir = $this->public_dir;
		$templates_dir = $this->templates_dir;
		$header_files = "";
		$robots = $this->robots;
		$footer_files = "";
		
		$Core = $this->Core;
		$MysqliDb = $this->MysqliDb;

		//Load Config variables//
		$config = $this->config;
		//Load Config variables//

		//Wrap Header//
		if (file_exists($this->header_file)) {
			include $this->header_file;
		}

		foreach ($this->webparts as $partkey => $webpart) {
			if (file_exists($webpart)) {
				include $webpart;
			}
		}

		include func_get_args()[0];

		if (file_exists($this->footer_file)) {
			include $this->footer_file;
		}
		//Wrap Footer//

		return ob_get_clean();
	}
}
