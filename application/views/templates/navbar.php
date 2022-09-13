<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="<?= base_url('home') ?>"><img src="<?= base_url(); ?>snippets/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="<?= base_url('auth') ?>"><i class="fa fa-heart text-primary-color"></i> </a></li>
                <li><a href="<?= base_url('auth') ?>"><i class="fa fa-shopping-bag text-primary-color"></i></a></li>
            </ul>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <a href="<?= base_url('auth/register') ?>"><i class="fa fa-user"></i> Register |</a>
            </div>
            <div class="header__top__right__auth">
                <a href="<?= base_url('auth') ?>"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul class="text-primary-color">
                <li><a class="text-primary-color" href="<?= base_url('home') ?>">Home</a></li>
                <li><a class="text-primary-color" href="<?= base_url('product') ?>">Our Product</a></li>
                <li><a class="text-primary-color" href="<?= base_url('promo') ?>">Promo</a></li>
                <li><a class="text-primary-color" href="#contactus">Contact Us</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="humberger__menu__contact">
            <ul>
                <li class="text-primary-color">Gajahrejo, Malang, Jawa timur</li>
                <li class="text-primary-color"><i class="fa fa-envelope text-primary-color"></i> gajahrejo@gmail.com </li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header header-background shadow">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> gajahrejo@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__auth mx-2">
                                <a href="<?= base_url('auth/register') ?>">Register</a>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="<?= base_url('auth') ?>" class="btn btn-sm btn-warning primary-color text-dark">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo col-md-8 col-lg-12  col-8 ">
                        <a href="<?= base_url('home') ?>">
                            <img src="<?php echo base_url(); ?>snippets/img/logo_fix_yellow.png" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md mt-3 d-none d-sm-block">
                    <div class="form-group form-inline mt-3">
                        <form role="form" method="post" action="<?= base_url('product/search') ?>">
                            <input type="text" class="form-control w-50 mx-1 border-0" placeholder="Cari barang.." name="prod_name">
                            <button type="submit" class="btn btn-warning primary-color"><i class="fa fa-search" aria-hidden="true"></i> Cari</button>
                        </form>
                    </div>
                </div>

                <div class="col-3 d-none d-sm-block">
                    <div class="header__cart ml-1 mt-4">
                        <ul>
                            <li><a href="<?= base_url('auth') ?>"><i class="fa fa-heart"></i> </a></li>
                            <li><a href="<?= base_url('auth') ?>"><i class="fa fa-shopping-bag"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="<?= base_url('home') ?>">Home</a></li>
                        <li><a href="<?= base_url('product') ?>">Our Product</a></li>
                        <li><a href="<?= base_url('promo') ?>">Promo</a></li>
                        <li><a href="#contactus">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class="humberger__open col-md-4 mt-md-5 pl-2">
                <i class="fa fa-bars text-primary-color"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->