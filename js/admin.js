$(document).ready(function(){
	$('#NewContent').hide();
	$('#Result').hide();
	$('#newSong').click(function(){
		hideOpen();
		$('#NewContent').fadeIn();
	});
	$('#sendMail').click(function(){
		hideOpen();
		$('#Result').fadeIn();
	});
});

function hideOpen(){
	if($('#NewContent').is(':visible')) {
		$('#NewContent').hide();
	} else if ($('#Result').is(':visible')){
		$('#Result').hide();
	}
}