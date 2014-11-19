<html>
<head>
	<link rel="stylesheet" href="css/buttons.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js" type="text/javascript"></script>
	<!-- SPIN !-->
	<script src="js/spin/jquery.spin.js" type="text/javascript"></script>
	<link href="js/spin/jquery.spin.css" rel="stylesheet" type="text/css" />
	<!-- SPIN !-->
	<script type="text/javascript" src="js/admin.js"></script>
</head>
<body>
	<div class="background"> </div>
	<!--Pattern HTML-->
	<div class="titleBg">
		<div class="logout bg">
			<img src="img/gear.png" class="icons">
			<span class="spacer2"></span>
			<a href="#" id="settings"> Settings </a>
			<span class="spacer5"></span>
			<img src="img/logout.png" class="icons">
			<span class="spacer2"></span>
			<a href="login.html">Logout</a>
		</div>
		<h1><span>Listen</span>To<span>This</span></h1>
		<div><img class="icon" src="img/icon.png"></div>
	</div>
	<div class="spacer4"></div>
	<div class="container">
		<button class="btn" id="newSong"> Add new song </button>
		<span class="spacer"></span>
		<button class="btn" id="newCollection"> Add new collection </button>
		<span class="spacer"></span>
		<button class="btn" id="sendMail"> Send newsletter </button>
	</div>
	<div id="NewContent" class="container whiteB" hidden>
		<form id="AddToCollection" method="POST">
			<br><br>
			<input type="text"  placeholder="Spotify URI" name="songURI" id="songURI" required>
			<p>Select collection to add song</p>
			<div id="dropdownCollection"></div>
			<?php 
			include_once 'php/util.php';
			dropdown("collections","SELECT count, tag FROM tags ORDER BY count DESC","collections");
			?>
			<br>
			<!--<input type="text">-->
			<br><br><br>
			<button class="send" name="addToCollection" value="AddToCollection" id="addToCollection"> Post to blog </button>
		</form>
	</div>
	<div id="NewCollection" class="container whiteB" hidden>
		<form id="AddCollection" method="POST">
			<br><br>
			<input type="text"  placeholder="Collection name" name="tag" id="tag" required>
			<br><br><br>
			<button class="send" name="addCollection" value="AddCollection" id="addCollection"> Add collection </button>
		</form>
	</div>
	<div id="Settings" class="container whiteB" hidden>
		<form id="updateUSR" method="POST">
			<br><br>
			<p>This is your URI profile at the moment:</p>
			<input name="URI" id="URI" type="text"  placeholder="Spotify profile URI" <?php 
																	include_once 'php/util.php';
																	$mysql = connect();
																	$queryUsr = "SELECT spotURI FROM users";
																	$User = $mysql->query($queryUsr);
																	$UserURI = mysqli_fetch_array($User);
																	echo "value=\"". $UserURI["spotURI"] ."\""; ?> required>
			<br><br><br>
			<button class="send" name="newURI" value="NewURI" id="newURI"> Modify </button>
		</form>
	</div>
	<div class="vertical">
		<div class="spin" data-spin></div>
	</div>
	<div id="Result" class="container whiteB" hidden>
	</div>
	<!--End Pattern HTML-->
	
</body>
</html>