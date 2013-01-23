<?php
/*
UserCake Version: 2.0.1
http://usercake.com
*/
require_once("db-settings.php"); //Require DB connection

//Retrieve settings
$stmt = $mysqli->prepare("SELECT id, name, value
	FROM ".$db_table_prefix."configuration");	
$stmt->execute();
$stmt->bind_result($id, $name, $value);

while ($stmt->fetch()){
	$settings[$name] = array('id' => $id, 'name' => $name, 'value' => $value);
}
$stmt->close();

//Set Settings
$emailActivation = $settings['activation']['value'];;
$mail_templates_dir = "models/mail-templates/";
$websiteName = $settings['website_name']['value'];
$websiteUrl = $settings['website_url']['value'];
$emailAddress = $settings['email']['value'];
$resend_activation_threshold = $settings['resend_activation_threshold']['value'];
$emailDate = date('dmy');
$language = $settings['language']['value'];
$template = $settings['template']['value'];

//Remember me - amount of time to remain logged in.
$remember_me_length = "1wk";

$default_hooks = array("#WEBSITENAME#","#WEBSITEURL#","#DATE#");
$default_replace = array($websiteName,$websiteUrl,$emailDate);

if (!file_exists($language)) {
	$language = "models/languages/en.php";
}

if(!isset($language)) $langauge = "models/languages/en.php";

//Pages to require
require_once($language);
require_once("class.mail.php");
require_once("class.user.php");
require_once("class.newuser.php");
require_once("funcs.php");

session_start();

//Global User Object Var
//loggedInUser can be used globally if constructed
if(isset($_SESSION["userCakeUser"]) && is_object($_SESSION["userCakeUser"]))
$loggedInUser = $_SESSION["userCakeUser"];
else if(isset($_COOKIE["userCakeUser"])) {
$stmt = $mysqli->prepare("SELECT sessionData FROM ".$db_table_prefix."sessions WHERE sessionID = ?");
$stmt->bind_param("s", $_COOKIE['userCakeUser']);
$stmt->execute();
$stmt->store_result();
if(!$stmt->num_rows > 0) {
$loggedInUser = NULL;
setcookie("userCakeUser", "", parseLength($remember_me_length));
}
else {
$result = $stmt->get_result();
$obj = $result[0];
$loggedInUser = unserialize($obj["sessionData"]);
}
$stmt->close();
}
else {
$currTime = time();
$persistTime = parseLength($remember_me_length);
$stmt = $mysqli->prepare("DELETE FROM ".$db_table_prefix."sessions WHERE ? >= (sessionStart+?)");
$stmt->bind_param("ii", $currTime, $persistTime);
$stmt->execute();
$stmt->close();
$loggedInUser = NULL;
}

?>
