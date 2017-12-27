<?php
foreach($_GET as $key=>$val)
{
$key1=$key;	
}
$key1=str_replace("_"," ", $key1);


 session_start();
 include('include/bookedapi.php'); 
            $username = 'api';
            $password = 'api$';
            $bookedapiclient = new bookedapiclient($username, $password);
            $bookedapiclient-> authenticate(true);

            //the next call will get all reservations for the current user or all of them if that user is the admin
            $getResource = $bookedapiclient->getReservation();
			
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
	$newkey[]=$val;
	}
}



$scheduleId=$newdata['scheduleId'];

 $resourceId=$newdata['resourceId'];
$referenceNumber='';
$userId=0;
$startDateTime=0;
$endDateTime=0;

$getReservation = $bookedapiclient->getReservation();




			?>
			
			
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $key1; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    
   
    .gold {
        color: #a17f22;
    }
    .black {
        color: #000;
    }
    .title {
        font-size: 3em;
    }
    .gradient {
        /* IE6-9 */

            }

     .mid-section {
        padding-top: 5%;
     }
     .text-meeting {
        margin-top: 100px;
     }

     .last-section {
        min-height: 300px;
     }
     .meeting-time {
        min-height: 100px;
     }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style='background-image: url("images/Wallpaper.jpg"); background-repeat: no-repeat;'>

    

    <!-- Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-12 brown-bg" style='text-align:center;'>
                <h1 class="gold title" style='    text-align: left;'><?php echo $key1; ?></h1>
				<h1 class="gold title" style="text-align: start;"><image src='images/Sofitel Hotel Logo 150.png'></h1>
				
            </div>
        </div>

        <div class="row gradient mid-section">
            
            <div class="col-md-6">
                <h2 class="text-center">Today's Event:</h2>
            </div>
            <div class="col-md-6">
                <h2 class="text-center"><?php echo $newkey['0']['title']; ?></h2>
            </div>
            
            <div>
                <h3 class="text-center text-meeting"><?php echo $newkey['0']['description']; ?></h3-->
            </div>
            
        </div>

        <div class="row brown-bg last-section">
             <?php
		foreach($newkey as $key=>$val)
		{
	  
	  
	  $sdate = new DateTime($newkey[$key]['startDate']);
$edate = new DateTime($newkey[$key]['endDate']);
$s_date=$sdate->format('h:i A');
$e_date=$edate->format('h:i A');
	  ?>
 
  <div class="meeting-time">
                <h3 class="text-center gold"> <?php echo $s_date; ?> To <?php echo $e_date; ?></h3>
            </div>
	   <?php } ?>

             
                
            
        </div>
			<div class="col-xs-6" style='bottom: 40px;position: relative;'>
                <h5 class="text-left gold"><?php echo  date('h:i');  ?></h5>
            </div>
            <div class="col-xs-6" style='bottom: 40px;position: relative;'>
                <h5 class="text-right gold"><?php echo date("l, jS F Y"); ?></h5>
            </div> 
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

			
			