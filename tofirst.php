<?php 
$user = mysqli_connect('localhost','root','');
mysqli_select_db($user,'todo');
session_start();

if ((isset($_POST['name'])) && (!empty($_POST['name']))){
	$name = $_POST['name'];

	$check = "SELECT * FROM `users` where `name` = '$name' ";
	$check_run = mysqli_query($user,$check);
	
	
	$row = mysqli_num_rows($check_run);

	if ($row == 0){
		$query = "INSERT INTO `users`(`name`) VALUES('$name')";
		mysqli_query($user,$query);
		$select = "SELECT * FROM `users` where `name` = '$name' ";
		if ($now = mysqli_query($user,$select)){
			if ($id = mysqli_fetch_assoc($now)){
				$user = $id['name'];
				$idn = $id['id'];
				$_SESSION['id'] = $idn;
				$_SESSION['human'] = $user;
	}
			Header("Location:todo.php");
		}
		else{
			echo mysql_error();
		}
		
	}else{
		$select1 = "SELECT * FROM `users` where `name` = '$name' ";
		if ($nowa = mysqli_query($user,$select1)){
			if ($id = mysqli_fetch_assoc($nowa)){
				$user = $id['name'];
				$idn = $id['id'];
				$_SESSION['id'] = $idn;
				$_SESSION['human'] = $user;
	}
		Header("Location:intodo.php");
	}
}
}

?>

<html>
	<head>
		<title>
			To-Do List
		</title>
		<link href="todo.css" rel="stylesheet"></link>
		<link href="bootstrap.min.css" rel="stylesheet"></link>
	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					
				</div>
				<div class="col-lg-4" style="padding-top: 250px;">
					<h4>To-Do List</h4>
						Name:<br/>
							<form action='tofirst.php' method='post'>
								<input class= type="text" name="name">
								<input type="submit" class="btn btn-danger" value="Submit">
							</form>
				</div>
				<div class="col-lg-4">
					
				</div>
			</div>
			
		</div>
	</body>
</html>