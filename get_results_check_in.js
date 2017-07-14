$(document).ready(function() {
	$arr = [];
	$('#check_in').click(function() {
		$isbn = $('#isbn').val();
		$card_no = $('#card_no').val();
		$borrower_name = $('#borrower_name').val();
        $.ajax({url: '/DB/get_results_check_in.php',		
		data: {isbn : $isbn, card_no : $card_no, borrower_name : $borrower_name},
		type: 'post',
		success: function (output) {			
			$("#rowclick").find("tbody").append(output);			
			
			}
	  });
	  $('#test').click(function() {		  
	  $arr = [];
      $('#rowclick tr').filter(':has(:checkbox:checked)').find('td:nth-child(2)').each(function(index) {   		$arr.push($(this).text());
		//alert($arr);
            });						

		$.ajax({url: '/DB/check_in.php',		
		data: {arr : $arr},
		type: 'post',
		success: function (output) {
			console.log(output);
			$("#print1").html(output);
			},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert("some error");
		}
	  });
    });
	
	
	
});	
});	