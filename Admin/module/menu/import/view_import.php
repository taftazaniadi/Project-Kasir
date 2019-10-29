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
        <div class="col-sm-offset-4">
            <div class="mb-md-edit">
                <a href="Template/Import/Powder.csv" download="Powder.csv"><button class="btn btn-primary" id="powder">Powder &nbsp; <i class="fa fa-cloud-download"></i></button></a>&nbsp;
                <a href="Template/Import/Topping.csv" download="Topping.csv"><button class="btn btn-warning" id="topping">Topping &nbsp; <i class="fa fa-cloud-download"></i></button></a>&nbsp;
                <a href="Template/Import/Ekstra.csv" download="Ekstra.csv"><button class="btn btn-success" id="ekstra">Ekstra &nbsp; <i class="fa fa-cloud-download"></i></button></a>&nbsp;
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
                        <div id="Powder" class="tab-pane-import active">
                            <form action="#" class="dropzone dz-square dz-clickable" id="drop dropzone-example frmTarget drop-powder" method="POST" enctype="multipart/form-data" name="import">
                                <div class="dz-default dz-message"><span>Drop files here to upload Powder</span></div>
                                <div class="detail">
                                    <button class="btn btn-primary" name="kirim" id="kirim-powder">Upload</button>
                                </div>
                            </form>
                        </div>
                        <div id="Topping" class="tab-pane-import">
                            <form action="#" class="dropzone dz-square dz-clickable" id="drop dropzone-example frmTarget drop-topping" method="POST" enctype="multipart/form-data" name="import">
                                <div class="dz-default dz-message"><span>Drop files here to upload Topping</span></div>
                                <div class="detail">
                                    <button class="btn btn-primary" name="kirim" id="kirim-topping">Upload</button>
                                </div>
                            </form>
                      </div>
                        <div id="Ekstra" class="tab-pane-import">
                          <form action="#" class="dropzone dz-square dz-clickable" id="drop dropzone-example frmTarget drop-ekstra" method="POST" enctype="multipart/form-data" name="import">
                              <div class="dz-default dz-message"><span>Drop files here to upload Ekstra</span></div>
                                <div class="detail">
                                    <button class="btn btn-primary" name="kirim" id="kirim-ekstra">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<script>
    Dropzone.options.frmTarget = {
        autoProcessQueue: false,
        url: 'upload_files.php',
        init: function() {

            var myDropzone = this;

            // Update selector to match your button
            $("#button").click(function(e) {
                e.preventDefault();
                myDropzone.processQueue();
            });

            this.on('sending', function(file, xhr, formData) {
                // Append all form inputs to the formData Dropzone will POST
                var data = $('#frmTarget').serializeArray();
                $.each(data, function(key, el) {
                    formData.append(el.name, el.value);
                });
            });
        }
    }
</script>