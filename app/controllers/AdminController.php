<?php

namespace app\controllers;

class AdminController extends \lithium\action\Controller {

	public function dbinstall() {
		$message = '';
		if( $this->request->data ){
			$dbhost = getenv('DBHOST');
			$dbname = getenv('DBNAME');
			$dbuser = getenv('DBUSER');
			$dbpass = getenv('DBPASS');

			$poweruser = $this->request->data['poweruser'];
			$powerpass = $this->request->data['powerpass'];

			$powerpass = ( $powerpass == '' ) ? null : $powerpass;

var_dump($poweruser, $powerpass);

			$myqli = new \mysqli( $dbhost, $poweruser, $powerpass );

			if( !isset($mysqli) )
				$message = "Failed to connect to MySQL"; 
			elseif ( $mysqli->connect_errno ){
				$message .= "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "\n";
			}
			else{
				$message .= $mysqli->host_info . "\n";

				//run the setup query
				$result = $mysqli->query("CREATE DATABASE $dbname");

				$result = $mysqli->query("GRANT CREATE,READ,INSERT,UPDATE,DELETE ON $dbname.* to $dbuser IDENTIFIED BY $dbpass");
			}
		}

		return compact('message');
	}
}

?>
