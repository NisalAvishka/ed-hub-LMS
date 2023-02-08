<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ed-hub Learning Management System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> 
</head>
<body>

	<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark py-3">
	<div class="container-fluid">
		<a href="#" class="navbar-brand text-light">Ed-hub LMS</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbar">
			<div class="me-auto"></div>
			<ul class="navbar-nav mx-5">
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown">Login</a>
					<ul class="dropdown-menu">
						<li><a href="studentlogin.php" class="dropdown-item">Student</a></li>
						<li><a href="teacherlogin.php" class="dropdown-item">Teacher</a></li>
						<li><a href="parentlogin.php" class="dropdown-item">Parent</a></li>
						<li><a href="adminlogin.php" class="dropdown-item">Admin</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	</nav>


</body>
</html>