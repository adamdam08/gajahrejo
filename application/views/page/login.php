    <div id="preloder">
        <div class="loader"></div>
    </div>

    <section class="login">
        <div class="container py-1">
            <div class="login_form mx-auto col-lg-5 col-md-10 col-sm-10">
                <form class="login-form" method="POST" action="<?= base_url('auth') ?>">
                    <img src="<?php echo base_url(); ?>snippets/img/logo_fix_black.png" class="mb-5 px-3 pt-5" alt="">

                    <?= $this->session->flashdata('message'); ?>

                    <h5 class="col-lg-12 col-md-12 col-sm-12">
                        <div class="login__input">
                            <input type="text" name="username" placeholder="Username/ No HP" value="<?= set_value('username'); ?>">
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="login__input">
                            <input type="Password" name="password" placeholder="Password">
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </h5>
                    <div class="col-12 mx-auto pb-3">
                        <button class="btn btn-warning text-dark primary-color form-control">
                            LOGIN
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="clearfix">
                            <div class="row">
                                <div class="col-6 float-left">
                                    <a href="forgot.html" class="float-left text-secondary">
                                        Lupa Password?
                                    </a>
                                </div>
                                <div class="col-6 float-right">
                                    <a href="<?= base_url('auth/register') ?>" class="float-right">
                                        Register
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>