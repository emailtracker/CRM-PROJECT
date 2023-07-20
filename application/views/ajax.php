<div id="demo">
  <h2>Let AJAX change this text</h2>
  <button type="button" id="btn" >Change Content</button>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

	$("#btn").click(function(){
		$.ajax({url: "settings", success: function(result){
			$("#demo").html(result);
		}});
	});

</script>
