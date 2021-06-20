<?php


$Route->add('/ajax/{cmd}', function ($cmd) {

	$Core = new Apps\Core;
	$Template = new Apps\Template;

	if ($cmd == 'login') {

		$Post = $Core->post($_POST);
		$username = $Post->username;
		$password = $Post->password;
		$Login = $Core->Login($username, $password);

		if ((int)$Login->accid) {
			$Template->data['accid'] = true;
			$Template->authorize($Login->accid);

			$Template->setError("Login was successful, welcom back {$Login->surname}", "success", "/myhq");

			$Template->data['myhq_logged_in'] = true;
			$Template->data['myhq_email'] = $username;
			$Template->data['UserInfo'] = $Core->UserInfo($Login->accid);
			$Template->save();
		}

		$Template->redirect("/myhq");
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
		if(isset($Post->showheader)){
			$showheader = 1;
		}
		$showfooter = 0;
		if(isset($Post->showfooter)){
			$showfooter = 1;
		}

		$shortname = $Core->slugify($title);
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
		$done = $Db->insert("noh_pages", [
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
		$Template->redirect("/myhq/pages");
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
		$title = $Post->title;
		$pagestyle = $Post->type;
		$menutitle = $Post->menutitle;
		$sort = $Post->sort;

		$showheader = 0;
		if(isset($Post->showheader)){
			$showheader = 1;
		}
		$showfooter = 0;
		if(isset($Post->showfooter)){
			$showfooter = 1;
		}

		$shortname = $PageInfo->shortname;
		$new_shortname = $Core->slugify($title);
		if ($shortname <> $new_shortname) {
			$shortname = $Core->slugify($title);
		}
		$photos = "";

		if ($_FILES["newsphoto"]['size'] > 0) {
			$handle = new \Verot\Upload\Upload($_FILES["photo"]);
			$handle->image_resize    = true;
			$handle->image_y    = 500;
			$handle->image_x    = 500;
			$FileDir = "{$Template->store}images/pages/{$shortname}/";
			$handle->process($FileDir);
			if ($handle->processed) {
				$photos = $handle->file_dst_pathname;
				$Template->redirect("/admin/gallery/");
				$handle->clean();
			}
		}

		$Db = new Apps\MysqliDb;
		$Db->where("pageid", $pageid);
		$done = $Db->update("noh_pages", [
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
			$done = $Db->update("noh_pages", [
				"excerpt" => $Post->excerpt,
				"content " => $Post->content
			]);
		}

		$Template->redirect("/myhq/edit-page/page/{$pageid}/{$shortname}");
	} elseif ($cmd == 'delete-page') {

		$Post = $Core->post($_POST);

		$pid = $Post->pageid;
		$Db = new Apps\MysqliDb;

		$defaultlandingpage = $Db->where("name", "defaultlandingpage")->getOne("noh_settings");
		$defaultlandingpage = $defaultlandingpage['value'];

		$Db->where("pageid", $pid)->where("pageid", $defaultlandingpage, "!=")->delete("noh_pages", 1);

		$Template->redirect("/myhq/pages");
	} elseif ($cmd == 'add-department') {

		$Post = $Core->post($_POST);

		$department = $Post->department;
		$description = $Post->description;
		$status = $Post->status;

		$added = $Core->AddDepartment($department, $description, $status);
		$Template->redirect("/myhq/departments");
	
	
	} elseif ($cmd == 'add-bed') {

		$Post = $Core->post($_POST);

		$ward = $Post->ward;
		$bed = $Post->bed;
		$status = $Post->status;

		$Db = new Apps\MysqliDb;
		$bedid = $Db->insert("noh_beds", [
			"ward" => $ward,
			"bed" => $bed,
			"enabled" => $status
		]);
		if ($bedid) {
			$Template->setError("A new bed was added successfully", "success", "/myhq/beds");
			$Template->redirect("/myhq/beds");
		}
		$Template->setError("Bed could not be added, try again", "danger", "/myhq/beds");
		$Template->redirect("/myhq/beds");
	
	} elseif ($cmd == 'add-notice') {
	
		$Post = $Core->post($_POST);
		$accid = $Template->storage("accid");

		$title = $Post->title;
		$notice = $Post->notice;
		$startdate = $Post->startdate;
		$enddate = $Post->enddate;
		$status = $Post->status;
		$receipients = json_encode($Post->receipients);


		$Core->Debug($Post);
		
		$Db = new Apps\MysqliDb;
		$notice = $Db->insert("noh_notifications", [
			"title" => $title,
			"notice" => $notice,
			"startdate" => $startdate,
			"enddate" => $enddate,
			"enabled" => $status,
			"receipients" => $receipients,
			"sentby" => $accid
		]);


	} elseif ($cmd == 'add-doctor') {

		$Post = $Core->post($_POST);

		$email = $Post->email;
		$mobile = $Post->mobile;

		$echeck = $Core->UserExists($email);

		if ($echeck) {
			$Template->redirect("/myhq/add-doctor");
		}

		$department = $Post->department;
		$firstname = $Post->firstname;
		$lastname = $Post->lastname;
		$password = $Post->password;
		$dob = $Post->date_of_birth;
		$sex = $Post->sex;
		$department = $Post->department;
		$status = $Post->status;

		$roles = json_encode(array('user', 'doctor'));
		$accid = $Core->AddDoctor($firstname, $lastname, $email, $password, $mobile, $department, $dob, $sex, $status, $roles);

		if (isset($_FILES['picture']) && $accid) {
			$handle = new Verot\Upload\Upload($_FILES['picture']);
			$path = "{$Template->store}images/accounts/{$accid}/";
			if ($handle->uploaded) {
				$handle->file_new_name_body	= md5(time());
				$handle->image_resize	= true;
				$handle->image_x	= 200;
				$handle->image_ratio_y	= true;
				$handle->process($path);
				if ($handle->processed) {
					$photos = "{$path}{$handle->file_dst_name}";
					$Core->SetUserInfo($accid, "profile_photo", $photos);
					$handle->clean();
				} else {
					echo 'error : ' . $handle->error;
				}
			}
		}

		$Template->redirect("/myhq/doctors");

	} elseif ($cmd == 'add-patient') {

		$Post = $Core->post($_POST);
		$mobile = $Post->mobile;

		$roles = json_encode(array('user', 'patient'));

		$accid = $Core->AddPatient($Post->hid, $Post->accesscode, $Post->fn, $Post->ln, $Post->email, $Post->mobile, $Post->date_of_birth, $Post->status, $Post->sex, $roles, $Post->address);

		$Template->redirect("/myhq/patients");

	} elseif ($cmd == 'settings') {

		$Post = $Core->post($_POST);
		$SiteInfos = $Core->SiteInfos();
		while ($site = mysqli_fetch_object($SiteInfos)) {
			$_name = $site->name;
			$Core->setSiteInfo("{$site->name}", $Post->$_name);
		}
		$Template->redirect("/myhq/settings");
	}
}, 'POST');


$Route->add('/form/doctor/{accid}/{action}', function ($accid, $action) {
	$Core = new Apps\Core;
	$Template = new Apps\Template;
	$data = $Core->post($_POST);
	$Db = new Apps\MysqliDb;

	switch ($action) {
		case 'edit':

			$done = (int)$Db->where("accid", $accid)->update("noh_accounts", [
				"firstname" => $data->firstname,
				"lastname" => $data->lastname,
				"department" => $data->department,
				"sex" => $data->sex,
				"enabled" => $data->status,
				"email" => $data->email,
				"dob" => $data->date_of_birth
			]);

			if (isset($_FILES['picture']) && $accid) {
				$handle = new Verot\Upload\Upload($_FILES['picture']);
				$path = "{$Template->store}images/accounts/{$accid}/";
				if ($handle->uploaded) {
					$handle->file_new_name_body	= md5(time());
					$handle->image_resize	= true;
					$handle->image_x = 200;
					$handle->image_ratio_y	= true;
					$handle->process($path);
					if ($handle->processed) {
						$photos = "{$path}{$handle->file_dst_name}";
						$Core->SetUserInfo($accid, "profile_photo", $photos);
						$handle->clean();
					} else {
						echo 'error : ' . $handle->error;
					}
				}
			}

			break;
		case 'delete':
			$del = $Db->where("accid", $accid)->delete("noh_accounts", 1);
			break;
	}
	$Template->redirect("/myhq/doctors");
}, 'POST');



$Route->add('/form/department/{id}/{action}', function ($id, $action) {

	$Core = new Apps\Core;
	$Template = new Apps\Template;
	$data = $Core->post($_POST);
	$Db = new Apps\MysqliDb;
	switch ($action) {
		case 'edit':
			$done = $Db->where("id", $id)->update("noh_departments", [
				"department" => $data->department,
				"description" => $data->description,
				"enabled" => $data->status
			]);
			break;
		case 'delete':
			$del = $Db->where("id", $id)->delete("noh_departments", 1);
			break;
	}
	$Template->redirect("/myhq/departments");
}, 'POST');


$Route->add('/form/bed/{id}/{action}', function ($id, $action) {

	$Core = new Apps\Core;
	$Template = new Apps\Template;
	$data = $Core->post($_POST);
	$Db = new Apps\MysqliDb;
	switch ($action) {
		case 'edit':
			$done = $Db->where("id", $id)->update("noh_beds", [
				"bed" => $data->bed,
				"ward" => $data->ward,
				"inuse" => $data->status
			]);
			break;
		case 'delete':
			$del = $Db->where("id", $id)->delete("noh_beds", 1);
			break;
	}
	$Template->redirect("/myhq/beds");
}, 'POST');


$Route->add('/form/patient/{accid}/{action}', function ($accid, $action) {

	$Core = new Apps\Core;
	$Template = new Apps\Template;
	$data = $Core->post($_POST);
	$DBase = new Apps\MysqliDb;
	switch ($action) {
		case 'edit':
			$done = (int)$DBase->where("accid", $accid)->update("noh_accounts", [
				"firstname" => $data->fn,
				"lastname" => $data->ln,
				"enabled" => $data->status,
				"address" => $data->address,
				"email" => $data->email,
				"sex" => $data->sex,
				"mobile" => $data->mobile,
				"dob" => $data->date_of_birth
			]);
			break;
		case 'delete':
			$del = $DBase->where("accid", $accid)->delete("noh_accounts", 1);
			break;
	}
	$Template->redirect("/myhq/patients");
}, 'POST');
