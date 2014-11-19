$(document).ready(function(){
	$('.spin').hide();
	$('#NewCollection').hide();
	$('#NewContent').hide();
	$('#Result').hide();
	$('#Settings').hide();
	var currentURI = $('#URI').val();
	console.log(currentURI);
	$('#newSong').click(function(){
		hideOpen();
		$('#NewContent').fadeIn();
	});
	$('#sendMail').click(function(){
		hideOpen();
		$('#Result').fadeIn();
	});
	$('#newCollection').click(function(){
		hideOpen();
		$('#NewCollection').fadeIn();
	});
	$('#settings').click(function(){
		hideOpen();
		$('#Settings').fadeIn();
	});

	//<-------------------------- POST NEW SONG ------------------------------------------------->
	$('#addToCollection').click(function(event){
		var songURI = $('#songURI').val();
		if ($('#songURI').val() === ""){
			console.log("exiting");
			return;
		};
		var collections = $('#collections').val();
		if ($('#collections').val() === "") {
			return;
		};
		$('.spin').show();
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: "php/controllerAddSong.php",
			data: {addToCollection: "AddToCollection", songURI: songURI, collections: collections}, 
			success: function(data){
				console.log(data);
				$('#NewContent').hide();
				$('.spin').hide();
				$('#Result').html(data);
				$('#Result').show();
				clearInput();
			}
		});
	});
	//<-------------------------- POST NEW SONG ------------------------------------------------->

	//<-------------------------- POST NEW COLLECTION ------------------------------------------->
	$('#addCollection').click(function(event){
		var tag = $('#tag').val();
		if ($('#tag').val() === ""){
			console.log("exiting");
			return;
		};
		$('.spin').show();
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: "php/controllerAddSong.php",
			data: {addCollection: "AddCollection", URI: URI}, 
			success: function(data){
				console.log(data);
				$('#NewCollection').hide();
				$('.spin').hide();
				$('#Result').html(data);
				$('#Result').show();
				clearInput();
			}
		});
	});
	//<-------------------------- POST NEW COLLECTION ------------------------------------------->

	//<-------------------------- UPDATE USR SPOTIFY ------------------------------------------->
	$('#newURI').click(function(event){
		var URI = $('#URI').val();
		if ($('#URI').val() === ""){
			console.log("exiting");
			return;
		};
		$('.spin').show();
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: "php/controllerAddSong.php",
			data: {upadteUSR: "UpadteUSR", currentURI: currentURI, URI:URI}, 
			success: function(data){
				console.log(data);
				$('#Settings').hide();
				$('.spin').hide();
				$('#Result').html(data);
				$('#Result').show();
				clearInput();
				currentURI = URI;
				console.log("New URI" + currentURI);
			}
		});
	});
	//<-------------------------- UPDATE USR SPOTIFY ------------------------------------------->

});

function hideOpen(){
	if($('#NewContent').is(':visible')) {
		$('#NewContent').hide();
	} else if ($('#Result').is(':visible')){
		$('#Result').hide();
	} else if ($('#newCollection').is(':visible')) {
		$('#NewCollection').hide();
	} else if ($('#Settings').is(':visible')) {
		$('#Settings').hide();
	} else if ($('#Result').is(':visible')) {
		$('#Result').hide();
	}
}

function clearInput() {
	$("#AddToCollection :text").each( function() {
		$(this).val('');
	});
	$("#AddCollection :text").each( function() {
		$(this).val('');
	});
	$("")
}
