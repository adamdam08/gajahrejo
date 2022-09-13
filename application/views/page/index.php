<!-- Hero Section Begin -->
<section class="hero pt-1">
    <div class="hero-layer"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12 pr-12 col-sm-12">
            <div id="carouselBig1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block carouselBig1-content w-100 mx-auto" src="<?php echo base_url(); ?>snippets/img/carousel/1/1.jpeg" alt="First slide">
                    </div>
                    <div class="carousel-item ">
                        <img class="d-block carouselBig1-content w-100 mx-auto" src="<?php echo base_url(); ?>snippets/img/carousel/1/product_1.jpeg" alt="second slide">
                    </div>
                    <div class="carousel-item ">
                        <img class="d-block carouselBig1-content w-100 mx-auto" src="<?php echo base_url(); ?>snippets/img/carousel/1/quote_1.jpeg" alt="third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselBig1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselBig1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 pr-12 col-sm-12 mt-3">
            <div class="carouselBig-banner-background">
                <div class="container">
                    <div class="row  ">
                        <div class="col-8 py-5">
                            <h2>Arabika Gajahrejo</h2>
                            <br>
                            <h5>Kopi Gajahrejo merupakan biji kopi arabika yang ditanam di dataran dengan ketinggian idela untuk menciptakan biji kopi yang kuat dan ekslusif.
                                Proses penanaman yang memiliki standar tinggi menjadikan kopi Arabika Gajahrejo memiliki aroma yang manis dan fisik yang sempurna.</h5>
                        </div>
                        <div class="col-4 py-5">
                            <img src="<?php echo base_url(); ?>snippets/img/carousel/1/f1-preview.png" class="img-fluid" alt="First slide">
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


</section>
<!-- Hero Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Our product</h2>
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
            
            if ($user==null) {
                $id = '';
            }else{
                $id = $user['id_user'];

            }

            $query = $this->db->query("SELECT * FROM barang");
            foreach ($query->result_array() as $data) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix <?= $data['jenisbarang'] ?> ">
                    <div class="featured__item pb-3 ">
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

                        <div class="featured__item__pic set-bg" data-setbg="<?php echo base_url(); ?>snippets/img/barang/<?= $querygambar['image'] ?> ">
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

<!-- Banner Begin -->
<section class="banner mb-4">
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2 class="text-center mb-3">Why choose us?</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
                        <div class="row">
                            <div class="col-12 text-center ">
                                <img src="<?php echo base_url(); ?>snippets/img/icon/local.png" class="img-banner mx-auto">
                            </div>
                            <div class="col-12 mt-3 text-center">
                                <h3 class="bold">Produk lokal</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img src="<?php echo base_url(); ?>snippets/img/icon/harga.png" class="img-banner mx-auto">
                            </div>
                            <div class="col-12 mt-3">
                                <h3 class="bold text-center ">Harga murah</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img src="<?php echo base_url(); ?>snippets/img/icon/kualitas.png" class="img-banner mx-auto">
                            </div>
                            <div class="col-12 mt-3">
                                <h3 class="bold text-center">Kualitas terjamin</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Banner End -->