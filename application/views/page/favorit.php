<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Favourite product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter=".coffee">
                            <img src="<?php echo base_url(); ?>snippets/img/icon/coffe.png" width="70px;">
                            <h5 class="mb-1">Coffee</h5>
                        </li>
                        <li data-filter=".food">
                            <img src="<?php echo base_url(); ?>snippets/img/icon/snack.png" width="70px;">
                            <h5 class="mb-1">food</h5>
                        </li>
                        <li data-filter=".other">
                            <img src="<?php echo base_url(); ?>snippets/img/icon/other.png" width="70px;">
                            <h5 class="mb-1">Other</h5>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">

            <!-- QUERY MENU -->
            <?php
            $username = $this->session->userdata('username');
            $this->db->where('username =', $username);
            $this->db->or_where('telepon =', $username);
            $user = $this->db->get('user')->row_array();
            $id = $user['id_user'];

            $query = $this->db->query("SELECT * FROM barang where id_barang = ANY ( SELECT id_barang FROM favourite where id_user = $id )");
            foreach ($query->result_array() as $data) : ?>

                <div class="col-lg-3 col-md-4 col-sm-6 mix <?= $data['jenisbarang'] ?> ">
                    <div class="featured__item pb-3 ">

                        <?php
                        // Query gambar
                        $this->db->where('id_barang =', $data['id_barang']);
                        $this->db->limit(10);
                        $querygambar = $this->db->get('barangimg')->row_array();

                        // Query favourite
                        $this->db->where('id_barang =', $data['id_barang']);
                        $this->db->where('id_user =', $id);
                        $this->db->limit(10);
                        $queryfavourite = $this->db->get('favourite')->row_array();
                        ?>

                        <div class="featured__item__pic set-bg" data-setbg="<?php echo base_url(); ?>snippets/img/barang/<?= $querygambar['image'] ?> ">
                            <?php if ($id != null) { ?>
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
                            <a class="btn btn-warning text-dark primary-color" href="<?= base_url('buy/index/' . $data['id_barang']) ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach     ?>

        </div>
    </div>
</section>
<!-- Featured Section End -->