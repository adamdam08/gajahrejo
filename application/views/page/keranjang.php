<script src="<?php echo base_url(); ?>snippets/js/search.js"></script>
<div class="container my-5">
    <div class=" mt-2" id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row mt-3 mb-1">
                <div class="col-12 col-sm-8 col-lg-8">
                    <h3 class="mb-3">Data keranjang barang </h3>
                </div>
                <div class="col-12 col-sm-4 col-lg-">
                    <div class="form-row">
                        <div class="col col-sm-12">
                            <input type="text" id="Search" onkeyup="myFunction()" class="form-control w-100 mx-1 " placeholder="Cari menggunakan ID..">
                        </div>

                    </div>
                </div>
            </div>

            <?php if ($receipt == null) { ?>
                <img src="<?= base_url('snippets/img/logo2.png') ?>">
                <h3 class="my-3 text-center text-dark">Keranjang kosong, Silahkan lakukan pembelian</h3>
            <?php } else { ?>
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
                                    <div class="col-12 ">
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
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php } ?>


        </div>
    </div>
</div>