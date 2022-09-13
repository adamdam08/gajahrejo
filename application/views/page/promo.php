<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                        <!-- QUERY MENU -->
                        <?php
                        $username = $this->session->userdata('username');
                        $this->db->where('username =', $username);
                        $this->db->or_where('telepon =', $username);
                        $user = $this->db->get('user')->row_array();
                        $id = $user['id_user'];

                        $query = $this->db->query("SELECT * FROM barang where id_user != '$id' and diskon != '0';");
                        foreach ($query->result_array() as $data) : ?>

                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="product__discount__item">
                                    <!-- Query gambar -->
                                    <?php
                                    $this->db->where('id_barang =', $data['id_barang']);
                                    $this->db->limit(10);
                                    $querygambar = $this->db->get('barangimg')->row_array();
                                    ?>
                                    <!-- Query favourite -->
                                    <?php
                                    $this->db->where('id_barang =', $data['id_barang']);
                                    $this->db->where('id_user =', $id);
                                    $this->db->limit(10);
                                    $queryfavourite = $this->db->get('favourite')->row_array();
                                    ?>
                                    <div class="product__discount__item__pic set-bg" data-setbg="<?php echo base_url(); ?>snippets/img/barang/<?= $querygambar['image'] ?>">
                                        <div class="product__discount__percent"><?= $data['diskon'] ?>% OFF</div>
                                        <?php
                                        if ($id != null) { ?>
                                            <?php if ($queryfavourite == null) { ?>
                                                <a href="<?= base_url('favourite/add/' . $data['id_barang']) ?>">
                                                    <img src="<?php echo base_url(); ?>snippets/img/unlove_icon.png" class="favourite-icon m-1">
                                                </a>
                                            <?php } else { ?>
                                                <a href="<?= base_url('favourite/remove/' . $data['id_barang']) ?>">
                                                    <img src="<?php echo base_url(); ?>snippets/img/love_icon.png" class="favourite-icon m-1">
                                                </a>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <h5>Rp. <?= $data['hargabarang'] ?></h5>
                                        <hr class="bg-dark">
                                        <h6><?= $data['namabarang'] ?></h6>
                                        <a class="btn btn-warning text-dark primary-color" href="<?= base_url('buy/index/' . $data['id_barang']) ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Details</a>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach     ?>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>
    </div>
</section>
<!-- Product Section End -->