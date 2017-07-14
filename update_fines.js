$(document).ready(function(){	
	$("#update_fines").click(function(){	
		$.ajax({url: '/DB/update_fines.php',		
		type: 'post',
		success: function (output) {
			//alert(output);									
			$(".message").text("Fines updated successfully !");			
			}
		});	
	});	
	
});