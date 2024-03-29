<html>
<head>
	<!-- prueba -->
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/buttons.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js" type="text/javascript"></script>
	<!-- SPIN !-->
	<script src="js/spin/jquery.spin.js" type="text/javascript"></script>
	<link href="js/spin/jquery.spin.css" rel="stylesheet" type="text/css" />
	<!-- SPIN !-->
	<script type="text/javascript" src="js/index.js"></script>
	<script id="facebook-jssdk" src="//connect.facebook.net/en_US/sdk.js"></script>
	<script type="text/javascript" src="js/fb.js"></script>
</head>
<body>
	<!--<script>
	  // This is called with the results from from FB.getLoginStatus().
	  function statusChangeCallback(response) {
	  	console.log('statusChangeCallback');
	  	console.log(response);
	    // The response object is returned with a status field that lets the
	    // app know the current login status of the person.
	    // Full docs on the response object can be found in the documentation
	    // for FB.getLoginStatus().
	    if (response.status === 'connected') {
	      // Logged into your app and Facebook.
	      testAPI();
	      document.getElementById('sub').style.display = 'block';
	  } else if (response.status === 'not_authorized') {
	      // The person is logged into Facebook, but not your app.
	      document.getElementById('status').innerHTML = 'Please log ' +
	      'into this app.';
	  } else {
	      // The person is not logged into Facebook, so we're not sure if
	      // they are logged into this app or not.
	      document.getElementById('status').innerHTML = 'Please log ' +
	      'into Facebook.';
	      document.getElementById('profilepic').innerHTML = '';
	      document.getElementById('mail').innerHTML = '';
	      document.getElementById('sub').style.display = 'none';
	  }
	}

	  // This function is called when someone finishes with the Login
	  // Button.  See the onlogin handler attached to it in the sample
	  // code below.
	  function checkLoginState() {
	  	FB.getLoginStatus(function(response) {
	  		statusChangeCallback(response);
	  	});
	  }

	  window.fbAsyncInit = function() {
	  	FB.init({
	  		appId      : '543482699120095',
	    cookie     : true,  // enable cookies to allow the server to access 
	                        // the session
	    xfbml      : true,  // parse social plugins on this page
	    version    : 'v2.1' // use version 2.1
	});

	  // Now that we've initialized the JavaScript SDK, we call 
	  // FB.getLoginStatus().  This function gets the state of the
	  // person visiting this page and can return one of three states to
	  // the callback you provide.  They can be:
	  //
	  // 1. Logged into your app ('connected')
	  // 2. Logged into Facebook, but not your app ('not_authorized')
	  // 3. Not logged into Facebook and can't tell if they are logged into
	  //    your app or not.
	  //
	  // These three cases are handled in the callback function.

	  FB.getLoginStatus(function(response) {
	  	statusChangeCallback(response);
	  });

	};

	  // Load the SDK asynchronously
	  (function(d, s, id) {
	  	var js, fjs = d.getElementsByTagName(s)[0];
	  	if (d.getElementById(id)) return;
	  	js = d.createElement(s); js.id = id;
	  	js.src = "//connect.facebook.net/en_US/sdk.js";
	  	fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));

	  // Here we run a very simple test of the Graph API after login is
	  // successful.  See statusChangeCallback() for when this call is made.
	  function testAPI() {
	  	console.log('Welcome!  Fetching your information.... ');
	  	FB.api('/me', function(response) {
	  		console.log('Successful login for: ' + response.name);
	  		console.log('Your email is:' + response.email);
	  		document.getElementById('status').innerHTML =
	  		'Thanks for logging in, ' + response.name;
	  		document.getElementById('mail').innerHTML = response.email;
	  	});
	  	FB.api('/me/picture?width=180&height=180',  function(response) {
	  		console.log('Successful profile picture url: ' + response.data.url);
	  		document.getElementById('profilepic').innerHTML =
	  		'<img src="' + response.data.url + '" alt="ProfilePic" height="180" width="180">'
	  	});
	  }


	</script>-->
	<div class="background"> </div>
	<!--Pattern HTML-->
	<div class="title">
		<a href="#top">
			<h1><span>Listen</span>To<span>This</span></h1>
			<div><img class="icon" src="img/icon.png"></div>
		</a>
	</div>
	<div class="spacer3" id="top"><div>
		<div class="fb-login-button center whiteB fbinfo" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="true" data-auto-logout-link="true">
			<fb:login-button scope="public_profile,email" onlogin="checkLoginState();" autologoutlink="true"></fb:login-button>
			<div id="status"></div>
			<div id="mail"></div>
			<div class="spacer7"></div>
			<div id="profilepic"></div>
			<div class="spacer7"></div>
			<div class="center">
				<div class="spin" id="spin2" data-spin></div>
			</div>
			<div class="container" id="sub" hidden>
				<button class="btnSub" id="doSub"> Subscribe to newsletter </button>
			</div>
		</div>
		<div class="vertical">
			<div class="spin" id="spin1" data-spin></div>
		</div>
		<div id="content_data"></div>
		<!--End Pattern HTML-->
	</body>
	</html>