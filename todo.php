<?php 
$user = mysqli_connect('localhost','root','');
mysqli_select_db($user,'todo');
session_start();
if ((isset($_POST['todo1'])) && (isset($_POST['todo2']))&& (isset($_POST['todo3']))&& (isset($_POST['todo4']))&& (isset($_POST['todo5']))&& (isset($_POST['time1']))&& (isset($_POST['time2']))&& (isset($_POST['time3']))&& (isset($_POST['time4'])) && (isset($_POST['time5']))){
	if ((!empty($_POST['todo1'])) || (!empty($_POST['todo2'])) || (!empty($_POST['todo3']))|| (!empty($_POST['todo4']))|| (!empty($_POST['todo5']))|| (!empty($_POST['time1']))|| (!empty($_POST['time2']))|| (!empty($_POST['time3']))|| (!empty($_POST['time4'])) || (!empty($_POST['time5']))){
	
	$todo1 = $_POST['todo1'];
	$todo2 = $_POST['todo2'];
	$todo3 = $_POST['todo3'];
	$todo4 = $_POST['todo4'];
	$todo5 = $_POST['todo5'];
	$time1 = $_POST['time1'];
	$time2 = $_POST['time2'];
	$time3 = $_POST['time3'];
	$time4 = $_POST['time4'];
	$time5 = $_POST['time5'];
	$fid = $_SESSION['id'];
	
		$query = "INSERT INTO `toodo`(`todo1`, `todo2`, `todo3`, `todo4`, `todo5`, `time1`, `time2`, `time3`, `time4`, `time5`, `uid`) VALUES('$todo1','$todo2','$todo3','$todo4','$todo5','$time1','$time2','$time3','$time4','$time5','$fid')";
		
		if (mysqli_query($user,$query)){
			Header("Location:intodo.php");
		}else{
			echo "<script> 
					alert('Sorry, We Couldn't get your inputs! Kindly Enter the Informatin again!')

			</script>";
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
					<a href = "tofirst.php" ><button style="padding-top: 50px;" class="btn btn-success">Home</button></a>	
				</div>
				<div class="col-lg-4" style="padding-top: 200px;">
				<?php error_reporting(0);?>
					<h4>Hello <?php echo $_SESSION['human']; ?>! You're new here!</h4>
						<br/>
							<form action='todo.php' method='post'>
							Todo 1: <br/>
								<input class= type="text" name="todo1">  <input type="time" name="time1"><br/>
							Todo 2: <br/>
								<input class= type="text" name="todo2">  <input type="time" name="time2"><br/>
							Todo 3: <br/>
								<input class= type="text" name="todo3">  <input type="time" name="time3"><br/>
							Todo 4: <br/>
								<input class= type="text" name="todo4">  <input type="time" name="time4"><br/>
							Todo 5: <br/>
								<input class= type="text" name="todo5">  <input type="time" name="time5"><br/><br/>
								<input type="submit" class="btn btn-danger" value="Submit">
							</form>
				</div>
				<div class="col-lg-4">
					
				</div>
			</div>
			
		</div>
	</body>
</html>