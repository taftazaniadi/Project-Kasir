<div class="row">
    <div class="col-sm-6 mb-4 mb-xl-0">
        <div class="d-lg-flex align-items-center">
            <div>
                <h3 class="text-dark font-weight-bold mb-2">Stok Inventory!</h3>
                <h6 class="font-weight-normal mb-2">Powder Segala Menu , toppping dan extra</h6>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
	<div class="col-lg-4 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Powder</h4>
	      <div class="table-responsive">
	        <table class="table table-hover">
	          <thead>
	            <tr bgcolor="aqua">
	              <th>Nama Menu</th>
                  <th>Jenis Menu</th>
                  <th>Sisa</th>
                  <th>Status</th>
	            </tr>
	          </thead>
	          <tbody>
                <?php
                    foreach ($inv_powder as $key => $value) {
                        ?>
                            <tr>
                                <td><?=$value->nama_powder?></td>
                                <td><?=$value->nama_jenis?></td>
                                <td><?=$value->sisa?></td>
                                <td>                                    
                                    <?php
                                        $sisa = $value->sisa;
                                        if($sisa > 10){
                                            ?>
                                                <button class="btn btn-success btn-sm"><span class="mdi mdi-check"></span></button>
                                            <?php
                                        }
                                        else if($sisa < 10 && $sisa > 0){
                                            ?>
                                                <button class="btn btn-warning btn-sm"><span class="mdi mdi-information-variant"></span></button>
                                            <?php
                                        }
                                        else{
                                            ?>
                                                <button class="btn btn-danger btn-sm"><span class="mdi mdi-close"></span></button>
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                        <?php
                    }
                ?>           		
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>

    <div class="col-lg-4 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Topping</h4>
	      <div class="table-responsive">
	        <table class="table table-hover">
	          <thead>
	            <tr bgcolor="aqua">
	              <th>Nama Topping</th>
                  <th>Sisa</th>
                  <th>Status</th>
	            </tr>
	          </thead>
	          <tbody>
                <?php
                    foreach ($inv_topping as $key => $value) {
                        $sisa = $value->sisa;
                        ?>
                            <tr>
                                <td><?=$value->nama_topping?></td>
                                <td><?=$sisa?></td>
                                <td>                                    
                                    <?php
                                        if($sisa > 10){
                                            ?>
                                                <button class="btn btn-success btn-sm"><span class="mdi mdi-check"></span></button>
                                            <?php
                                        }
                                        else if($sisa < 10 && $sisa > 0){
                                            ?>
                                                <button class="btn btn-warning btn-sm"><span class="mdi mdi-information-variant"></span></button>
                                            <?php
                                        }
                                        else{
                                            ?>
                                                <button class="btn btn-danger btn-sm"><span class="mdi mdi-close"></span></button>
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                        <?php
                    }
                ?>           		
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>

    <div class="col-lg-4 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Ekstra</h4>
	      <div class="table-responsive">
	        <table class="table table-hover">
	          <thead>
	            <tr bgcolor="aqua">
	              <th>Nama Extra</th>
                  <th>Sisa</th>
                  <th>Status</th>
	            </tr>
	          </thead>
	          <tbody>
                <?php
                    foreach ($ekstra as $key => $value) {
                        ?>
                            <tr>
                                <td><?=$value->nama_ekstra?></td>
                                <td><?=$value->sisa?> <?=$value->satuan?></td>
                                <td>                                    
                                    <?php
                                        $sisa = $value->sisa;
                                        if($sisa > 5){
                                            ?>
                                                <button class="btn btn-success btn-sm"><span class="mdi mdi-check"></span></button>
                                            <?php
                                        }
                                        else if($sisa < 5 && $sisa > 0){
                                            ?>
                                                <button class="btn btn-warning btn-sm"><span class="mdi mdi-information-variant"></span></button>
                                            <?php
                                        }
                                        else{
                                            ?>
                                                <button class="btn btn-danger btn-sm"><span class="mdi mdi-close"></span></button>
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                        <?php
                    }
                ?>           		
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
	
</div>
