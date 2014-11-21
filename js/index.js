$(document).ready(function(){
	$('#sub').hide();
	$('#spin1').show();
    $('#spin1').spin('show');
    $('#spin2').hide();
    $('#content_data').fadeIn('slow',function(){
      $('#content_data').load("./php/components.php",function(){
      	$('#spin1').spin('hide');
        $('#spin1').hide();
      });
    });

    //<-------------------------- POST SUBSCRIPTION ------------------------------------------------->
	$('#doSub').click(function(event){
		var mail = $('#mail').text();
		if ($('#mail').text() === ""){
			console.log("exiting");
			return;
		};
		$('#spin2').show();
		//event.preventDefault();
		$.ajax({
			type: "POST",
			url: "php/controllerAddSubscription.php",
			data: {doSubscription: "DoSubscription", mail: mail}, 
			success: function(data){
				console.log(data);
				$('#spin2').hide();
				alert(data);
				//$('#Result').html(data);
				//$('#Result').show();
			}
		});
	});
	//<-------------------------- POST SUBSCRIPTION ------------------------------------------------->
});