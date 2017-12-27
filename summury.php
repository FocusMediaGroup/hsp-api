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
		 //echo '<pre>';	
		//print_r($getResource);
		//exit; 
            //print the result to the screen

	
$dt = new DateTime();
$currdate=$dt->format('Y-m-d');
foreach($getResource['reservations'] as $key=>$val)
{
	
	$date = new DateTime($val['startDate']);
	$edate = new DateTime($val['endDate']);
    $stdate= $date->format('Y-m-d');
    $etdate= $edate->format('Y-m-d');
	if($currdate >= $stdate && $currdate >= $etdate )
	{
	$newkey[]=$val;
	//$newkey[]=$val['referenceNumber'];
	}
}

 //$getResource1 = $bookedapiclient->getReservation('584140fcd0967883697882');

 //echo '<pre>';
 //print_r($getResource1);
 
 //exit;
 
 // $getResource2 = $bookedapiclient->getResource(8);

 //echo '<pre>';
 //print_r($getResource2);
 


$scheduleId=$newdata['scheduleId'];

 $resourceId=$newdata['resourceId'];
$referenceNumber='';
$userId=0;
$startDateTime=0;
$endDateTime=0;

			?>
			
			
			<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LUXOR</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <style>
    
    
    .gold {
        color: #a17f22;
    }
    .black {
        color: #000;
    }
    .title {
        font-size: 2em;
    }
	.sub-title {
        font-size: 1em;
    }
    .gradient {
        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#a17f22+0,ffffff+50,a17f22+100 */
        background: #a17f22; /* Old browsers */
        background: -moz-linear-gradient(left,  #a17f22 0%, #ffffff 50%, #a17f22 100%); /* FF3.6-15 */
        background: -webkit-linear-gradient(left,  #a17f22 0%,#ffffff 50%,#a17f22 100%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to right,  #a17f22 0%,#ffffff 50%,#a17f22 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a17f22', endColorstr='#a17f22',GradientType=1 ); /* IE6-9 */

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
	 .heig {
  height:60px;
      color: white;
}
.short-div {
  height:30px;
}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="
    background-image: url(images/Wallpaper.jpg);
    background-size: 100% 100%;
    background-repeat: no-repeat;
">

    

    <!-- Page Content -->
    <div class="container brown-bg" style='width: 100%;    height: 750px'>

        <div class="row">
            <div class="col-xs-12 brown-bg" style='text-align:center;'> 
                <h1 class="gold title"><image src='images/Sofitel Hotel Logo 150.png'></h1>
                <!--h3 class="gold sub-title"> LUXURY HOTEL</h3-->
            </div> 
        </div>
		<div class="row">
            <div class="col-xs-12 brown-bg" style='text-align:center;'>
                 <h2 style='color:white;' class="text-center">Today's Event</h2>
            </div>
         </div> 
		 <div class="row res"> 
            <div class="col-xs-12 brown-bg" style='text-align:center;'>
				<div class="res">	
				<?php
			  $i=0;
		
		foreach($newkey as $val)
		{		
		$getResource1 = $bookedapiclient->getReservation($val['referenceNumber']);
		
		
		
		
	  $i=$i+1;
	  ?>
			
				<div class="row heig"> 
					 <div class="col-md-2"></div>
					 <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 heig" style="background-color:#666666;    border-bottom: 2px solid #3fa63b;"> 
					 
					 
					 <?php

 $image=$getResource1['customAttributes'][1]['value'];


					 if($getResource1['customAttributes'][1]['value']=='right.png' ){ ?><image style='height: auto;    margin-left: -10px;
    margin-top: 11px;' src='http://dev1.fmgegypt.net/api/images/<?php echo $image; ?>'><?php } ?>
					 </div> 
					 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 heig" style="background-color:#026900;    border-bottom: 2px solid #3fa63b;"><?php echo $getResource1['title'];?></div> 
					 <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 heig" style="background-color:#666666;    width: 3.333333% !important;    border-bottom: 2px solid #3fa63b;"></div> 
					 <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 heig" style="padding:0px;    border-bottom: 2px solid #3fa63b;">
					 <div class="short-div heig" style="background-color:#026900 ;   border-bottom: 2px solid #3fa63b;"><?php echo $val['description'];?></div>
					 <div class="short-div heig" style="background-color:#026900 ;   border-bottom: 2px solid #3fa63b;"><?php echo $val['resourceName'];?></div>
				    </div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 heig" style="background-color:#666666;    border-bottom: 2px solid #3fa63b;"><?php if($getResource1['customAttributes'][1]['value']=='left.png'){ ?><image style='height: auto;    margin-left: -10px;
    margin-top: 11px;' src='http://dev1.fmgegypt.net/api/images/<?php echo $image; ?>'><?php } ?></div>
					<div class="col-md-2"></div>
				</div>
		<?php
		}
			?>		
		</div>
		</div>
	</div>
 </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>


<!-- Mirrored from dev1.fmgegypt.net/api/summury by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Nov 2016 18:46:16 GMT -->
</html>
