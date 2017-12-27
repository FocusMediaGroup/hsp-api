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
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<!-- custom css -->
	<link rel="stylesheet" href="css/design3.css" />
	
</head>
<body>
	<div class="wrapper">
		<div class="row">
			<center><img src="images/logo.png" alt="" /></center>
		</div>
		<div class="row bar">
			<h4>Meetings</h4>
		</div>
		<?php
                //var_dump($bookedapiclient->getReservation("583405fc10cfb568668652"));
                
		foreach($newkey as $val)
		{
		
$getResource1 = $bookedapiclient->getReservation($val);

		
		?>
		
			<div class="full_row">
				<div class="content">
				<div class="left">
				
					<img src="http://dev1.fmgegypt.net/hsp/uploads/reservation/1.png" alt="" />
					<!--h4 class="gol_tex" style='color:#5f2966'>Petit prince</h4-->
				</div>
				<div class="middle">
					<h4 class="gol_tex"><?php echo $getResource1['description'];?></h4>
				</div>
				<div class="right">
					<center><span class="glyphicon glyphicon-arrow-right"></span></center>
				</div>
				</div>
			</div>
			
		<?php  }	?>		
			
	</div>
</body>
</html>