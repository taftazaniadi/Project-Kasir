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
        <div class="col-sm-offset-8">
            <div class="mb-md-edit">
                <a href="template/Template.csv" download="Template.csv"><button class="btn btn-success">Template &nbsp; <i class="fa fa-cloud-download"></i></button></a>&nbsp;
                <a href="Menu"><button class="btn btn-danger">Back &nbsp; <i class="fa fa-mail-reply-all"></i></button></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>
                    <h2 class="panel-title">Import Data Stock Menu</h2>
                </header>
                <div class="panel-body">
                    <form action="#" class="dropzone dz-square dz-clickable" id="drop dropzone-example" method="POST">
                        <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                    </form>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-10">
                            <button class="btn btn-primary" name="kirim" id="kirim">Submit</button>
                        </div>
                    </div>
                </footer>
            </section>
        </div>
    </div>
</section>

<script>
    $("#kirim").click(function(e) {
        e.preventDefault();
        drop.processQueue();
    });
</script>