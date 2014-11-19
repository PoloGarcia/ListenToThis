<?php
include_once 'util.php';
function load_cards(){
	$mysql=connect();
	$result="";
	$query="SELECT * FROM `tags` ORDER BY count DESC";
	$DataSource = $mysql->query($query);
	$queryUsr = "SELECT spotURI FROM users";
	$User = $mysql->query($queryUsr);
	$UserURI = mysqli_fetch_array($User);
	$rowcount=mysqli_num_rows($DataSource);
	$result .= "<p class=\"noSongs center\"> Follow your musical host on Spotify: </p>";
	$result .= "<div id=\"followSpotify\" class=\"center\"><iframe src=\"https://embed.spotify.com/follow/1/?uri=". $UserURI["spotURI"] ."&size=detail&theme=light\" width=\"300\" height=\"56\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden;\" allowtransparency=\"true\"></iframe></div>";
	$result .= "<ul class=\"items\">";
	for ($i=0; $i <$rowcount ; $i++) { 
		$row = mysqli_fetch_array($DataSource);
		$querySongs = "SELECT * FROM songs WHERE tag = '". $row["count"] . "'";
		$Songs = $mysql->query($querySongs);
		$Songscount=mysqli_num_rows($Songs);
		$result .= "<h2 class=\"collection\">". $row["tag"] . "</h2><hr>";
		if ($Songscount == 0) {
			$result .= "<p class=\"noSongs\"> This collection has no songs yet </p>";
		}
		for ($j=0; $j < $Songscount ; $j++) { 
			$result .= "<li>";
			$Song = mysqli_fetch_array($Songs);
			//<li><a href="#"><iframe src="https://embed.spotify.com/?uri=spotify:track:4th1RQAelzqgY7wL53UGQt" width="300" height="380" frameborder="0" allowtransparency="true"></iframe></a></li>
			$result .= "<iframe src=\"https://embed.spotify.com/?uri=" . $Song["uri"] ."\" width=\"300\" height=\"380\" frameborder=\"0\" allowtransparency=\"true\">";
			$result .= "</iframe>";
			$result .= "</li>";
		}
	}
	$result .= "</ul>";
	echo $result;
	close($mysql);
}
load_cards();
?>