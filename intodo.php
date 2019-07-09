<?php 
$user = mysqli_connect('localhost','root','');
mysqli_select_db($user,'todo');
session_start();


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
				<div class="col-lg-4" style="padding-top: 250px;">
				<?php error_reporting(0); 

				$fk = $_SESSION['id'];
			
				$query = "SELECT * FROM `toodo` WHERE `uid` = '$fk'";
				if ($col = mysqli_query($user,$query)){
					if (mysqli_num_rows($col) != 0){
						if ($p = mysqli_fetch_assoc($col)){
							$todo1 = $p['todo1'];
							$todo2 = $p['todo2'];
							$todo3 = $p['todo3'];
							$todo4 = $p['todo4'];
							$todo5 = $p['todo5'];
							$time1 = $p['time1'];
							$time2 = $p['time2'];
							$time3 = $p['time3'];
							$time4 = $p['time4'];
							$time5 = $p['time5'];

							if ((!empty($todo1)) || (!empty($todo2)) || (!empty($todo3))|| (!empty($todo4))|| (!empty($todo5))|| (!empty($time1))|| (!empty($time2))|| (!empty($time3))|| (!empty($time4)) || (!empty($time5))){
								$time = time();
								if (((strtotime($time1) - $time) == 0) || ((strtotime($time1) - $time) <= -1)){
									
									$cquery = "UPDATE `toodo` SET `todo1` = '',`time1` = '' WHERE `time1` = '$time1'";
									mysqli_query($user,$cquery);
								}
								else if (((strtotime($time2) - $time) == 0) || ((strtotime($time2) - $time) <= -1)){
									$cquery = "DELETE `todo2` and `time2` FROM `toodo` WHERE `time2` = '$time2'";
									mysqli_query($user,$cquery);
								}
								else if (((strtotime($time3) - $time) == 0) || ((strtotime($time3) - $time) <= -1)){
									$cquery = "DELETE `todo3` and `time3` FROM `toodo` WHERE `time3` = '$time3'";
									mysqli_query($user,$cquery);
								}
								else if (((strtotime($time4) - $time) == 0) || ((strtotime($time4) - $time) <= -1)){
									$cquery = "DELETE `todo4` and `time4` FROM `toodo` WHERE `time4` = '$time4'";
									mysqli_query($user,$cquery);
								}
								else if (((strtotime($time5) - $time) == 0) || ((strtotime($time5) - $time) <= -1)){
									$cquery = "DELETE `todo5` and `time5` FROM `toodo` WHERE `time5` = '$time5'";
									mysqli_query($user,$cquery);
								}
							}else{
								echo "<strong class='btn btn-info'>Hello ".$_SESSION['human'].", You dont have any Todo at the Moment</strong></br>";
								echo "<a style='text-align:center;' href='todo.php'><em>Click this if you would like to add a Todo</em></a>";
							}


							echo "<table style='text-align:center;' class='table table-hover'>
							<tr>
								<th style='font-size: 34px; ' colspan='2'>".$_SESSION['human'].", Here is your Todo-List</th>
							</tr>
							<tr>
								<td>".$todo1."</td>
								<td>".$time1."</td>
							</tr>
							<tr>
								<td>".$todo2."</td>
								<td>".$time2."</td>
							</tr>
							<tr>
								<td>".$todo3."</td>
								<td>".$time3."</td>
							</tr>
							<tr>
								<td>".$todo4."</td>
								<td>".$time4."</td>
							</tr>
							<tr>
								<td>".$todo5."</td>
								<td>".$time5."</td>
							</tr>
						</table>";
						}
					}else{
						
						echo "<strong >Hello ".$_SESSION['human'].", You dont have any Todo at the Moment</strong></br>";
						echo "<a style='text-align:center;' href='todo.php'><em>Click this if you would like to add a Todo</em></a>";
					}
				}else{
					echo 'no query';
				}

					


					?>
				</div>
				<div class="col-lg-4">
					
				</div>
			</div>
			
		</div>
	</body>
</html>