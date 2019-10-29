<?php error_reporting(E_ALL ^ E_WARNING); ?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Import Data Menu</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="Dashboard">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Inventaris</span></li>
                <li><span>Menu</span></li>
                <li><span>Import Data</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>
    <!-- start: page -->
    <div class="row">
        <section class="panel">
            <div class="panel-body">
                <label style="margin-top: 5px;float: left;font-weight: normal;font-size: 20px;">Download Format Import</label>
                <div class="col-sm-offset-4">
                    <div class="mb-md-edit">
                        <a href="Template/Import/Powder.csv" download="Powder.csv"><button class="btn btn-primary" id="powder">Powder &nbsp; <i class="fa fa-cloud-download"></i></button></a>&nbsp;
                        <a href="Template/Import/Topping.csv" download="Topping.csv"><button class="btn btn-warning" id="topping">Topping &nbsp; <i class="fa fa-cloud-download"></i></button></a>&nbsp;
                        <a href="Template/Import/Ekstra.csv" download="Ekstra.csv"><button class="btn btn-success" id="ekstra">Ekstra &nbsp; <i class="fa fa-cloud-download"></i></button></a>&nbsp;
                        <a href="Menu"><button class="btn btn-danger">Back &nbsp; <i class="fa fa-mail-reply-all"></i></button></a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>
                    <h2 class="panel-title">Import Data</h2>
                </header>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#Powder" data-toggle="tab">Powder</a>
                        </li>
                        <li>
                            <a href="#Topping" data-toggle="tab">Topping</a>
                        </li>
                        <li>
                            <a href="#Ekstra" data-toggle="tab">Ekstra</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="Powder" class="tab-pane active">
                            <form action="module/menu/import/upload.php" class="dropzone dz-square dz-clickable" id="drop dropzone-example">
                                <div class="dz-default dz-message"><span>Drop files here to upload Powder</span></div>
                            </form>
                        </div>
                        <div id="Topping" class="tab-pane">
                            <form action="#" class="dropzone dz-square dz-clickable" id="drop dropzone-example frmTarget-topping" method="POST" enctype="multipart/form-data" name="import">
                                <div class="dz-default dz-message"><span>Drop files here to upload Topping</span></div>
                            </form>
                        </div>
                        <div id="Ekstra" class="tab-pane">
                            <form action="#" class="dropzone dz-square dz-clickable" id="drop dropzone-example frmTarget-ekstra" method="POST" enctype="multipart/form-data" name="import">
                                <div class="dz-default dz-message"><span>Drop files here to upload Ekstra</span></div>                                
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>