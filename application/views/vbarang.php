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
            <h3 class="content-header-title">Barang</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Produk
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
				<h4 class="card-title">Data Produk</h4>
				<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
				<div class="heading-elements">
				</div>
			</div>
			<div class="card-content collapse show">
				<div class="card-body">
					<p class="card-text">Data Produk yang tersedia : </p>
					<p><span class="text-bold-600"><button class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah Data Produk</button></span></p>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Nama Produk</th>
									<th>Harga</th>
                  <th>Stok</th>
								</tr>
							</thead>
							<tbody>
              
              <?php  foreach ($barang as $produk): ?>
									<tr>
										<td width="150">
											<?php echo $produk->nama_produk ?>
										</td>
										<td width="150">
											Rp. <?php echo $produk->harga ?>
										</td>
										<td>
											<?php echo $produk->stok ?>
										</td>
										<td>
                      
                      <button type="button" data-target="#<?php echo $produk->id_produk ?>" class="fas fa-edit" data-toggle="modal" >Edit</button>
                      <a href="" data-toggle="modal" data-target="#hapusModal<?php echo $produk->id_produk ?>"><button type="button" class="fas fa-trash">Hapus</button></a>&nbsp;
													<div class="modal fade" id="hapusModal<?php echo $produk->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin untuk menghapus? <?php echo $produk->nama_produk ?> </h5>
																	<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">×</span>
																	</button>
																</div>
																<div class="modal-footer">
																	<button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
																	<a id="delete_link" class="btn btn-danger" href="<?php echo base_url('Produk/hapus/'. $produk->id_produk); ?>">Hapus</a>
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
<!-- Modal Input Baru-->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">INPUT DATA PRODUK</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'Produk/add'; ?>" enctype="multipart/form-data">

        <div class="form-group">
                <label name="nama_produk">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control">
                <label name="harga">Harga</label>
                <input type="number" name="harga" class="form-control">
                <label name="stok">Stok</label>
                <input type="number" name="stok" class="form-control">
                
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>

        </form>
      </div>
    </div>
  </div>
</div>


<?php
$no = 1;
foreach ($barang as $u) {
?>

	<!-- Modal Update -->
	<div class="modal fade" id="<?php echo $u->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Data Produk</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="<?= base_url('Produk/edit') ?>" enctype="multipart/form-data">
						<div class="form-group">
							<input type ="hidden" name="id_produk" value="<?php echo $u->id_produk ?>">
							<label for="exampleInputEmail1">Kode Produk : <?php echo $u->id_produk ?></label>
								</br>
							<label for="exampleInputEmail1">Nama Produk : </label>
              <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="<?php echo $u->nama_produk ?>">
						</div>
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Harga : </label>
              <input type="text" class="form-control" name="harga" id="harga" value="<?php echo $u->harga ?> ">
						</div>
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Stok : </label>
							<input type="text" class="form-control" name="stok" id="stok" value="<?php echo $u->stok ?>">
						</div>
					
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-danger">Save</button>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Model Update End -->
<?php } ?>

  <?php 
    
    $this->load->view("template/footer");
    ?>
