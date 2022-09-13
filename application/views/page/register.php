<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <section class="regist">
        <div class="container py-1">
            <div class="regist_form mx-auto">
                <form class="regist-form" method="POST" action="<?= base_url('auth/register') ?>">
                    <span class="regist-form-title p-b-70">
                        Register
                    </span>
                    <?php echo validation_errors(); ?>
                    <img src="<?= base_url() ?>snippets/img/logo_fix_black.png" class="mb-5 px-3" alt="">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="regist__input">
                            <input type="text" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="regist__input">
                            <input type="Password" name="password" placeholder="Password" value="<?= set_value('password'); ?>">
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="regist__input">
                                    <input type="text" name="forename" placeholder="Nama Depan" value="<?= set_value('forename'); ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="regist__input">
                                    <input type="text" name="surname" placeholder="Nama Belakang" value="<?= set_value('surname'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="regist__input">
                            <input type="text" name="address" placeholder="Alamat" value="<?= set_value('address'); ?>">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="regist__input">
                                    <input type="text" name="city" placeholder="Kota" value="<?= set_value('city'); ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="regist__input">
                                    <input type="text" name="province" placeholder="Provinsi" value="<?= set_value('province'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="regist__input">
                            <input type="text" name="post_code" placeholder="Kode POS" value="<?= set_value('post_code'); ?>">
                            <?= form_error('post_code', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="regist__input">
                            <input type="text" name="phone_number" placeholder="Nomor Telepon" value="<?= set_value('phone_number'); ?>">
                            <?= form_error('phone_number', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="mx-auto mb-3">
                            <button type="submit" class="btn btn-warning primary-color form-control">
                                Register
                            </button>
                        </div>
                </form>

                <div class="col-12 mb-3 text-center">
                    <a class="text-secondary pb-3" href="<?= base_url('auth') ?>">Sudah mempunyai akun?</a>
                </div>

            </div>

        </div>
    </section>
</body>

</html>