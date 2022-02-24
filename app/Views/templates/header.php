<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Article-Dual-Column.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Article-List.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Highlight-Blue.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Login-Form-Clean.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Map-Clean.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Team-Boxed.css">

    <title>Treaty_Market</title>
    
    
</head>
<script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>

    <body>
    <?php 
        $uri = service('uri');
    ?>
     <?php if(session()->get('isLoggedInAdmin')):?>
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-search" style="background: rgb(40,45,50);">
        <div class="container"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1" style="width: 0px;"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button><a <?php if(session()->get('isLoggedInAdmin')): ?> href="<?php echo base_url();?>/adminHome" <?php else: ?>href="<?php echo base_url();?>" <?php endif; ?>><img src="<?php echo base_url(); ?>/assets/images/site/logo.png" style="width: 92px;"></a>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>/browse" style="color: rgb(255,255,255);">Browse</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>/suppliers" style="color: rgb(255,255,255);">Suppliers</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>/Administrator/viewOrders" style="color: rgb(255,255,255);">Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>/Administrator/displayUsers" style="color: rgb(255,255,255);">Users</a></li>
                </ul>
                <form class="me-auto search-form" target="_self">
                    <div class="d-flex align-items-center"><label class="form-label d-flex mb-0" for="search-field"><i class="fa fa-search" style="color: rgb(255,255,255);"></i></label><input class="form-control search-field" type="search" id="search-field" name="search" style="background: rgba(255,255,255,0);color: rgb(255,255,255);"></div>
                </form>
                <a href="<?php echo base_url(); ?>/logout"><button class="btn btn-primary" type="button" style="border-radius: 20px;height: 40px;width: 85px;margin: 0 0 0 .5em;background: rgb(255,255,255);color: rgb(40,45,50);border-width: 3px;border-color: var(--bs-green);">Logout</button></a>
            </div>
        </div>
    </nav>

    <?php elseif(session()->get('isLoggedInCustomer')):?>
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-search" style="background: rgb(40,45,50);">
        <div class="container"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1" style="width: 0px;"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button><a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>/assets/images/site/logo.png" style="width: 92px;"></a>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>/browse" style="color: rgb(255,255,255);">Browse</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>/viewCustOrders" style="color: rgb(255,255,255);">Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>/suppliers" style="color: rgb(255,255,255);">Suppliers</a></li>
                </ul>
                <form class="me-auto search-form" target="_self">
                    <div class="d-flex align-items-center"><label class="form-label d-flex mb-0" for="search-field"><i class="fa fa-search" style="color: rgb(255,255,255);"></i></label><input class="form-control search-field" type="search" id="search-field" name="search" style="background: rgba(255,255,255,0);color: rgb(255,255,255);"></div>
                </form>
                <a href="<?php echo base_url(); ?>/shoppingcart"><i class="fas fa-shopping-basket" style="width: 16px;height: 19px;margin: 8px;padding: 0px;color: rgb(25,135,84);"></i></a>
                <a class="btn btn-light action-button" role="button" href="<?php echo base_url();?>/profile" style="background: var(--bs-green);">Profile</a>
                <a href="<?php echo base_url(); ?>/logout"><button class="btn btn-primary" type="button" style="border-radius: 20px;height: 40px;width: 85px;margin: 0 0 0 .5em;background: rgb(255,255,255);color: rgb(40,45,50);border-width: 3px;border-color: var(--bs-green);">Logout</button></a>
            </div>
        </div>
    </nav>

    <?php else: ?>
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-search" style="background: rgb(40,45,50);">
        <div class="container"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1" style="width: 0px;"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button><a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>/assets/images/site/logo.png" style="width: 92px;"></a>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>/browse" style="color: rgb(255,255,255);">Browse</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>/" style="color: rgb(255,255,255);">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>/suppliers" style="color: rgb(255,255,255);">Suppliers</a></li>
                </ul>
                <form class="me-auto search-form" target="_self">
                    <div class="d-flex align-items-center"><label class="form-label d-flex mb-0" for="search-field"><i class="fa fa-search" style="color: rgb(255,255,255);"></i></label><input class="form-control search-field" type="search" id="search-field" name="search" style="background: rgba(255,255,255,0);color: rgb(255,255,255);"></div>
                </form>
                <a class="btn btn-light action-button" role="button" href="<?php echo base_url();?>/register" style="background: var(--bs-green);">Register</a>
                <a href="<?php echo base_url(); ?>/login"><button class="btn btn-primary" type="button" style="border-radius: 20px;height: 40px;width: 85px;margin: 0 0 0 .5em;background: rgb(255,255,255);color: rgb(40,45,50);border-width: 3px;border-color: var(--bs-green);">Login</button></a>
            </div>
        </div>
    </nav>
    <?php endif; ?>
