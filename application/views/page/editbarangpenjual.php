<div class="container mb-5">
    <!-- Page Content -->
    <div class="mt-5 mb-5" id="page-content-wrapper">
        <h3 class=" ">Form Edit barang</h3>
        <?= form_open_multipart('detailbarang_dijual/edit_data/' . $detail->id_barang); ?>
        <div class="form-row">
            <div class="form-group col mt-2">
                <label for="inputname">Nama Barang</label>
                <input type="text" name="namabarang" class="form-control" value="<?= $detail->namabarang ?>">
                <?= form_error('namabarang', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Deskripsi</label>
            <textarea class="form-control" name="descbarang" rows="3"><?= $detail->descbarang ?></textarea>
        </div>

        <div class="form-row">
            <div class="form-group col-6">
                <label for="inputHarga">Harga</label>
                <input type="text" name="hargabarang" class="form-control" placeholder="Rp." value="<?= $detail->hargabarang ?>">
            </div>
            <div class="form-group col-6">
                <label for="Kategori">Kategori</label>
                <select class="form-control w-100" name="jenisbarang" value="<?= $detail->jenisbarang ?>">
                    <option class="w-100" value="coffee">Coffee</option>
                    <option class="w-100" value="food">Food</option>
                    <option class="w-100" value="other">Other</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-6">
                <label for="inputHarga">Diskon</label>
                <input type="text" name="diskon" class="form-control" placeholder="%" value="<?= $detail->diskon ?>">
            </div>
            <div class=" form-group col-6">
                <label for="inputHarga">Jumlah Barang</label>
                <input type="text" name="jumlahbarang" class="form-control" placeholder="" value="<?= $detail->jumlahbarang ?>">
            </div>
        </div>

        <div class=" col-12 my-3">
            <div class="text-right">
                <a class="btn btn-danger text-light" href="<?= base_url('productpenjual') ?>">
                    Keluar
                </a>
                <button type="submit" class="btn btn-warning primary-color">
                    Perbarui data
                </button>
            </div>
        </div>
        <?= form_close(); ?>
        <hr />


        <?php
        $imagesisa = 4 - $getImageCount;
        ?>

        <?php if ($imagesisa < 4) { ?>
            <h4 class="my-2 mt-5">Gambar yang telah diupload</h4>
            <div class="card" style="height:150px">
                <div class="row mt-3 ml-3">
                    <div id="imagepreviews">
                        <div class="row gallery">
                            <?php foreach ($getImage as $dataImage) {  ?>
                                <div class="col-2">
                                    <img class="" src="<?= base_url('snippets/img/barang/' . $dataImage->image) ?>" title="" />
                                    <a href="<?= base_url('detailbarang_dijual/delete_image/' . $dataImage->id_img . '/' . $dataImage->image) ?>" class="remove btn btn-danger">Hapus Gambar</a>
                                </div>
                            <?php } ?>

                        </div>

                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if ($getImageCount < 4) { ?>
            <?= form_open_multipart('detailbarang_dijual/add_image/' .  $detail->id_barang); ?>
            <h4 class="my-2 mt-5">Upload Gambar</h4>

            <div class="card" style="min-height:150px">
                <div class="row mt-3 ml-3">
                    <div id="imagepreview">

                    </div>
                </div>
            </div>

            <div class="form-group mt-2" id="tambah_gambar">
                <label for="inputHarga">Tambah Gambar</label>
                <input type="file" id="image" name="image[]" multiple>
                <div class="validation" style="display:none;"> Upload Max
                    <?= $imagesisa ?> Files allowed </div>
            </div>

            <div class=" col-12 my-3">
                <div class="text-right">
                    <a class="btn btn-danger text-light" href="<?= base_url('productpenjual') ?>">
                        Keluar
                    </a>
                    <button type="submit" class="btn btn-warning primary-color">
                        Perbarui gambar
                    </button>
                </div>
            </div>
            <?= form_close(); ?>
        <?php } ?>






    </div>
    <!-- /#page-content-wrapper -->
</div>