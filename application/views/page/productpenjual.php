<!-- Featured Section End -->
<div class="container">
    <div class="row">
        <div class="col-lg-3 d-none d-sm-none d-md-none d-lg-block bg-light px-0">
            <hr />
            <div class="col-12 px-0">
                <hr />
            </div>
            <div class="col-12 px-0">
                <a href="<?= base_url('productpenjual') ?>" class="btn btn-dark btn-block rounded-0 text-left">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i> Barang yang dijual
                </a>
            </div>
            <div class="col-12 px-0">
                <a href="<?= base_url('stuff/upload') ?>" class="btn btn-secondary btn-block rounded-0 text-left">
                    <i class="fa fa-upload" aria-hidden="true"></i> Upload barang
                </a>
            </div>
            <div class="col-12 px-0">
                <a href="<?= base_url('datapemesananpenjual') ?>" class="btn btn-secondary btn-block rounded-0 text-left" role="tab" aria-controls="home">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i> Data pemesanan
                </a>
            </div>
            <hr />
        </div>
        <div class="col-12 col-md-12 col-sm-12 col-lg-9 ">
            <h3 class="text-dark my-3">Barang dijual </h3>

            <div class="row">
                <!-- Page Content -->
                <!-- QUERY MENU -->
                <?php
                $username = $this->session->userdata('username');
                $this->db->where('username =', $username);
                $this->db->or_where('telepon =', $username);
                $user = $this->db->get('user')->row_array();
                $id = $user['id_user'];

                $query = $this->db->query("SELECT * FROM barang where id_user = '$id' ");
                $cek_data = $query->num_rows; ?>
                <?php if ($cek_data = null) { ?>
                    <img class="mt-5" src="<?= base_url('snippets/img/logo2.png') ?>">
                    <h3 class="my-3 mb-5 text-center text-dark mx-auto"> Keranjang kosong, Silahkan lakukan upload barang</h3>
                <?php } else { ?>
                    <?php foreach ($query->result_array() as $data) : ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 mix <?= $data['jenisbarang'] ?> ">
                            <div class="featured__item pb-3 ">

                                <?php
                                $this->db->where('id_barang =', $data['id_barang']);
                                $this->db->limit(10);
                                $querygambar = $this->db->get('barangimg')->row_array();
                                ?>

                                <div class="featured__item__pic set-bg" data-setbg="<?php echo base_url(); ?>snippets/img/barang/<?= $querygambar['image'] ?> ">

                                </div>
                                <div class="featured__item__text">
                                    <h5 class="mb-2">Rp. <?= $data['hargabarang'] ?></h5>
                                    <div class="col-12 star">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <hr class="bg-dark">
                                    <h6><a href="#"><?= $data['namabarang'] ?></a></h6>
                                    <a class="btn btn-warning text-dark primary-color" href="<?= base_url('detailbarang_dijual/index/' . $data['id_barang']) ?>">Edit Barang</a>
                                    <a class="btn btn-warning text-dark bg-danger" href="<?= base_url('detailbarang_dijual/delete_product/' . $data['id_barang']) ?>">Hapus Barang</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php } ?>

            </div>




        </div>
    </div>

</div>