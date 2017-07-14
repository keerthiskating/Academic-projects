$(document).ready(function () {
		var matches;		
		$("#isbn").keyup(function(){		
		$isbn = $("#isbn").val();
		console.log(isbn);
		$.ajax({
			url: '/DB/auto_complete.php',
			data: {isbn : $isbn},
			//dataType: 'json',
			//contentType: 'json',
			
			type: "post",
			success: function (output) {
				$matches = output.split(",");
				console.log('Output : '+$matches);
					$("#isbn").autocomplete({source: $matches, minLength: 4});
	
					}
					
			  });		
    $('#check_availability').click(function() {
	$isbn = $('#isbn').val();		
	$.ajax({url: '/DB/show_results_search.php',		
		data: {isbn : $isbn},
		type: 'post',
		success: function (output) {
			console.log(output);
			$("#result").html(output);
			},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert("some error");
		}
	  });
    });
		});
		
});