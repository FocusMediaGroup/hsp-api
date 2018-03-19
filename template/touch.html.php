<?php

include_once 'head.html.php';
include_once 'header.html.php';
?>
<style>
  /*http://fian.my.id/Waves/#examples*/
  /*https://hoxxep.github.io/snarl/*/
  #content{
    position: fixed;
    top: 20%;
    left: 50%;
    margin-left: -37.5%;
    width: 75%;
    height: 10%;
    z-index: 100;
  }
</style>
<div class="container-fluid content">
  <!-- Page Content -->
  <div id="content">
  </div>
</div>
<!--<div class="line"></div>-->
<!--<div id="coords"></div>-->
<div id="results"></div>
<!-- Search-->
<div id="search" class="text-center">
  <div class="mat-div">
    <label for="search-me" class="mat-label">Tap here to Search</label>
    <input type="text" class="mat-input" id="search-me">
  </div>
  <img src="images/Hand-Touch-icon-white.png" alt=""
       id="touch-icon"
       width="100"
       style="opacity: 1;"
       />
</div>
<div class="text-center page-icon">
  <a href="touch"><span class="glyphicon glyphicon-refresh text-white" 
                        ></span></a>
</div>
<!-- /.Search-->
<div class="row custom-btns hide">
  <div class="col-md-2">
    <button class="btn btn-block bg-orange">GrEEK</button>
  </div>
  <div class="col-md-2">
    <button class="btn btn-block bg-red">LIBRARY</button>
  </div>
  <div class="col-md-2">
    <button class="btn btn-block bg-yellow">WALLACE</button>
  </div>
  <div class="col-md-2">
    <button class="btn btn-block bg-green">FALAKI</button>
  </div>
  <div class="col-md-2">
    <button class="btn btn-block bg-blue">JAMEEL</button>
  </div>
  <div class="col-md-2">
    <button class="btn btn-block bg-grey"><i class="glyphicon glyphicon-home" ></i></button>
  </div>
</div>
<!-- /.container -->
<?php include_once 'footer.html.php'; ?>
