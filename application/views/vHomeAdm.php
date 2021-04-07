
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
        </div>
        <div class="content-body"><!-- Chart -->
<div class="row match-height">
    <div class="col-12">
        <div class="">
            <div id="gradient-line-chart1" class="height-250 GradientlineShadow1"></div>
        </div>
    </div>
</div>
<!-- Chart -->


<!-- Statistics -->
<div class="row match-height">
    
<div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Produk</h4>
                <a class="heading-elements-toggle">
                    <i class="fa fa-ellipsis-v font-medium-3"></i>
                </a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li>
                            <a data-action="reload">
                                <i class="ft-rotate-cw"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div id="recent-buyers" class="media-list">
                    <?php foreach($barangs as $prod):?>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                        </div>
                        <div class="media-body w-100">
                            <span class="list-group-item-heading"><?php echo $prod->nama_produk?>
                            </span>
                        </div>
                    </a>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
            <div class="card">
               
            </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Member</h4>
                <a class="heading-elements-toggle">
                    <i class="fa fa-ellipsis-v font-medium-3"></i>
                </a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li>
                            <a data-action="reload">
                                <i class="ft-rotate-cw"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div id="recent-buyers" class="media-list">
                    <?php foreach($users as $mem):?>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                        </div>
                        <div class="media-body w-100">
                            <span class="list-group-item-heading"><?php echo $mem->username?>
                            </span>
                        </div>
                    </a>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Statistics -->
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <?php 
    $this->load->view("template/footer");
    ?>

   