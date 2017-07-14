$(document).ready(function(){
$("#show_fines").click(function(){	
		$.ajax({url: '/DB/get_fines.php',		
		type: 'post',
		success: function (out) {
			$("#display_fines").html(out);
			//alert(out);
			}
		});	
	});		
	$("#Home").click(function(){	
window.location.replace("http://localhost/DB/library.html");
	});		
});