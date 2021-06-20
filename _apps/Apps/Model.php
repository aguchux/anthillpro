<?php

namespace Apps;
use Apps\MysqliDb;

class Model
{

	public $debug = debug;
	public $default_timezone = default_timezone;
	public $offset_timezone = offset_timezone;

	public $session_timout = session_timout;

	public $data = debug;
	public $post = NULL;
	public $get = NULL;
	public $put = NULL;
	public $delete = NULL;
	public $files = NULL;
	public $request = NULL;

	//Database Settings
	public $host = db_host;
	public $user = db_user;
	public $password = db_password;
	public $db = db;

	public $_table = NULL;
	public $_table_key = NULL;
	public $_table_key_val = NULL;
	public $_keyset = array();
	public $_valset = array();
	public $_query = '';
	public $_keystring = array();

	public $key_array = array();
	public $data_array = array();
	public $form_posted_array = array();
	public $returned_posted_array = array();

	//Site Class variables
	public $dbCon = NULL;
	public $dbSel = "";

	public function __construct()
	{

		if (!$this->dbCon = mysqli_connect($this->host, $this->user, $this->password)) {
			exit('<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>Database Connection Error</title>
			</head>
			<body style="background-color:#000000;">
				<div style="width:50%; margin: 15% auto;color:#FFFFFF; text-align:center;">
					<img height="50px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE4LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDU2IDU2IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1NiA1NjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPGc+DQoJCTxwYXRoIHN0eWxlPSJmaWxsOiM1NDVFNzM7IiBkPSJNNDkuNDU1LDhMNDkuNDU1LDhDNDguNzI0LDMuNTM4LDM4LjI4MSwwLDI1LjUsMFMyLjI3NiwzLjUzOCwxLjU0NSw4bDAsMEgxLjV2MC41VjIwdjAuNVYyMXYxMQ0KCQkJdjAuNVYzM3YxMmgwLjA0NWMwLjczMSw0LjQ2MSwxMS4xNzUsOCwyMy45NTUsOHMyMy4yMjQtMy41MzksMjMuOTU1LThINDkuNVYzM3YtMC41VjMyVjIxdi0wLjVWMjBWOC41VjhINDkuNDU1eiIvPg0KCQk8Zz4NCgkJCTxwYXRoIHN0eWxlPSJmaWxsOiMzODQ1NEY7IiBkPSJNMjUuNSw0MWMtMTMuMjU1LDAtMjQtMy44MDYtMjQtOC41VjQ1aDAuMDQ1YzAuNzMxLDQuNDYxLDExLjE3NSw4LDIzLjk1NSw4DQoJCQkJczIzLjIyNC0zLjUzOSwyMy45NTUtOEg0OS41VjMyLjVDNDkuNSwzNy4xOTQsMzguNzU1LDQxLDI1LjUsNDF6Ii8+DQoJCQk8cGF0aCBzdHlsZT0iZmlsbDojMzg0NTRGOyIgZD0iTTEuNSwzMnYwLjVjMC0wLjE2OCwwLjAxOC0wLjMzNCwwLjA0NS0wLjVIMS41eiIvPg0KCQkJPHBhdGggc3R5bGU9ImZpbGw6IzM4NDU0RjsiIGQ9Ik00OS40NTUsMzJjMC4wMjcsMC4xNjYsMC4wNDUsMC4zMzIsMC4wNDUsMC41VjMySDQ5LjQ1NXoiLz4NCgkJPC9nPg0KCQk8Zz4NCgkJCTxwYXRoIHN0eWxlPSJmaWxsOiM1NTYwODA7IiBkPSJNMjUuNSwyOWMtMTMuMjU1LDAtMjQtMy44MDYtMjQtOC41VjMzaDAuMDQ1YzAuNzMxLDQuNDYxLDExLjE3NSw4LDIzLjk1NSw4DQoJCQkJczIzLjIyNC0zLjUzOSwyMy45NTUtOEg0OS41VjIwLjVDNDkuNSwyNS4xOTQsMzguNzU1LDI5LDI1LjUsMjl6Ii8+DQoJCQk8cGF0aCBzdHlsZT0iZmlsbDojNTU2MDgwOyIgZD0iTTEuNSwyMHYwLjVjMC0wLjE2OCwwLjAxOC0wLjMzNCwwLjA0NS0wLjVIMS41eiIvPg0KCQkJPHBhdGggc3R5bGU9ImZpbGw6IzU1NjA4MDsiIGQ9Ik00OS40NTUsMjBjMC4wMjcsMC4xNjYsMC4wNDUsMC4zMzIsMC4wNDUsMC41VjIwSDQ5LjQ1NXoiLz4NCgkJPC9nPg0KCQk8ZWxsaXBzZSBzdHlsZT0iZmlsbDojOTFCQUUxOyIgY3g9IjI1LjUiIGN5PSI4LjUiIHJ4PSIyNCIgcnk9IjguNSIvPg0KCQk8Zz4NCgkJCTxwYXRoIHN0eWxlPSJmaWxsOiM4Njk3Q0I7IiBkPSJNMjUuNSwxN2MtMTMuMjU1LDAtMjQtMy44MDYtMjQtOC41VjIxaDAuMDQ1YzAuNzMxLDQuNDYxLDExLjE3NSw4LDIzLjk1NSw4DQoJCQkJczIzLjIyNC0zLjUzOSwyMy45NTUtOEg0OS41VjguNUM0OS41LDEzLjE5NCwzOC43NTUsMTcsMjUuNSwxN3oiLz4NCgkJCTxwYXRoIHN0eWxlPSJmaWxsOiM4Njk3Q0I7IiBkPSJNMS41LDh2MC41YzAtMC4xNjgsMC4wMTgtMC4zMzQsMC4wNDUtMC41SDEuNXoiLz4NCgkJCTxwYXRoIHN0eWxlPSJmaWxsOiM4Njk3Q0I7IiBkPSJNNDkuNDU1LDhDNDkuNDgyLDguMTY2LDQ5LjUsOC4zMzIsNDkuNSw4LjVWOEg0OS40NTV6Ii8+DQoJCTwvZz4NCgk8L2c+DQoJPGc+DQoJCTxjaXJjbGUgc3R5bGU9ImZpbGw6I0VENzE2MTsiIGN4PSI0Mi41IiBjeT0iNDQiIHI9IjEyIi8+DQoJCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNNDMuOTE0LDQ0bDMuNTM2LTMuNTM2YzAuMzkxLTAuMzkxLDAuMzkxLTEuMDIzLDAtMS40MTRzLTEuMDIzLTAuMzkxLTEuNDE0LDBMNDIuNSw0Mi41ODYNCgkJCWwtMy41MzYtMy41MzZjLTAuMzkxLTAuMzkxLTEuMDIzLTAuMzkxLTEuNDE0LDBzLTAuMzkxLDEuMDIzLDAsMS40MTRMNDEuMDg2LDQ0bC0zLjUzNiwzLjUzNmMtMC4zOTEsMC4zOTEtMC4zOTEsMS4wMjMsMCwxLjQxNA0KCQkJYzAuMTk1LDAuMTk1LDAuNDUxLDAuMjkzLDAuNzA3LDAuMjkzczAuNTEyLTAuMDk4LDAuNzA3LTAuMjkzbDMuNTM2LTMuNTM2bDMuNTM2LDMuNTM2YzAuMTk1LDAuMTk1LDAuNDUxLDAuMjkzLDAuNzA3LDAuMjkzDQoJCQlzMC41MTItMC4wOTgsMC43MDctMC4yOTNjMC4zOTEtMC4zOTEsMC4zOTEtMS4wMjMsMC0xLjQxNEw0My45MTQsNDR6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo=">
					<h1 style="margin-bottom:0px;">Oops, we could not connect to the Database Server</h1>
					<p style="color:yellow;margin-top:0px;">Change your database settings in the <strong style="color:red;">/config/config.php</strong></p>
				</div>
			</body>
			</html>');
		}

		if (!$this->dbSel = mysqli_select_db($this->dbCon, $this->db)) {
			if (!mysqli_query($this->dbCon, "CREATE DATABASE IF NOT EXISTS {$this->db}")) {
				exit('<!DOCTYPE html>
				<html lang="en">
				<head>
					<meta charset="UTF-8">
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<title>Database Selection Error</title>
				</head>
				<body style="background-color:#000000;">
					<div style="width:50%; margin: 15% auto;color:#FFFFFF; text-align:center;">
					<img height="50px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE4LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDU2IDU2IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1NiA1NjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPGc+DQoJCTxwYXRoIHN0eWxlPSJmaWxsOiM1NDVFNzM7IiBkPSJNNDkuNDU1LDhMNDkuNDU1LDhDNDguNzI0LDMuNTM4LDM4LjI4MSwwLDI1LjUsMFMyLjI3NiwzLjUzOCwxLjU0NSw4bDAsMEgxLjV2MC41VjIwdjAuNVYyMXYxMQ0KCQkJdjAuNVYzM3YxMmgwLjA0NWMwLjczMSw0LjQ2MSwxMS4xNzUsOCwyMy45NTUsOHMyMy4yMjQtMy41MzksMjMuOTU1LThINDkuNVYzM3YtMC41VjMyVjIxdi0wLjVWMjBWOC41VjhINDkuNDU1eiIvPg0KCQk8Zz4NCgkJCTxwYXRoIHN0eWxlPSJmaWxsOiMzODQ1NEY7IiBkPSJNMjUuNSw0MWMtMTMuMjU1LDAtMjQtMy44MDYtMjQtOC41VjQ1aDAuMDQ1YzAuNzMxLDQuNDYxLDExLjE3NSw4LDIzLjk1NSw4DQoJCQkJczIzLjIyNC0zLjUzOSwyMy45NTUtOEg0OS41VjMyLjVDNDkuNSwzNy4xOTQsMzguNzU1LDQxLDI1LjUsNDF6Ii8+DQoJCQk8cGF0aCBzdHlsZT0iZmlsbDojMzg0NTRGOyIgZD0iTTEuNSwzMnYwLjVjMC0wLjE2OCwwLjAxOC0wLjMzNCwwLjA0NS0wLjVIMS41eiIvPg0KCQkJPHBhdGggc3R5bGU9ImZpbGw6IzM4NDU0RjsiIGQ9Ik00OS40NTUsMzJjMC4wMjcsMC4xNjYsMC4wNDUsMC4zMzIsMC4wNDUsMC41VjMySDQ5LjQ1NXoiLz4NCgkJPC9nPg0KCQk8Zz4NCgkJCTxwYXRoIHN0eWxlPSJmaWxsOiM1NTYwODA7IiBkPSJNMjUuNSwyOWMtMTMuMjU1LDAtMjQtMy44MDYtMjQtOC41VjMzaDAuMDQ1YzAuNzMxLDQuNDYxLDExLjE3NSw4LDIzLjk1NSw4DQoJCQkJczIzLjIyNC0zLjUzOSwyMy45NTUtOEg0OS41VjIwLjVDNDkuNSwyNS4xOTQsMzguNzU1LDI5LDI1LjUsMjl6Ii8+DQoJCQk8cGF0aCBzdHlsZT0iZmlsbDojNTU2MDgwOyIgZD0iTTEuNSwyMHYwLjVjMC0wLjE2OCwwLjAxOC0wLjMzNCwwLjA0NS0wLjVIMS41eiIvPg0KCQkJPHBhdGggc3R5bGU9ImZpbGw6IzU1NjA4MDsiIGQ9Ik00OS40NTUsMjBjMC4wMjcsMC4xNjYsMC4wNDUsMC4zMzIsMC4wNDUsMC41VjIwSDQ5LjQ1NXoiLz4NCgkJPC9nPg0KCQk8ZWxsaXBzZSBzdHlsZT0iZmlsbDojOTFCQUUxOyIgY3g9IjI1LjUiIGN5PSI4LjUiIHJ4PSIyNCIgcnk9IjguNSIvPg0KCQk8Zz4NCgkJCTxwYXRoIHN0eWxlPSJmaWxsOiM4Njk3Q0I7IiBkPSJNMjUuNSwxN2MtMTMuMjU1LDAtMjQtMy44MDYtMjQtOC41VjIxaDAuMDQ1YzAuNzMxLDQuNDYxLDExLjE3NSw4LDIzLjk1NSw4DQoJCQkJczIzLjIyNC0zLjUzOSwyMy45NTUtOEg0OS41VjguNUM0OS41LDEzLjE5NCwzOC43NTUsMTcsMjUuNSwxN3oiLz4NCgkJCTxwYXRoIHN0eWxlPSJmaWxsOiM4Njk3Q0I7IiBkPSJNMS41LDh2MC41YzAtMC4xNjgsMC4wMTgtMC4zMzQsMC4wNDUtMC41SDEuNXoiLz4NCgkJCTxwYXRoIHN0eWxlPSJmaWxsOiM4Njk3Q0I7IiBkPSJNNDkuNDU1LDhDNDkuNDgyLDguMTY2LDQ5LjUsOC4zMzIsNDkuNSw4LjVWOEg0OS40NTV6Ii8+DQoJCTwvZz4NCgk8L2c+DQoJPGc+DQoJCTxjaXJjbGUgc3R5bGU9ImZpbGw6I0VENzE2MTsiIGN4PSI0Mi41IiBjeT0iNDQiIHI9IjEyIi8+DQoJCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNNDMuOTE0LDQ0bDMuNTM2LTMuNTM2YzAuMzkxLTAuMzkxLDAuMzkxLTEuMDIzLDAtMS40MTRzLTEuMDIzLTAuMzkxLTEuNDE0LDBMNDIuNSw0Mi41ODYNCgkJCWwtMy41MzYtMy41MzZjLTAuMzkxLTAuMzkxLTEuMDIzLTAuMzkxLTEuNDE0LDBzLTAuMzkxLDEuMDIzLDAsMS40MTRMNDEuMDg2LDQ0bC0zLjUzNiwzLjUzNmMtMC4zOTEsMC4zOTEtMC4zOTEsMS4wMjMsMCwxLjQxNA0KCQkJYzAuMTk1LDAuMTk1LDAuNDUxLDAuMjkzLDAuNzA3LDAuMjkzczAuNTEyLTAuMDk4LDAuNzA3LTAuMjkzbDMuNTM2LTMuNTM2bDMuNTM2LDMuNTM2YzAuMTk1LDAuMTk1LDAuNDUxLDAuMjkzLDAuNzA3LDAuMjkzDQoJCQlzMC41MTItMC4wOTgsMC43MDctMC4yOTNjMC4zOTEtMC4zOTEsMC4zOTEtMS4wMjMsMC0xLjQxNEw0My45MTQsNDR6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo=">
					<h1 style="margin-bottom:0px;">Oops, we could not select the Database</h1>
					<p style="color:yellow;margin-top:0px;">Change your database settings in the <strong style="color:red;">/config/config.php</strong></p>
					</div>
				</body>
				</html>');
			}
		}

		mysqli_query($this->dbCon, "SET NAMES 'utf8'") or die(mysqli_error($this->dbCon));
		mysqli_query($this->dbCon, "SET CHARACTER SET utf8") or die(mysqli_error($this->dbCon));
		mysqli_query($this->dbCon, "SET SQL_MODE = ''") or die(mysqli_error($this->dbCon));

		if ($this->offset_timezone) {
			$now = new \DateTime();
			$mins = $now->getOffset() / 60;
			$sgn = ($mins < 0 ? -1 : 1);
			$mins = abs($mins);
			$hrs = floor($mins / 60);
			$mins -= $hrs * 60;
			$offset = sprintf('%+d:%02d', $hrs * $sgn, $mins);
			mysqli_query($this->dbCon, "SET time_zone = '{$offset}'");
		}

		if (isset($_POST)) {
			$this->unregisterGlobals();
			$this->data = $this->post = $this->post($_POST);
		} elseif (isset($_GET)) {
			$this->unregisterGlobals();
			$this->data = $this->get = $this->post($_GET);
		} else {
			$this->data = $this->request = $this->post($_REQUEST);
		}
		if (isset($_FILES)) {
			$this->files = $this->post($_FILES);
		}
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

	/** Check if environment is development and display errors **/
	public function setReporting()
	{
		if ($this->debug == true) {
			error_reporting(E_ALL);
			ini_set('display_errors', "On");
		} else {
			error_reporting(E_ALL);
			ini_set('display_errors', "Off");
			ini_set('log_errors', "On");
			ini_set('error_log', __DIR__ . DS . '_tmp' . DS . 'logs' . DS . 'error.log');
		}
	}

	/** Check for Magic Quotes and remove them **/
	public function removeMagicQuotes()
	{
		$_GET = $this->stripSlashesDeep($_GET);
		$_POST = $this->stripSlashesDeep($_POST);
		$_COOKIE = $this->stripSlashesDeep($_COOKIE);
	}

	/** Check register globals and remove them **/
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

	public function stripSlashesDeep($value)
	{
		$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
		return $value;
	}

	public function post($posted_array)
	{
		$this->form_posted_array = $posted_array;
		$forms = new \stdClass;
		if (is_array($posted_array)) {
			foreach ($posted_array as $key => $val) {
				if (is_array($val)) {
					$this->returned_posted_array[$key] = $val;
					$forms->$key = $val;
				} else {
					$this->returned_posted_array[$key] = $this->mysql_prepare_value($val);
					$forms->$key = $this->mysql_prepare_value($val);
				}
			}
			return $forms;
		} else {
			exit('Error: Form not good');
		}
	}

	public function mysql_prepare_value($value)
	{
		$new_version_php = function_exists("mysqli_real_escape_string");
		if ($new_version_php) {
			$value = stripslashes($value);
			$value = mysqli_real_escape_string($this->dbCon, $value);
		} else {
			$value = addslashes($value);
		}
		return $value;
	}


	//MySQL Query functions
	public function run_sql($sql)
	{

		$first_sql_command = explode(' ', $sql);
		$first_sql_command = strtoupper(trim($first_sql_command[0]));

		$resource = mysqli_query($this->dbCon, $sql);
		if ($resource) {
			if ($resource instanceof \mysqli_result) {
				$i = 0;
				$data = array();
				while ($result = mysqli_fetch_object($resource)) {
					$data[$i] = $result;
					$i++;
				}
				mysqli_free_result($resource);
				$query = new \stdClass();
				$query->row = isset($data[0]) ? $data[0] : array();
				$query->rows = $data;
				$query->num_rows = $i;
				unset($data);
				if ($first_sql_command == "INSERT") {
					return $this->getLastId();
				} else {
					if ($i == 1) {
						return $query->row;
					} else {
						return $query->rows;
					}
				}
			} else {
				return TRUE;
			}
		} else {
			exit('Error: ' . mysqli_error($this->dbCon) . '<br />Error No: ' . mysqli_errno($this->dbCon) . '<br />' . $sql);
		}
	}

	public function countAffected()
	{
		return mysqli_affected_rows($this->dbCon);
	}

	public function getLastId()
	{
		return mysqli_insert_id($this->dbCon);
	}

	public function escape($value)
	{
		return mysqli_real_escape_string($this->dbCon, $value);
	}

	public function sql($query)
	{
		$resource = mysqli_query($this->dbCon, $query);
		if ($resource instanceof \mysqli_result) {
			return $resource;
		}
		return false;
	}
	
	public function multi_sql($query)
	{
		$resource = mysqli_multi_query($this->dbCon, $query);
		return $resource;
	}

	public function __destruct()
	{
		if (is_object($this->dbCon)) {
			mysqli_close($this->dbCon);
		}
	}


}
