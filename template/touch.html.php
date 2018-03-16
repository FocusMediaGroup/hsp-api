<?php
include_once 'head.html.php';
include_once 'header.html.php';
?>
<div class="container-fluid" id="content">
  <style>
    /*http://fian.my.id/Waves/#examples*/
    /*https://hoxxep.github.io/snarl/*/
    #touch-icon{
      position: fixed;
      bottom: 0;
      right: 0;
    }

    .mat-label {
      display: block;
      font-size: 2em;
      transform: translateY(100px);
      color: #e2e2e2;
      transition: all 0.5s;
    }

    .mat-input {
      position: relative;
      background: transparent;
      width: 100%;
      border: none;
      outline: none;
      padding: 8px 0;
      font-size: 5em;
      color: #FFF;
      text-transform: uppercase;
    }

    .mat-div {
      padding: 30px 0 0 0;
      position: relative;
    }

    .mat-div:after, .mat-div:before {
      content: "";
      position: absolute;
      display: block;
      width: 100%;
      height: 2px;
      background-color: #e2e2e2; 
      bottom: 0;
      left: 0;
      transition: all 0.5s;
    }

    .mat-div::after {
      background-color: #000;
      transform: scaleX(0);
    }

    .is-active::after {
      transform: scaleX(1);
    }

    .is-active .mat-label {
      color: #000;
    }

    .is-completed .mat-label {
      font-size: 12px;
      transform: translateY(0);
    }
    .ui-keyboard{
      bottom: calc(40% - 240px);
    }
  </style>
  <!-- Page Content -->
  <div class="line"></div>
  <div id="coords"></div>
</div>
<!-- Search-->
<div id="search">

  <div class="mat-div">
    <label for="search-me" class="mat-label">Search me</label>
    <input type="text" class="mat-input" id="search-me">
  </div>

  <!--  <div class="row">
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
    </div>-->
</div>
<img src="images/Hand-Touch-icon-black.png" alt=""
     id="touch-icon"
     width="100"/>
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
