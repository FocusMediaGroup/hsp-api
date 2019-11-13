<!DOCTYPE html>
<html>
  <?php include_once 'parts/head.html.php'; ?>
  <body>
    <div class="page">
      <?php include_once 'parts/header.html.php'; ?>
      <div class="page-content d-flex align-items-stretch"> 
        <?php include_once 'parts/sidbar.html.php'; ?>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Dashboard</h2>
            </div>
          </header>
          <section class="forms"> 
            <div class="container-fluid">
              <div class="card">
                <div class="card-close">
                  <div class="dropdown">
                    <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                    <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow">
                      <a href="#" class="dropdown-item reset"> <i class="fa fa-gear"></i>Reset</a>
                    </div>
                  </div>
                </div>
                <div class="card-header d-flex align-items-center">
                  <h3 class="h4">Background Form</h3>
                </div>
                <div class="card-body">
                  <p>Lorem ipsum dolor sit amet consectetur.</p>
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label" for="background-color">Background color</label>
                      <div class="col-sm-9">
                        <input id="background-color" type="email" placeholder="Background color" class="form-control form-control-success"><small class="form-text">HEX Color Value</small>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label" for="background-image">Background image</label>
                      <div class="col-sm-9">
                        <input id="background-image" type="password" placeholder="Pasword" class="form-control form-control-warning"><small class="form-text">Example help text that remains unchanged.</small>
                      </div>
                    </div>
                    <div class="form-group row">       
                      <div class="col-sm-9 offset-sm-3">
                        <input type="submit" value="Signin" class="btn btn-primary">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <?php include_once 'parts/footer.html.php'; ?>
        </div> <!-- .content-inner -->
      </div> <!-- .page-content -->
    </div> <!-- .page -->
  </body>
</html>