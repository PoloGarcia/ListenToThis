<?php
include_once 'util.php';
function load_cards(){
	$mysql=connect();
	$result="";
	$query="SELECT * FROM `tags`";
	$DataSource = $mysql->query($query);
	$rowcount=mysqli_num_rows($DataSource); 
	for ($i=0; $i <$rowcount ; $i++) { 
		$row = mysqli_fetch_array($DataSource);
		$querySongs = "SELECT * FROM songs WHERE tag = '". $row["count"] . "'";
		$Songs = $mysql->query($querySongs);
		$Songscount=mysqli_num_rows($Songs);
		$result .= "<h2 class=\"collection\">". $row["tag"] . "</h2><hr>";
		$result .= "<li>";
		for ($j=0; $j < $Songscount ; $j++) { 
			$Song = mysqli_fetch_array($Songs);
			//<li><a href="#"><iframe src="https://embed.spotify.com/?uri=spotify:track:4th1RQAelzqgY7wL53UGQt" width="300" height="380" frameborder="0" allowtransparency="true"></iframe></a></li>
			$result .= "<iframe src=\"https://embed.spotify.com/?uri=" . $Song["uri"] ."\" width=\"300\" height=\"380\" frameborder=\"0\" allowtransparency=\"true\">";
			$result .= "</iframe>";
			$result .= "<br></li>";
		}
	}
	echo $result;
	close($mysql);
}
load_cards();
?>