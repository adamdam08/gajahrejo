<div class="container my-5">
    <h3 class="my-3">Perbarui Biodata</h3>
    <?= $this->session->flashdata('message'); ?>
    <form action="<?= base_url('bio') ?>" method="POST">
        <div class="regist__input">
            <input type="text" name="username" placeholder="Username" value="<?= $username ?>">
            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="regist__input">
                    <input type="text" name="forename" placeholder="Nama Depan" value="<?= $forename ?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="regist__input">
                    <input type="text" name="surname" placeholder="Nama Belakang" value="<?= $surname ?>">
                </div>
            </div>
        </div>
        <div class="regist__input">
            <input type="text" name="address" placeholder="Alamat" value="<?= $address ?>">
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="regist__input">
                    <input type="text" name="city" placeholder="Kota" value="<?= $city ?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="regist__input">
                    <input type="text" name="province" placeholder="Provinsi" value="<?= $province ?>">
                </div>
            </div>
        </div>
        <div class="regist__input">
            <input type="text" name="post_code" placeholder="Kode POS" value="<?= $post_code ?>">
            <?= form_error('post_code', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="regist__input">
            <input type="text" name="phone_number" placeholder="Nomor Telepon" value="<?= $telepon ?>">
            <?= form_error('phone_number', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="mb-5 clearfix">
            <div class="float-right">
                <a class="btn btn-danger text-light" href="<?= base_url('home') ?>">
                    Keluar
                </a>
                <button type="submit" class="btn btn-warning primary-color">
                    Perbarui
                </button>
            </div>
    </form>
</div>
</div>