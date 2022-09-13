<div class="container my-5">
    <h3 class="my-3">Perbarui Password</h3>
    <?= $this->session->flashdata('message'); ?>
    <form action="<?= base_url('password') ?>" method="POST">
        <div class="regist__input">
            <input type="Password" name="password_old" placeholder="Password lama">
            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="regist__input">
            <input type="Password" name="password_new" placeholder="Password baru">
            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
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