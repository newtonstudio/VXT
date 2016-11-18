<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>SANTINI</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="<?=base_url('assets/santini/css/normalize.css')?>">
        <link rel="stylesheet" href="<?=base_url('assets/santini/css/main.css')?>">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="<?=base_url('assets/santini/css/jquery.mmenu.all.css')?>" />
        <link rel="stylesheet" href="<?=base_url('assets/santini/css/all.css')?>">
        <script src="<?=base_url('assets/santini/js/vendor/modernizr-2.8.3.min.js')?>"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div id="page">
        <header class="i-header">
            <a href="#menu" class="menu"></a>
            <h1>
                <a href="<?=base_url()?>"><img src="<?=base_url('assets/santini/img/logo.svg')?>" alt="SANTINI" title="SANTINI"></a>
            </h1>
            <nav class="nav">
                <ul>
                    <li><a href="<?=base_url($init['langu'])?>">NEWS</a></li>
                    <li><a href="<?=base_url($init['langu'].'/about')?>">ABOUT</a></li>
                    <li><a href="<?=base_url($init['langu'].'/shop')?>">SHOP</a></li>
                    <li><a href="<?=base_url($init['langu'].'/services')?>">SERVICES</a></li>
                    <li><a href="<?=base_url($init['langu'].'/event_list')?>">EVENT</a></li>
                    <li><a href="<?=base_url($init['langu'].'/contact')?>">CONTACT</a></li>
                </ul>
            </nav>
            <nav class="shop-cart">
                <ul>
                    <li><a href="<?=base_url($init['langu'].'/login')?>">Login</a></li>
                    <li>/</li>
                    <li class="icon-wishlist"><a href="<?=base_url($init['langu'].'/wishlist')?>"><i class="fa fa-star" aria-hidden="true"></i> Wishlist 0</a></li>
                    <li>/</li>
                    <li class="icon-shop-cart"><a href="<?=base_url($init['langu'].'/shopcart')?>"><img src="<?=base_url('assets/santini/img/icon_shopcart.svg')?>" alt=""><span class="icon-bag">Bag 0</span></a></li>
                </ul>
            </nav>
        </header>