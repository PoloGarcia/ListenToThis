<?php 
include_once 'util.php';
if (isset($_POST['doSubscription']) == 'DoSubscription') {
	$mail = $_POST["mail"];
	if(inserting_Subscription($mail)){
		$result = "You are now subscribed with the following mail: " . $mail . "" ;
		print($result);	
	} else {
		$result = "You are already subscribed, to remove your subscription contact the site managers.";
		print($result);
	}
}
?>