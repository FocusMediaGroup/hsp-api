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
		<link rel="stylesheet" href="css/style.css" />
</head>
<body>
	
	
	
	<div class="wrapper">
		<div class="row">
			<center><img src="images/logo.png" alt="" /></center>
		</div>
		<div class="row bar">
			<h4>Meetings</h4>
		</div>
		<div class="row">
			<div class="one">&nbsp;</div>
			<div class="two">
			<?php
		foreach($newkey as $val)
		{
		
$getResource1 = $bookedapiclient->getReservation($val);

?>
<div class="icon_item_one">
					<h2 class="pur_ico">
 <?php
echo $getResource1['title'];
		
		?>
			
				</h2>
					
				</div>
	<?php
		}
?>	
			</div>
			<div class="three"></div>
			<div class="four">	
				<?php
		foreach($newkey as $val)
		{
		
		$getResource1 = $bookedapiclient->getReservation($val);

		?>
		<div class="text_item_two">
									<h4 class="gol_tex">
 <?php
echo $getResource1['description'];


		?>
			
				</h4>
					
				</div>
	<?php
		}
?>	</div>
			<div class="five">
			
				<?php
		foreach($newkey as $val)
		{
		


?>
			
			
				<div class="glyp_one">
					<center><span class="glyphicon glyphicon-arrow-right"></span></center>
				</div>
	<?php
		}
?>	
				
				
			</div>
			
		</div>
	</div>
	
</body>
</html>