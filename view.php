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
	<link rel="stylesheet" href="css/dashboard.css">
	<link rel="stylesheet" href="css/all.min.css" />
	<link rel="stylesheet" href="css/fontawesome.min.css" />

</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark mb-1" style="background-color: rgba(27, 77, 110,.9)">
		<div class="container">
			<a class="navbar-brand" href="dashboard.php">Navbar</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="dashboard.php">Dashboard <span
								class="sr-only">(current)</span></a>
					</li>
					<?php
				if($_SESSION['utype']=='Tester'){
				 echo '<li class="nav-item"><a class="nav-link" href="addnew.php">Add Bugs</a></li>';
				}
				?>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Log out</a>
					</li>

				</ul>
			</div>

		</div>
	</nav>

	<div class="container">
		<?php
			global $conn;
			$id=$_GET['id'];
			$query="SELECT * FROM `bugs` WHERE id='$id'";
			$result= mysqli_query($conn,$query);
			$row = mysqli_fetch_array($result);
		
		echo '<div class="row"><div class="mb-1 col-8" style="font-size:24px;text-transform: capitalize;"> <b>'.$row['title'].'</b> </div>';
		if($_SESSION['utype']=='Manager'){
			echo '<form action="" class="col-4" style="text-align:right;" method="post">';
				assignAndLabel($id);
			echo '<select name="label_change" id="">';
				echo '<option value="Open"> Open</option>';
			echo	'<option value="Critical"> Critical</option>';
				echo '<option value="Duplicate"> Duplicate</option>';
				echo '<option value="Rejected"> Rejected</option>';
				echo '<option value="Fixed"> Fixed</option>';
			echo '</select>';
		
				$query="SELECT `username` FROM `user` WHERE usertype='Developer'";
				global $conn;
				$result=mysqli_query($conn,$query);
				echo '<select name="assign" class="ml-1" id="">';
				while($others = mysqli_fetch_array($result)){
					$name=$others['username'];
					echo '<option value="'.$name.'"> '.$name.'</option>';

				}
				echo '</select>';
			
			echo '<button class="btn btn-info ml-1" name="change" >Submit </button>';
			
		echo '</form>';
		}
		elseif ($_SESSION['utype']=='Developer') {
			echo '<form action="" class="col-4" style="text-align:right;" method="post">';
				changestate($id);
			echo '<select name="label_change" id="">';
				echo '<option value="Open"> Open</option>';
			echo	'<option value="Critical"> Critical</option>';
				echo '<option value="Duplicate"> Duplicate</option>';
				echo '<option value="Rejected"> Rejected</option>';
				echo '<option value="Fixed"> Fixed</option>';
			echo '</select>';
			echo '<button class="btn btn-info ml-1" name="change" >Submit </button>';	
			echo '</form>';	

		}
		echo '</div>';
		echo '<p class="badge-danger badge px-2 py-1 ">'.$row['label'].'</p>';
		echo '<p>'.$row['description'].'</p>';
		echo'<br>';
		echo '<a href="download.php?id='.$id.'" class="btn btn-success" >Atachment</a>';
		echo'<br>';
		echo'<br>';
		echo '<p style="font-size:18px"><b>-Bugs Detected By '.$row['username'].'</b> </p>';
		
		?>


	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/font_awesome.min.js"></script>
	<script src="js/nav.js"></script>
</body>

</html>