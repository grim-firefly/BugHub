<?php
include 'lib/function.php';
	if(!isset($_SESSION['username'])){
		session_destroy();
		header("Location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BugHub</title>

	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/navbar.css">
	<link rel="stylesheet" href="css/addnew.css">
	<link rel="stylesheet" href="css/all.min.css" />
	<link rel="stylesheet" href="css/fontawesome.min.css" />

</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(27, 77, 110,.9)">
		<div class="container">
			<a class="navbar-brand" href="dashboard.php">BugHub</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item ">
						<a class="nav-link" href="dashboard.php">Dashboard <span
								class="sr-only">(current)</span></a>
					</li>
					<?php
				if($_SESSION['utype']=='Tester'){
				 echo '<li class="nav-item active"><a class="nav-link" href="#">Add Bugs</a></li>';
				}
				?>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Log out</a>
					</li>

				</ul>
			</div>

		</div>
	</nav>
	<?php
	 if(isset($_SESSION['massage'])){
		 echo $_SESSION['massage'];
		 unset($_SESSION['massage']);
	 }
	?>
	<div class="container">
		<form action="" method="POST" enctype="multipart/form-data">
			<?php
            addnew();
            ?>
			<div class="form-group mt-3">
				<input type="text" class="form-control" id="formGroupExampleInput" name="title"
					placeholder="Title">
			</div>
			<div class="form-group">
				<textarea class="form-control" id="exampleFormControlTextarea1" name="description"
					rows="3" style="height:200px" placeholder="Description"></textarea>
			</div>
			<div class="form-group">
				<input type="file" name="myfile" class="form-control-file" >
			</div>
			
			<input type="submit" class="btn btn-warning px-4 mt-2" name="addnew_btn" value="Submit" />
		</form>
		<?php
			?>

	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/font_awesome.min.js"></script>
	<script src="js/nav.js"></script>
</body>

</html>