

<?php

$Route->add('/admin', function () {
	$Core = new Apps\Core;
	$Template = new Apps\Template('/admin/login');
	$Template->addheader("admin.layouts.header");
	$Template->addfooter("admin.layouts.footer");
	$Template->assign("title", "Antthill.Admin");
	$Template->assign("Activities", $Core->AdminListVisitors());
	$Template->assign("expanded", false);
	$Template->render("admin.admin");
}, 'GET');


$Route->add('/admin/login', function () {
	$Template = new Apps\Template;
	$MysqliDb = new Apps\MysqliDb;
	$uninstalled = [];
	$sql_list = ['accounts', 'activities', 'pages', 'settings', 'cms', 'webparts'];
	foreach ($sql_list as $sql) {
		if (!(int)$MysqliDb->tableExists($sql)) {
			$uninstalled[] = $sql;
		}
	}
	if (count($uninstalled)) {
		$Template->assign("title", "Setup Database");
		$Template->assign("uninstalled", $uninstalled);
		$Template->render("admin.setup");
	} else {
		$Template->assign("title", "Admin: Login");
		$Template->render("admin.login");
	}
}, 'GET');



$Route->add('/admin/{route}', function ($route) {

	$Core = new Apps\Core;
	$Template = new Apps\Template("/admin/login");
	$Template->addheader("admin.layouts.header");
	$Template->addfooter("admin.layouts.footer");
	$Template->assign("title", "Anthill Pro Admin");

	if ($route == "pages") {
		$Template->assign("title", "Manage Pages");
		$Template->assign("pages", $Core->LoadPages());
	} elseif ($route == "add-page") {
		$Template->assign("title", "Add New Page");
		$Template->assign("parents", $Core->LoadParentMenus());
	} elseif ($route == "visitors") {
		$Template->assign("title", "Website Visitors");
		$Template->assign("Activities", $Core->AdminListVisitors());
	} elseif ($route == "settings") {
		$Template->assign("title", "Website Settings");
		$Template->assign("SiteInfos", $Core->SiteInfos());
	} elseif ($route == "profile") {
		$Template->assign("title", "User Profile");
	} elseif ($route == "webparts") {
		$Template->assign("title", "View Webparts");
		$directory = './templates/webparts/';
		$WebParts = array_diff(scandir($directory), array('..', '.'));
		$Template->assign("WebParts", $WebParts);
	}
	$Template->assign("expanded", true);
	$Template->render("admin.routes.{$route}");
}, 'GET');




$Route->add('/admin/page-webparts/page/{pageid}/add/{webpart}', function ($pageid, $webpart) {
	$Core = new Apps\Core;
	$Template = new Apps\Template("/admin/login");
	$PageInfo = $Core->PageInfo($pageid);
	$CheckWebParts = $Core->CheckWebParts($pageid, $webpart);
	if (!$CheckWebParts) {
		$Db = new Apps\MysqliDb;
		$Db->insert("webparts", [
			"page" => $pageid,
			"webpart" => $webpart,
		]);
		$Template->setError("Web Part Added to the Page successfully", "success", "/admin/page-webparts/page/{$pageid}/{$PageInfo->shortname}");
		$Template->redirect("/admin/page-webparts/page/{$pageid}/{$PageInfo->shortname}");
	} else {
		$Template->setError("Web Part was not added, it probably already existed", "danger", "/admin/page-webparts/page/{$pageid}/{$PageInfo->shortname}");
		$Template->redirect("/admin/page-webparts/page/{$pageid}/{$PageInfo->shortname}");
	}
}, 'GET');


$Route->add('/admin/page-webparts/page/{pageid}/remove/{webpart}/{webpartid}', function ($pageid, $webpart, $webpartid) {
	$Core = new Apps\Core;
	$Template = new Apps\Template("/admin/login");
	$PageInfo = $Core->PageInfo($pageid);
	$CheckWebParts = $Core->CheckWebParts($pageid, $webpart);
	if ($CheckWebParts) {

		$Db = new Apps\MysqliDb;
		$Db->where("page", $pageid)->where("webpart", $webpart)->delete("webparts", 1);

		$Db->where("pageid", $pageid)->where("webpart", $webpartid)->delete("cms");

		$Template->setError("Web Part deleted from the Page successfully", "success", "/admin/page-webparts/page/{$pageid}/{$PageInfo->shortname}");
		$Template->redirect("/admin/page-webparts/page/{$pageid}/{$PageInfo->shortname}");
	} else {
		$Template->setError("Web Part was not deleted, it probably deosn't exist", "danger", "/admin/page-webparts/page/{$pageid}/{$PageInfo->shortname}");
		$Template->redirect("/admin/page-webparts/page/{$pageid}/{$PageInfo->shortname}");
	}
}, 'GET');


$Route->add('/admin/{route}/page/{pid}/{shortname}', function ($route, $pid, $shortname) {

	$Core = new Apps\Core;
	$Template = new Apps\Template("/admin/login");

	$Template->addheader("admin.layouts.header");
	$Template->addfooter("admin.layouts.footer");
	$Template->assign("title", "Anthill Pro Admin");

	$Template->assign("pid", $pid);
	$Template->assign("shortname", $shortname);

	if ($route == "edit-page") {

		$Template->assign("title", "Edit page");

		$parents = $Core->LoadParentMenus();
		$pageinfo = $Core->LoadPageInfo($shortname);
		$Template->assign("pageinfo", $pageinfo);
		$Template->assign("parents", $parents);

		$cat = json_decode($pageinfo->categories);

		$Template->assign("cat", $cat);
	} elseif ($route == "delete-page") {
		$Template->assign("title", "Delete Page");

		$pageinfo = $Core->LoadPageInfo($shortname);
		$Template->assign("pageinfo", $pageinfo);
	} elseif ($route == "webparts") {

		$Template->assign("title", "List Webparts");

		$pageinfo = $Core->LoadPageInfo($shortname);
		$Template->assign("pageinfo", $pageinfo);
	} elseif ($route == "page-webparts") {
		$Template->assign("title", "Add/Remove Webparts");
		$directory = './templates/webparts/';
		$WebParts = array_diff(scandir($directory), array('..', '.'));
		$Template->assign("WebParts", $WebParts);
		$pageinfo = $Core->LoadPageInfo($shortname);
		$Template->assign("pageinfo", $pageinfo);
	}
	$Template->assign("expanded", true);
	$Template->render("admin.routes.{$route}");
}, 'GET');





























$Route->add('/ajax/{cmd}', function ($cmd) {

	$Core = new Apps\Core;
	$Template = new Apps\Template;
	$accid = $Template->storage("accid");
	$UserInfo = $Core->UserInfo($accid);

	if ($cmd == 'profile') {
		$Post = $Core->post($_POST);

		$password = $UserInfo->password;
		if (strlen($Post->password1) > 4 && strlen($Post->password2) > 4) {
			if ($Post->password1 === $Post->password2) {
				$password = $Post->password1;
			}
		}

		$Db = new Apps\MysqliDb;
		$Db->where("accid", $accid);
		$done = $Db->update("accounts", [
			"firstname" => $Post->firstname,
			"lastname" => $Post->lastname,
			"email" => $Post->email,
			"mobile" => $Post->mobile,
			"password" => $password
		]);

		$Template->redirect("/admin/profile");
		
	} elseif ($cmd == 'add-page') {

		$Post = $Core->post($_POST);

		$category = array();
		if (isset($Post->category)) {
			$category = $Post->category;
		}

		$category = json_encode($category);
		$parent = $Post->parent;
		$title = $Post->title;
		$pagestyle = $Post->type;
		$menutitle = $Post->menutitle;
		$sort = $Post->sort;

		$showheader = 0;
		if (isset($Post->showheader)) {
			$showheader = 1;
		}
		$showfooter = 0;
		if (isset($Post->showfooter)) {
			$showfooter = 1;
		}

		$Slugify = new Cocur\Slugify\Slugify();
		$shortname = $Slugify->slugify($menutitle);
		$photos = "";

		if (isset($_FILES['newsphoto'])) {
			$handle = new Verot\Upload\Upload($_FILES['newsphoto']);
			$path = "{$Template->store}images/pages/{$shortname}/";
			if ($handle->uploaded) {
				$handle->file_new_name_body	= md5(time());
				$handle->image_resize	= true;
				$handle->image_x	= 120;
				$handle->image_ratio_y	= true;
				$handle->process($path);
				if ($handle->processed) {
					$photos = "{$path}{$handle->file_dst_name}";
					$handle->clean();
				} else {
					echo 'error : ' . $handle->error;
				}
			}
		}

		$Db = new Apps\MysqliDb;
		$done = $Db->insert("pages", [
			"shortname" => $shortname,
			"categories" => $category,
			"parent" => $parent,
			"pagestyle" => $pagestyle,
			"title" => $title,
			"menutitle" => $menutitle,
			"sort" => $sort,
			"showheader" => $showheader,
			"showfooter" => $showfooter,
			"photo" => $photos
		]);
		$Template->redirect("/admin/pages");
	} elseif ($cmd == 'edit-page') {

		$Post = $Core->post($_POST);
		$pageid = $Post->pageid;
		$PageInfo = $Core->PageInfo($pageid);

		$category = array();
		if (isset($Post->category)) {
			$category = $Post->category;
		}

		$category = json_encode($category);

		$parent = $Post->parent;
		$rootpage = $Core->getSiteInfo('defaultlandingpage');
		if ($pageid == $rootpage) {
			$parent = 0;
		}
		$title = $Post->title;
		$pagestyle = $Post->type;
		$menutitle = $Post->menutitle;
		$sort = $Post->sort;

		$showheader = 0;
		if (isset($Post->showheader)) {
			$showheader = 1;
		}
		$showfooter = 0;
		if (isset($Post->showfooter)) {
			$showfooter = 1;
		}

		$Slugify = new Cocur\Slugify\Slugify();

		$shortname = $PageInfo->shortname;
		$new_shortname = $Slugify->slugify($menutitle);
		if ($shortname <> $new_shortname) {
			$shortname = $new_shortname;
		}
		$photos = "";

		if (isset($_FILES['newsphoto'])) {
			$handle = new Verot\Upload\Upload($_FILES['newsphoto']);
			$path = "{$Template->store}images/pages/{$shortname}/";
			if ($handle->uploaded) {
				$handle->file_new_name_body	= md5(time());
				$handle->image_resize	= true;
				$handle->image_x	= 120;
				$handle->image_ratio_y	= true;
				$handle->process($path);
				if ($handle->processed) {
					$photos = "{$path}{$handle->file_dst_name}";
					$handle->clean();
				} else {
					echo 'error : ' . $handle->error;
				}
			}
		}

		$Db = new Apps\MysqliDb;
		$Db->where("pageid", $pageid);
		$done = $Db->update("pages", [
			"shortname" => $shortname,
			"categories" => $category,
			"parent" => $parent,
			"pagestyle" => $pagestyle,
			"title" => $title,
			"menutitle" => $menutitle,
			"sort" => $sort,
			"showheader" => $showheader,
			"showfooter" => $showfooter,
			"photo" => $photos
		]);

		if ($PageInfo->pagestyle == "blog") {
			$Db->where("pageid", $pageid);
			$done = $Db->update("pages", [
				"content" => $Post->contents
			]);
		}

		$Template->redirect("/admin/edit-page/page/{$pageid}/{$shortname}");
	} elseif ($cmd == 'delete-page') {

		$Post = $Core->post($_POST);

		$pid = $Post->pageid;
		$Db = new Apps\MysqliDb;

		$defaultlandingpage = $Db->where("name", "defaultlandingpage")->getOne("settings");
		$defaultlandingpage = $defaultlandingpage['value'];

		$Db->where("pageid", $pid)->where("pageid", $defaultlandingpage, "!=")->delete("pages", 1);

		$Template->redirect("/admin/pages");
	} elseif ($cmd == 'settings') {

		$Post = $Core->post($_POST);
		$SiteInfos = $Core->SiteInfos();
		while ($site = mysqli_fetch_object($SiteInfos)) {
			$_name = $site->name;
			$Core->setSiteInfo("{$site->name}", $Post->$_name);
		}
		$Template->redirect("/admin/settings");
	}
}, 'POST');





$Route->add('/admin/forms/login', function () {
	$Template = new Apps\Template;
	$Model = new Apps\Model;
	$MysqliDb = new Apps\MysqliDb;
	$data = $Model->post($_POST);
	$Login = $MysqliDb->where("email", $data->email)->where("password", $data->password)->getOne("accounts", "accid");
	if (isset($Login['accid'])) {
		$accid = $Login['accid'];
		$Template->authorize($accid);
		$Template->redirect("/admin");
	}
	$Template->redirect("/admin/login");
}, 'POST');


$Route->add('/admin/forms/setup', function () {
	$Template = new Apps\Template;
	$Model = new Apps\Model;
	$data = $Model->post($_POST);
	$query = file_get_contents("./templates/admin/install/sql/db.sql");
	$query .= "INSERT INTO `accounts` (`email`, `password`, `firstname`, `lastname`, `is_admin`) VALUES ('$data->email','$data->secure','Anthill','Admin',1);";
	$installed = (int)$Model->multi_sql($query);
	if ($installed) {
		$Template->redirect("/admin");
	}
	$Template->redirect("/admin/login");
}, 'POST');



$Route->add('/auth/logout', function () {
	$Template = new Apps\Template;
	$Template->expire();
	$Template->redirect("/admin");
}, 'GET');
