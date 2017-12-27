<?php
foreach($_GET as $key=>$val)
{
$key1=$key;	
}
 session_start();
 include('include/bookedapi.php'); 
            $username = 'api';
            $password = 'api$';
            $bookedapiclient = new bookedapiclient($username, $password);
            $bookedapiclient-> authenticate(true);

            //the next call will get all reservations for the current user or all of them if that user is the admin
            $getResource = $bookedapiclient->getReservation();
		/* echo '<pre>';	
		print_r($getResource);
		exit; */
            //print the result to the screen

	
$dt = new DateTime();
$currdate=$dt->format('Y-m-d');
foreach($getResource['reservations'] as $key=>$val)
{
	
	$date = new DateTime($val['startDate']);
	$edate = new DateTime($val['endDate']);
    $stdate= $date->format('Y-m-d');
    $etdate= $edate->format('Y-m-d');
	if($val['resourceName']==$key1 && ($currdate >= $stdate && $currdate >= $etdate ))
	{
	$newkey[]=$val['referenceNumber'];
	}
}






?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>Mercure Notes</title>
	<!-- bootstrap core files  -->
	
	<!-- custom css -->
	<link rel="stylesheet" href="css/style3.css" />
	
</head>
<body>
	<div class="wrapper">
		
		<div class="header">
			<center><img src="images/logo.png" alt="" /></center>
		</div>
		
		<?php
		foreach($newkey as $val)
		{		
		$getResource1 = $bookedapiclient->getReservation($val);
		
		?>
		
		<div class="cont">
			<div class="left_one">
				<img src="http://dev1.fmgegypt.net/hsp/uploads/reservation/1.png" alt="" />
			</div>
			<div class="middle_one">
				<h4><?php echo $getResource1['title'];  ?></h4>
				<p><?php echo $key1; ?></p>
			</div>
			<div class="right_one">
				<img src="images/left-arrow.png" alt="" />
			</div>
		</div>		
		<?php
		}
		?>
			
		<div class="footer">
			<center><img src="images/sofiteliconying.png" alt="" /></center>
		</div>	
			
			
			
			
			
		
	</div>
</body>
</html>