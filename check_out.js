$(document).ready(function(){
$("#check_availability").on("click",(function(){
    $isbn = $('#isbn').val();
	$card_no = $('#card_no').val();	
	$.ajax({url: '/DB/check_out.php',
		data: {isbn : $isbn, card_no : $card_no},
		type: 'post',
		success: function (output) {
			$("#message").text(output);
			//alert(output);			
			}
	  });		 
	}));		
});