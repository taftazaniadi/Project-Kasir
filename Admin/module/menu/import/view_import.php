<?php error_reporting(E_ALL ^ E_WARNING); ?>

<style>
    th { 
      padding: 5px; 
      border-bottom: 2px solid #8ebf42; 
      text-align: center;
      }
</style>

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
                <label style="margin-top:11px;float: left;font-weight: normal;font-size: 20px;">Download Format Import</label>
                <div class="col-sm-offset-4">
                    <div class="mb-md-edit">
                        <a class="mb-xs mt-xs mr-xs modal-basic btn btn-info" href="#modalFullColorInfo">Info <i class="fa fa-info-circle"></i></a>
                        <div id="modalFullColorInfo" class="modal-block modal-full-color modal-block-info mfp-hide">
                            <section class="panel">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Information</h2>
                                </header>
                                <div class="panel-body">
                                    <div class="modal-wrapper">
                                        <div class="modal-icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div>
                                        <div class="modal-text">
                                            <h4>Import Data Powder</h4>
                                            <p>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3" style="text-align:center;">ID Jenis</th>
                                                            <th colspan="4" style="text-align:center;">ID Region</th>
                                                            <th colspan="3" style="text-align:center;">ID Penyajian</th>
                                                            <th style="text-align:center;">Harga</th>
                                                        </tr>
                                                    </thead>
                                                    <tr>
                                                        <td>&nbsp;Basic&nbsp;</td>
                                                        <td>&nbsp;=&nbsp;</td>
                                                        <td>&nbsp;1&nbsp;</td>
                                                        <td colspan="4">&nbsp;(Cek Cabang)&nbsp;</td>
                                                        <td>&nbsp;Basic&nbsp;</td>
                                                        <td>&nbsp;=&nbsp;</td>
                                                        <td>&nbsp;1&nbsp;</td>
                                                        <td>(menyesuaikan)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;Premium&nbsp;</td>
                                                        <td>&nbsp;=&nbsp;</td>
                                                        <td>&nbsp;2&nbsp;</td>
                                                        <td>&nbsp;&nbsp;</td>
                                                        <td>&nbsp;&nbsp;</td>
                                                        <td>&nbsp;&nbsp;</td>
                                                        <td>&nbsp;&nbsp;</td>
                                                        <td>&nbsp;Pure Milk&nbsp;</td>
                                                        <td>&nbsp;=&nbsp;</td>
                                                        <td>&nbsp;2&nbsp;</td>
                                                        <td>(menyesuaikan)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;Soklat&nbsp;</td>
                                                        <td>&nbsp;=&nbsp;</td>
                                                        <td>&nbsp;3&nbsp;</td>
                                                        <td>&nbsp;&nbsp;</td>
                                                        <td>&nbsp;&nbsp;</td>
                                                        <td>&nbsp;&nbsp;</td>
                                                        <td>&nbsp;&nbsp;</td>
                                                        <td>&nbsp;Hot&nbsp;</td>
                                                        <td>&nbsp;=&nbsp;</td>
                                                        <td>&nbsp;3&nbsp;</td>
                                                        <td>(menyesuaikan)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;Choco Premium&nbsp;</td>
                                                        <td>&nbsp;=&nbsp;</td>
                                                        <td>&nbsp;4&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;Yakult&nbsp;</td>
                                                        <td>&nbsp;=&nbsp;</td>
                                                        <td>&nbsp;5&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;Yakult&nbsp;</td>
                                                        <td>&nbsp;=&nbsp;</td>
                                                        <td>&nbsp;4&nbsp;</td>
                                                        <td>(menyesuaikan)</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border-bottom: 2px solid #8ebf42">&nbsp;Fresh and Juice&nbsp;</td>
                                                        <td style="border-bottom: 2px solid #8ebf42">&nbsp;=&nbsp;</td>
                                                        <td style="border-bottom: 2px solid #8ebf42">&nbsp;6&nbsp;</td>
                                                        <td colspan="4" style="border-bottom: 2px solid #8ebf42"></td>
                                                        <td style="border-bottom: 2px solid #8ebf42">&nbsp;Juice&nbsp;</td>
                                                        <td style="border-bottom: 2px solid #8ebf42">&nbsp;=&nbsp;</td>
                                                        <td style="border-bottom: 2px solid #8ebf42">&nbsp;5&nbsp;</td>
                                                        <td style="border-bottom: 2px solid #8ebf42">(menyesuaikan)</td>
                                                        <td colspan="5" style="border-bottom: 2px solid #8ebf42"></td>
                                                    </tr>
                                                </table>
                                                <strong>NB : </strong>Untuk ID Penyajian dan Harga beri tanda "Titik Koma" (;) sebagai pembatas jika lebih dari satu penyajian.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button class="btn btn-default modal-dismiss">Close</button>
                                        </div>
                                    </div>
                                </footer>
                            </section>
                        </div>
                        <!-- TEST -->

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
                            <a href="#Powder" data-toggle="tab" id="powder">Powder</a>
                        </li>
                        <li>
                            <a href="#Topping" data-toggle="tab" id="topping">Topping</a>
                        </li>
                        <li>
                            <a href="#Ekstra" data-toggle="tab" id="ekstra">Ekstra</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="Powder" class="tab-pane active">
                            <form action="module/menu/import/upload_powder.php" class="dropzone dz-square dz-clickable" id="drop dropzone-example">
                                <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                            </form>
                        </div>
                        <div id="Topping" class="tab-pane">
                            <form action="module/menu/import/upload_topping.php" class="dropzone dz-square dz-clickable" id="drop dropzone-example">
                                <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                            </form>
                        </div>
                        <div id="Ekstra" class="tab-pane">
                            <form action="module/menu/import/upload_ekstra.php" class="dropzone dz-square dz-clickable" id="drop dropzone-example">
                                <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>