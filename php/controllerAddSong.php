<?php 
include_once 'util.php';
if (isset($_POST['addToCollection']) == 'AddToCollection') {
	$songURI = $_POST["songURI"];
	$collections = $_POST["collections"];
	if(inserting_song($songURI,$collections)){
		$result = "<p>This song has been added to the selected collection:</p><iframe src=\"https://embed.spotify.com/?uri=" . $songURI ."\" width=\"250\" height=\"80\" frameborder=\"0\" allowtransparency=\"true\">";
		print($result);	
	}	
} else if (isset($_POST['addCollection']) == 'AddCollection') {
	$tag = $_POST["tag"];
	if(inserting_collection($tag)){
		$result = "<p>The following collection: " . $tag . " has been added</p>" ;
		print($result);	
	}
}else if (isset($_POST['upadteUSR']) == 'UpadteUSR') {
	$URI = $_POST["URI"];
	$currentURI = $_POST["currentURI"];
	if(update_Spotify($currentURI,$URI)){
		$result = "<p>This is your new profile:</p><div id=\"followSpotify\" class=\"center\"><iframe src=\"https://embed.spotify.com/follow/1/?uri=". 
		$URI ."&size=detail&theme=light\" width=\"300\" height=\"56\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden;\" allowtransparency=\"true\"></iframe></div>";;
		print($result);
	}
}
?>