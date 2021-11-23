<?php include_once 'template/control-head.html.php'; ?>
<header>
    <div class="container-fluid">
        <h1 class=" pull-left text-uppercase">HSP Control Panel</h1>
        <h1 class=" pull-right">
            <img src='images/fmg-logo.jpeg'/>
        </h1>
    </div>
</header>
<div class="container" id="content">
    <form>
        <div class="well logo-well">
            <div class="form-group logo-uploader">
                <label>Logo <input type="file" class="form-control"/></label>
            </div>
            <div class="preview">
                <img src='images/Sofitel Hotel Logo 150.png'/>
            </div>
        </div>
        <div class="well bg-well">
            <div class="form-group">
                <label class="control-label">
                    Background Color: <input class="form-control" value="#3399FF80" data-jscolor="{}"/>
                </label>
            </div>
            <div class="preview">
                <div class="bg-color" style="background-color: #3399FF80;width: 100px; height: 100px"></div>
            </div>
        </div>
        <div class="well font-well">
            <div>
                <h3>Font size</h3>
                <div class="form-group"><label class="control-label">Body <input class="form-control"
                                                                                 type="number" value="14"/></label>
                </div>
                <div class="form-group"><label class="control-label">Heading 1<input class="form-control"
                                                                                     type="number" value="36"/></label>
                </div>
                <div class="form-group"><label class="control-label">Heading 2<input class="form-control"
                                                                                     type="number" value="30"/></label>
                </div>
                <div class="form-group"><label class="control-label">Time & Date <input class="form-control"
                                                                                        type="number"
                                                                                        value="18"/></label>
                </div>
            </div>
            <div class="preview">
                <div class="body-text">Body</div>
                <div class="h1-text h1">Heading 1</div>
                <div class="h2-text h2">Heading 2</div>
                <div class="date-text">Date & Time</div>
            </div>
        </div>
        <div class="well banner-well">
            <div class="banner-uploader">
                <div class="form-group"><label class="control-label">No Event Banner<input class="form-control"
                                                                                           type="file"/></label></div>
            </div>
            <div class="preview">
                <img class="img-responsive" src="images/no-event-banner.png" alt="No Event Banner"/>
            </div>
        </div>
        <div class="text-right">
            <input type="reset" class="btn btn-default" value="Reset"/>
            <input type="submit" class="btn btn-primary" value="Save"/>
        </div>

    </form>
</div>
<!-- /.container-fluid -->
<?php include_once 'template/footer.html.php'; ?>
