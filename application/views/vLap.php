	<?php 
    $this->load->view("template/header");
    ?>
  

    <!-- ////////////////////////////////////////////////////////////////////////////-->

	<?php 
    $this->load->view("template/sidebar");
    ?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Laporan Transaksi</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Laporan Transaksi
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">

<!-- Basic Tables start -->
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Data Laporan Transaksi</h4>
				<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
				<div class="heading-elements">
				</div>
			</div>
			<div class="card-content collapse show">
				<div class="card-body">
					<p class="card-text">Data Laporan Transaksi yang tersedia : </p>
					
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Username</th>
									<th>Nama Produk</th>
									<th>Jumlah</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
              
              <?php  foreach ($lap as $laps): ?>
									<tr>
										<td width="150">
											<?php echo $laps->username ?>
										</td>
										<td width="150">
											 <?php echo $laps->nama_produk ?>
										</td>
										<td width="150">
											 <?php echo $laps->jumlah ?>
										</td>
										<td width="150">
											Rp.  <?php echo $laps->total ?>
										</td>
										<td>
                      <a href="" data-toggle="modal" data-target="#hapusModal<?= $laps->id_order ?>"><button type="button" class="fas fa-trash">Hapus</button></a>&nbsp;
													<div class="modal fade" id="hapusModal<?= $laps->id_order ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin untuk menghapus? <?php echo $laps->username ?> </h5>
																	<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">×</span>
																	</button>
																</div>
																<div class="modal-footer">
																	<button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
																	<a id="delete_link" class="btn btn-danger" href="<?php echo base_url('Order/hapusLap/'. $laps->id_order); ?>">Hapus</a>
																</div>
															</div>
														</div>
													</div>
											
										</td>
									</tr>
									<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Basic Tables end -->	


<!-- Bordered table end -->
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


  <?php 
    
    $this->load->view("template/footer");
    ?>
