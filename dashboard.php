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
			<a class="navbar-brand" href="dashboard.php">BugHub</a>
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
	<?php
	 if(isset($_SESSION['massage'])){
		 echo $_SESSION['massage'];
		 unset($_SESSION['massage']);
	 }
	?>
	<div class="container">

	 	<?php
		 global $conn;
		 $user=$_SESSION['username'];
		 $fixed="Fixed";
		 $query="SELECT * FROM `bugs` WHERE state<>'$fixed' ORDER BY id DESC";
	 		if($_SESSION['utype']=='Tester'){
				$cur=&$query;
				$cur="SELECT * FROM `bugs` WHERE username='$user' AND label<>'$fixed' ORDER BY id DESC";
			 }
			 elseif ($_SESSION['utype']=='Developer') {
				$cur=&$query;
				$cur="SELECT * FROM `bugs` WHERE developer='$user' AND label<>'$fixed' ORDER BY id DESC"; # code...
			 }
			$result=mysqli_query($conn,$query);
			while ($row = mysqli_fetch_array($result)) { 
				$id=$row['id'];
				echo '<div class="card"><div class="card-body"><div class="row"><div class="card-title bugs-title col-11">';
				echo $row['title'];
				echo '</div>';
				echo '<p class="badge-danger badge ml-2" style="text-align:center;">';
				echo $row['label'];
				echo '</p>';
				echo '</div>';
				echo '<a class="btn-warning card_btn_bugs" href="view.php?id='.$id.'">view</a>';
				echo '</div></div>';

				
			}
		 ?>

		<!-- <div class="card"><div class="card-body"><div class="row">
					<div class="card-title bugs-title col-10">ssfajofjsojfdosfajofjsojfdosfajofjsojfdosfajofjsojfdosfajofjsojfdosfajofjsojfdosfajofjsojfdojjjjjjjfajofjsojfdoj</div>
					<p class="badge-danger badge">label</p>
					 <p class="badge badge-primary ml-1">state</p></div>
				
				<a class="btn-warning card_btn_bugs">view</a>
			</div></div> -->
		



	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/font_awesome.min.js"></script>
	<script src="js/nav.js"></script>
</body>

</html>
