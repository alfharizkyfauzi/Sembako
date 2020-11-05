<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>SembakoQu - Sembilan Barang Pokok Centre</title>
    <link rel="icon" href="<?= SITE ?>/public/images/favicon.png" sizes="16x16" type="image/png">
    <link href="<?= SITE ?>/public/css/styles.css" rel="stylesheet" type="text/css" />
    <link href="<?= SITE ?>/public/css/jumbotron.css" rel="stylesheet" type="text/css" />
    <script defer src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"></script>
    <?php
    if (URI1 == 'home') {
        if (!isset($_SESSION[SESS]['member'])) {
    ?>
    <?php
        }
    }
    ?>
</head>

<body>

    <div id="topbar" class="auto dark-blue">
        <div class="container">
            <?php
            if (isset($_SESSION[SESS]['member'])) {
            ?>
                <p class="pull-left">Hi, <b><?= ucwords($_SESSION[SESS]['member']['nama']) ?></b></p>
            <?php
            } elseif (isset($_SESSION[SESS]['admin'])) {
            ?>
                <p class="pull-left">Hi, <b><?= ucwords($_SESSION[SESS]['admin']['username']) ?></b></p>
            <?php
            } else {
            ?>
                <p class="pull-left"><i class="fas fa-phone-alt"></i><a href="tel:+628123456789" style="color: #fff;"> +628123456789 </a> &nbsp; <i class="fas fa-envelope"></i><a href="mailto:email@mail.com" style="color: #fff;"> email@mail.com </a></p>
            <?php
            }
            ?>
            <ul class="pull-right">
                <?php
                if (isset($_SESSION[SESS]['member'])) {
                ?>
                    <li><a href="<?= SITE ?>/member/testimoni">TESTIMONI</a></li>
                    <li><a href="<?= SITE ?>/invoice/">INVOICE</a></li>
                    <li><a href="<?= SITE ?>/cart/my_cart">MY CART</a></li>
                    <li><a href="<?= SITE ?>/member/my_account">MY ACCOUNT</a></li>
                    <li><a href="<?= SITE ?>/member/logout">LOGOUT</a></li>
                <?php
                } elseif (isset($_SESSION[SESS]['admin'])) {
                ?>
                    <li><a href="<?= SITE ?>/admin/logout">LOGOUT</a></li>
                <?php
                } else {
                ?>
                    <li><a href="<?= SITE ?>/member/login">LOGIN</a></li>
                    <li><a href="<?= SITE ?>/member/sign_up">SIGN UP</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>

    <div id="header" class="auto blue m">
        <div class="container">
            <?php
            if (isset($_SESSION[SESS]['admin'])) {
            ?>
                <a href="<?= SITE ?>/admin" class="pull-left">
                    <img src="<?= SITE ?>/public/images/logo.png" width="260" style="margin-top: 5px;" />
                </a>
            <?php
            } else {
            ?>
                <a href="<?= SITE ?>" class="pull-left">
                    <img src="<?= SITE ?>/public/images/logo.png" width="260" style="margin-top: 5px;" />
                </a>
            <?php
            }
            ?>
            <?php
            if (isset($_SESSION[SESS]['member'])) {
                if (!isset($_SESSION[SESS]['member']['cart'])) {
                    $cart = 0;
                } else {
                    $cart = count($_SESSION[SESS]['member']['cart']);
                }
            ?>
                <a href="<?= SITE ?>/cart/my_cart" class="cart pull-right">
                    <p class="pull-left"><b><?= $cart ?> Items</b> <br /> Dalam Keranjang</p>
                    <img src="<?= SITE ?>/public/images/cart.png" width="50" class="pull-right" />
                </a>
            <?php
            }
            ?>
            <ul class="pull-right">
                <?php
                if (!isset($_SESSION[SESS]['admin'])) {
                    $menu = $this->db->fetch("SELECT * FROM menu WHERE status = 1 LIMIT 4");
                ?>
                    <li><a href="<?= SITE ?>/">HOME</a></li>
                    <?php
                    foreach ($menu as $m) {
                        echo "<li><a href='" . SITE . "/h/" . strtolower($m['judul_menu']) . "'>" . strtoupper($m['judul_menu']) . "</a></li>";
                    }
                    ?>
                    <li><a href="<?= SITE ?>/h/sitemap">SITEMAP</a></li>
                <?php
                } else {
                ?>
                    <li><a href="<?= SITE ?>/admin/items">ITEMS</a></li>
                    <li><a href="<?= SITE ?>/admin/members">MEMBERS</a></li>
                    <li><a href="<?= SITE ?>/admin/menu">MENU</a></li>
                    <li><a href="<?= SITE ?>/admin/kategori">KATEGORI</a></li>
                    <li><a href="<?= SITE ?>/admin/lokasi">CABANG</a></li>
                    <li><a href="<?= SITE ?>/admin/invoice">INVOICE</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>


    <div class="container auto" style="margin-bottom: 30px;">