
 <?php
// set location
//$address = "Brooklyn+NY+USA";

//set map api url
//$url = "http://dev1.fmgegypt.net/hsp/Web/profile.php";
/*
//call api
$json = file_get_contents($url);
$json = json_decode($json);
//$lat = $json->results[0]->geometry->location->lat;
//$lng = $json->results[0]->geometry->location->lng;
//echo "Latitude: " . $lat . ", Longitude: " . $lng;
//$fname = $json->results[0]->fname->fname;

//echo "fname".$fname;
// output
// Latitude: 40.6781784, Longitude: -73.9441579
$username="api";
$password="api$";

//$username=$_POST['username'];
//$password=$_POST['password'];

if ( isset($username) && isset($password) ){

                 // test1                        Test1

    // request for a 'token' via moodle url
    $json_url = "http://dev1.fmgegypt.net/hsp/Web/profile.php?username=".$_POST['username']."&password=".$_POST['password']."$fname=fname";

    $obj = json_decode($json_url);
    print $obj->{'token'};         // should print the value of 'token'

} else {
    echo "Username or Password was wrong, please try again!";
}
Hello Amir
*/


//$url = "http://dev1.fmgegypt.net/hsp/Web/";
//$response = file_get_contents($url);


?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery.getJSON demo</title>
  <style>
  img {
    height: 100px;
    float: left;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
<div id="images"></div>
 
<script>
(function() {
  var flickerAPI = "http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?";
  $.getJSON( flickerAPI, {
    tags: "mount rainier",
    tagmode: "any",
    format: "json"
  })
    .done(function( data ) {
      $.each( data.items, function( i, item ) {
        $( "<img>" ).attr( "src", item.media.m ).appendTo( "#images" );
        if ( i === 3 ) {
          return false;
        }
      });
    });
})();
</script>
 
</body>
</html>
