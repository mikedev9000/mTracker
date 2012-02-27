<?php

namespace app\controllers;

class AdminController extends \lithium\action\Controller {

	public function dbinstall() {
		$message = '';
		if(isset($this->request->data)){
			$dbhost = getenv('DBHOST');
			$dbname = getenv('DBNAME');
			$dbuser = getenv('DBUSER');
			$dbpass = getenv('DBPASS');

			$myqli = new mysqli($dbhost, $poweruser, $powerpass);

			if ($mysqli->connect_errno)
				$message .= "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "<br/>";

			$message .= $mysqli->host_info . "<br/>";

			//run the setup query
			$result = $mysqli->query("CREATE DATABASE $dbname");

			$result = $mysqli->query("GRANT CREATE,READ,INSERT,UPDATE,DELETE ON $dbname.* to $dbuser IDENTIFIED BY $dbpass");
		}

		return compact('message');
	}
}

?>
