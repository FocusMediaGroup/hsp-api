<?php
include_once 'head.html.php';
include_once 'header.html.php';
?>
<div class="container-fluid" id="content">
  <style>
    /*http://fian.my.id/Waves/#examples*/
    /*https://hoxxep.github.io/snarl/*/
  </style>
  <button class="cbutton cbutton--effect-ivana">
    <i class="cbutton__icon fa fa-fw fa-step-backward"></i>
    <span class="cbutton__text">Backward</span>
  </button>
  <!-- Page Content -->
  <div class="line"></div>
  <div id="coords"></div>
  <!--  <div class="wrap">
      <div class="circle">
        <i class="icon i1 icon-terminal glyphicon glyphicon-console"></i>
        <i class="icon i2 icon-code-fork glyphicon glyphicon-equalizer"></i>
        <i class="icon i3 icon-keyboard glyphicon glyphicon-signal"></i>
        <i class="icon i4 icon-code glyphicon glyphicon-upload"></i>
        <div class="line1"></div>
        <div class="line2"></div>
        <span class="text">hover on me</span>
      </div>
    </div>-->
</div>
<!-- Search-->
<div id="search">
  <div class="row">
    <div id="custom-search-input" class="col-md-8 col-md-offset-2">
      <div class="input-group col-md-12">
        <input type="text" class="form-control input-lg" placeholder="Touch me to search ;)" />
        <span class="input-group-btn">
          <button class="btn btn-info btn-lg" type="button">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </span>
      </div>
    </div>
  </div>
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
