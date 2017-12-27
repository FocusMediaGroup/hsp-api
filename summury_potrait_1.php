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
	
    <title>Mercure Notes</title>
    <!-- bootstrap core files  -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="css/design3.css" />

    

    <!-- Bootstrap Core CSS -->
    <link href="css/responsive.css" rel="stylesheet" />

    <!-- Custom CSS -->
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        .table > tbody > tr > td {
            vertical-align: middle;
            text-align:center;
        }
        
    </script>
        
</head>

<body style="overflow:scroll; height: 150px;">

    <!-- Page Content -->
    <div class="wrapper" style="position: relative !important;">
        <div class="row">
            <center><img src="images/logo.png" alt="" /></center>
        </div>
        <div class="row bar">
            <h4>Meetings</h4>
        </div>
        <div class="row" >
            <table class="table">
                <tbody>
                    <?php
                        foreach($newkey as $val) {
//                            echo $val['referenceNumber'] . "<br/>";
                            $getResource1 = $bookedapiclient->getReservation($val['referenceNumber']);
//                            echo print_r($getResource1) . "<br/>";
                            $imageFilename = NULL;
                            foreach ($getResource1['customAttributes'] as $customAttrs) {
                                if($customAttrs['label'] == 'image'){
                                    $imageFilename = $customAttrs['value'];
                                }
                            }

                            $logoFilename = NULL;
                            foreach ($getResource1['customAttributes'] as $customAttrs) {
                                if($customAttrs['label'] == 'logo'){
                                    $logoFilename = $customAttrs['value'];
                                }
                            }
                    ?>
        
                            <tr>
                                <td class="col-md-3" rowspan="2" style="border: 0px; solid #fff;"></td>
                                <td class="col-lg-3 col-md-2 col-sm-3 col-xs-4" rowspan="2" style="padding: 2px;">
                                    <?php
                                        echo $logoFilename != NULL ? 
                                            "<image class='img-responsive center-block' style='min-width:60px; width:70px; margin-left:0px;' src='images/logos/" . $logoFilename . "' />" :
                                            $getResource1['title'];
                                    ?>
                                </td>
                                <td class="col-lg-2 col-md-2 col-sm-3 col-xs-4" style="padding: 0px;">
                                    <?php echo $val['description']; ?>
                                </td>
                                <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1 heig" rowspan="2" style="padding: 0px;">
                                    <?php
                                        if($imageFilename != NULL){
                                            echo "<image class='img-responsive center-block' style='min-width:40px; width:50px' src='images/" . $imageFilename . "' />";
                                        }
                                    ?>
                                </td>
                                <td class="col-md-3" rowspan="2" style="border: 0px; solid #fff;"></td>
                            </tr>
                            <tr>
                                <td class="col-lg-2 col-md-2 col-sm-3 col-xs-4 heig" style="padding: 0px; border: 0px; solid #fff; border-bottom: 1px; solid #000;">
                                    <?php echo $val['resourceName']; ?>
                                </td>
                            </tr>
                    
                    <?php } ?>
                </tbody>
            </table>
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
