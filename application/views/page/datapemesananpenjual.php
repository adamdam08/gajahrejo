<script src="<?php echo base_url(); ?>snippets/js/search.js"></script>
<div class="container">
    <div class="row">
        <div class="col-lg-3 d-none d-sm-none d-md-none d-lg-block bg-light px-0">
            <div class="col-12 px-0">
                <a href="<?= base_url('productpenjual') ?>" class="btn btn-secondary btn-block rounded-0 text-left">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i> Barang yang dijual
                </a>
            </div>
            <div class="col-12 px-0">
                <a href="<?= base_url('stuff/upload') ?>" class="btn btn-secondary btn-block rounded-0 text-left">
                    <i class="fa fa-upload" aria-hidden="true"></i> Upload barang
                </a>
            </div>
            <div class="col-12 px-0">
                <a href="<?= base_url('datapemesananpenjual') ?>" class="btn btn-dark btn-block rounded-0 text-left" role="tab" aria-controls="home">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i> Data pemesanan
                </a>
            </div>
        </div>
        <div class="col-12 col-md-12 col-sm-12 col-lg-9 ">
            <!-- Page Content -->
            <div class="row mt-2 mb-1 my-3">
                <div class="mt-2 mb-3 col-12 d-lg-none" id="page-content-wrapper">
                    <button type="button" class="btn btn-warning form-control primary-color text-dark " data-toggle="collapse" data-target="#demo">Menu</button>
                    <div id="demo" class="collapse">
                        <a href="<?= base_url('productpenjual') ?>" class="btn btn-secondary form-control border-warning">Barang yang dijual</a>
                        <a href="<?= base_url('stuff/upload') ?>" class="btn btn-secondary form-control border-warning">Upload Barang</a>
                        <a href="<?= base_url('datapemesananpenjual') ?>" class="btn btn-secondary form-control border-warning">Data Pemesanan</a>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6">
                    <h3 class="mb-3">Data pemesanan barang </h3>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="form-row">
                        <div class="col col-sm-12">
                            <input type="text" id="Search" onkeyup="myFunction()" class="form-control w-100 mx-1 " placeholder="Cari menggunakan ID..">
                        </div>
                    </div>
                </div>
            </div>

            <?php foreach ($receipt as $datapesan) : ?>
                <?php
                // Query data barang
                $this->db->where('id_barang =', $datapesan->id_barang);
                $databarang = $this->db->get('barang')->row_array();

                //  Query Gambar        
                $this->db->where('id_barang =', $datapesan->id_barang);
                $this->db->limit(1);
                $querygambar = $this->db->get('barangimg')->row_array();

                ?>

                <div class="card my-3 target" style="width:100% !important">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                <img src="<?= base_url('snippets/img/barang/' . $querygambar['image']) ?>" class="" />
                            </div>
                            <div class="col-6 col-lg-4">
                                <div class="col-12">
                                    <h5 class="my-3">
                                        Nama barang : <br />
                                        <?= $databarang['namabarang']; ?>
                                    </h5>
                                </div>
                                <div class="col-12">
                                    <h5 class="my-5">
                                        ID pemesanan : <br />
                                        <?= $datapesan->id_pemesanan ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4  ">
                                <div class="col-12">
                                    <h5 class="my-3">
                                        Jumlah pembelian : <br />
                                        <?= $datapesan->jumlah ?>
                                    </h5>
                                </div>
                                <div class="col-12">
                                    <h5 class="my-5">
                                        Total harga : <br />
                                        <?= $datapesan->jumlah * $databarang['hargabarang']; ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12 clearfix">
                                <?php if ($datapesan->status_pembelian == "konfirmasi") { ?>
                                    <a href="<?= base_url('ereceipt/cetak/' . $datapesan->id_pemesanan) ?>" class="btn btn-warning primary-color float-right mx-1">Cetak E-receipt</a>
                                <?php } else { ?>
                                    <a href="<?= base_url('Datapemesananpenjual/konfirmasi/' . $datapesan->id_pemesanan) ?>" class="btn btn-warning primary-color float-right mx-1">Konfirmasi</a>
                                    <a href="<?= base_url('Datapemesananpenjual/tolak/' . $datapesan->id_pemesanan) ?>" class="btn btn-danger float-right mx-1">Tolak</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>


        </div>
    </div>

</div>