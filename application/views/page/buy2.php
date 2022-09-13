<!-- Product Details Section Begin -->

<!-- Product Details Section End -->

<div class="container">
    <div class="row mt-4">
        <div class="col-12 col-lg-4 mb-3">
            <div class="">
                <div class="product__details__pic__item">
                    <img class="product__details__pic__item--large" src="<?= base_url('snippets/img/barang/' . $getBanner->image) ?>" alt="">
                </div>
                <div class="product__details__pic__slider owl-carousel col-lg-12 col-md-12">
                    <?php foreach ($getImage as $dataImage) {  ?>
                        <img data-imgbigurl="<?= base_url('snippets/img/barang/' . $dataImage->image) ?>" src="<?= base_url('snippets/img/barang/' . $dataImage->image) ?>" alt="">
                    <?php } ?>

                </div>
            </div>
        </div>

        <div class="col-12 col-lg-8 ">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 class="mb-2">Masukan data untuk beli barang</h3>
                    <form method="POST" action="<?= base_url('buy/beliTanpaLogin/' . $detail->id_barang) ?>">
                        <div class="checkout__input">
                            Nama
                            <input type="text" name="nama" placeholder="Masukan Nama" value="<?= set_value('nama'); ?>">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="checkout__input">
                            Alamat
                            <input type="text" name="alamat" placeholder="Masukan Alamat" value="<?= set_value('alamat'); ?>">
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="checkout__input">
                            telepon
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="telepon" id="inlineFormInputGroup" placeholder="telepon +62" value="<?= set_value('telepon'); ?>">
                            </div>
                            <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="checkout__input">
                                    Jumlah barang yang dibeli
                                    <input type="text" value="<?= set_value('qtybarang'); ?>" name="qtybarang" value="<?= set_value('qtybarang'); ?> " placeholder="0">
                                    <?= form_error('qtybarang', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <button class="buy-btn w-100 primary-color text-dark">Beli </button>
                                </div>
                            </div>
                            <div class="col ml-5 mt-3">
                                <h5 class="py-2">Stok : <?= $detail->jumlahbarang ?></h5>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-12">
        <div class="product__details__tab " style="width:100% !important;">
            <p class="text-dark "><strong>Deskripsi</strong></p>
            <div class="row">
                <div class="col-4">
                    <label for="inputname">Nama Barang</label>
                    <h4><?= $detail->namabarang ?></h4>
                </div>
                <div class="col-4">
                    <label for="inputHarga">Harga</label>
                    <h4>Rp. <?= $detail->hargabarang ?></h4>
                </div>
                <div class="col-4">
                    <label for="inputHarga">Stok barang</label>
                    <h4><?= $detail->jumlahbarang ?></h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-3">
                    <div class="product__details__tab__desc ">
                        <h6 class="text-dark">Informasi produk</h6>
                        <p><?= $detail->descbarang ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>