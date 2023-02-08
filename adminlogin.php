<?php include ('includes/header.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin login</title>
</head>
<body style="background-color: #dee2e6;">
	<div class="container">
		<div class="col-md-12">
			<div class="row d-flex justify-content-center">
				<div class="col-md-4 shadow-sm bg-white my-5">
					<h4 class="text-center">Admin Login</h4>
					<div id="login_result"></div>
					<form method="post">
						<label>Username</label>
						<input type="text" name="username" id="username" placeholder="Enter Username" class="form-control my-2" 
						autocomplete="off">
						<label>Password</label>
						<input type="password" name="password" id="password" placeholder="Enter Password" class="form-control my-2" 
						autocomplete="off">
						<div class="d-grid gap-2">
							<input type="submit" name="login" id="login" class="btn btn-success my-3" value="Login">	
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>


<script type="text/javascript">
	$(document).ready(function(){
		$("#login").click(function(event){
			event.preventDefault();

			var password = $("#password").val();
			var username = $("#username").val();


			$.ajax({
				method:"POST",
				url: "ajax/adminlogin.php",
				data: {username:username,password:password},
				success:function(data){
					$("#login_result").html(data);

				}
			});
			
		});
		
    });
</script>


</body>
</html>