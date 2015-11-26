<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Username Availabilty Check Script in PHP, MYSQL, JQUERY </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
</head>
<style>
.red{
	color:red;
}
.green{
	color:green;
}
</style>
</head>
<body>
	<div id="usr">Username: <input type="text" id="uname" name="uname" autoComplete="off" placeholder= "Enter Username."/></div>
	<div id="status" style="display:none;"><img src="img/loading.gif">Checking Availability...</div>
  <div id="msg"></div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
<script>
$(function() {
	$("#uname").keyup(function(){
       $("#status").show();
       var uname = $.trim($("#uname").val());
       $.ajax({
          url: "request.php",
          dataType: "html",
          data: {uname:uname},
          success: function( data ) {
             // Handle success here
              if(data == 0){
					        $("#msg").html('<span class="green"><span class="glyphicon glyphicon-ok"></span> Username Available continue..</span>');
      				}else{
      					  $("#msg").html('<span class="red"><span class="glyphicon glyphicon-remove"></span>Username already exist, Please choose other name..!!</span>');
      				}
              $("#status").hide();
              if(uname == '') {
                 $("#msg").html('');
              }
          },
          error: function(e) {
          	// Handle error here
          	console.log(e);
          },
          timeout: 30000  
        });
  });
});
</script>
</html>