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
            <h3 class="content-header-title">Member</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Member
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
				<h4 class="card-title">Data Member</h4>
				<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
				<div class="heading-elements">
				</div>
			</div>
			<div class="card-content collapse show">
				<div class="card-body">
					<p class="card-text">Data Member yang tersedia : </p>
					
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Username</th>
									<th>Saldo</th>
								</tr>
							</thead>
							<tbody>
              
              <?php  foreach ($member as $mem): ?>
									<tr>
										<td width="150">
											<?php echo $mem->username ?>
										</td>
										<td width="150">
											Rp. <?php echo $mem->saldo ?>
										</td>
										<td>
                      
                      <button type="button" data-target="#<?php echo $mem->id_account ?>" class="fas fa-edit" data-toggle="modal" >Edit</button>
                      <a href="" data-toggle="modal" data-target="#hapusModal"><button type="button" class="fas fa-trash">Hapus</button></a>&nbsp;
													<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin untuk menghapus? <?php echo $mem->username ?> </h5>
																	<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">×</span>
																	</button>
																</div>
																<div class="modal-footer">
																	<button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
																	<a id="delete_link" class="btn btn-danger" href="<?php echo base_url('Member/hapus/'. $mem->id_account); ?>">Hapus</a>
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
$no = 1;
foreach ($member as $u) {
?>

	<!-- Modal Update -->
	<div class="modal fade" id="<?php echo $u->id_account ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Data Member</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="<?= base_url('Member/edit') ?>" enctype="multipart/form-data">
						<div class="form-group">
							<input type ="hidden" name="id_account" value="<?php echo $u->id_account ?>">
							<input type ="hidden" name="saldo" value="<?php echo $u->saldo ?>">
							<label for="exampleInputEmail1">Username : <?php echo $u->username ?></label>
							<label for="exampleInputEmail1">Saldo : Rp. <?php echo $u->saldo ?></label>
						</br>w.
								</br>
							<label for="exampleInputEmail1">Tambah Saldo : </label>
              <input type="number" class="form-control" name="tsaldo" id="tsaldo" value="">
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
