<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
	<br>
	<br>
	<br>
	<h2 align="center">Live Data Search</h2><br>
	<div class="form-group">
		<div class="input-group">
			<!-- <span class="input-group-addon">Search</span> -->
			<input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control">
		</div>
	</div>
	<br>
	<div id="result"></div>
</div>

<div style="clear:both"></div>
<br>
<br>
<br>
</body>
</html>

<script>
$(document).ready(function(){
	
	load_data();

	function load_data(query)
	{
		$.ajax({
			url:"<?php echo base_url(); ?>ajaxsearch/fetch",
			method:"POST",
			data:{	query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		})
	}

	$('#search_text').keyup(function(){

		var search = $(this).val();

		if (search != '') 
		{
			load_data(search);
		}
		else
		{
			load_data();
		}
	});
});
</script>
