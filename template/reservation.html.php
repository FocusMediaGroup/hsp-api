<style>
  .shadow {
    box-shadow: 0 1px 1.5px 1px rgba(0,0,0,.12);
    -webkit-box-shadow: 0 1px 1.5px 1px rgba(0,0,0,.12);
  }

  .box {
    padding: 10px;
    background: #fff;
    border-radius: .2em;
    box-sizing: border-box;
  }

  .box h2 {
    font-size: 20px;
    margin-bottom: 10px;
    padding: 5px 10px;
    border-bottom: 1px solid #ccc;
  }

  .box .top-button {
    position: absolute;
    top: 9px;
    right: 10px;
    padding: 5px;
    font-size: 20px;
    color: #333;
    border: 1px solid #ccc;
    border-radius: 5px 5px 0 0;
    cursor: pointer;
    -webkit-transition: all 500ms;
    -moz-transition: all 500ms;
    -ms-transition: all 500ms;
    transition: all 500ms;
  }

  .box .top-button:hover {
    color: #fff;
    background: #01bcff;
    border-color: #01bcff;
  }
  #example .box {
    display: inline-block;
    /*margin: 0 auto;*/
    width: 400px;
    height: 200px;
    -webkit-transition: all 1000ms;
    -moz-transition: all 1000ms;
    -ms-transition: all 1000ms;
    -o-transition: all 1000ms;
    transition: all 1000ms;
  }

  #example #box-button p .waves-button {
    margin: 0px 10px;
  }

  #example #box-icon {
    top: 450px;
    left: 100%;
  }

  #example.show #box-icon {
    left: 50%;
  }

  #example #box-icon p .waves-circle {
    margin: 0 8px;
  }

  #example #box-other {
    top: 700px;
    height: 450px;
    left: 0%;
  }

  #example.show #box-other {
    left: 50%;
  }

  #example .boxes {
    width:125px;
    height:125px;
    text-align:center;
    padding:55px 0;
    margin:10px 30px;
    float:left;
    box-sizing:border-box;
    border-radius:0px;
  }

  #example .flat-box {
    border: 1px solid #ccc;
  }

  #example .float-box {
    background:#ff4f0f;
    color:#fff;
  }

  #example .large-box {
    width: 310px;
    background: #2387c6;
    color: #fff;
  }

  #example #box-other img {
    width: 260px;
    height: auto;
  }

  #example #box-action {
    top: 1200px;
    left: 100%;
    margin-bottom: 40px;
  }

  #example.show #box-action {
    left: 50%;
  }
  #colored-button .btn { color: #fff; }
  #colored-button a, 
  #colored-button a:hover { background: #01BCFF; }
  #colored-button button,
  #colored-button button:hover { background: #1bb556; }
  #colored-button input,
  #colored-button input:hover { background: #ff4f0f; }

  .event-container{
    width: 708px;
    margin: 0 auto;
  }
  .left-col, .middle-col, .right-col{
    display: inline-block;
    margin-left: -2px;
    margin-right: -2px;
  }
  .left-col{
    height: 150px;
    width: 150px;
    background: yellow;
  }
  .right-col{
    height: 150px;
    width: 150px;
    background: green;
  }

</style>
<div class="event-container">
  <div class="left-col">
      <img src="images/tmp/Logobit_digital_black_large.png"
           class="img-responsive" alt="Uber logo" />
  </div>
  <!--<div class="middle-col">-->
    <div id="box-button" class="box shadow">
      <h2>Event Name</h2>
      <div class="">
        Event Start
        Event End
      </div>
      <div class="">
        Room Name
        Floor
        Building
      </div>
      <div class="">
        Icons / directions
      </div>
      <p id="colored-button" class="text-center">
        <a class="btn float-buttons waves-effect waves-button waves-float cbutton cbutton--effect-boris">Button A</a>
        <button class="btn float-button-light waves-effect waves-button waves-float waves-light">Button B</button>
        <i class="btn float-buttons waves-input-wrapper waves-effect waves-button waves-float" style="color:rgb(255, 255, 255);background:rgb(255, 79, 15)"><input class="waves-button-input" type="submit" value="Button C" style="background-color:rgba(0,0,0,0);"></i>
      </p>
    </div>
  <!--</div>-->
  <div class="right-col">
      Event Description
  </div>
</div>