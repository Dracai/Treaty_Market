<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Treaty_Market</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Article-Dual-Column.css">
    <link rel="stylesheet" href="assets/css/Article-List.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Highlight-Blue.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Map-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Team-Boxed.css">
</head>

<body>
    <section class="highlight-blue" style="margin: 0;background: var(--bs-green);">
        <div class="container">
            <div class="intro">
                <h2 class="text-center" style="color: rgb(255, 255, 255);">Welcome to Treaty Market</h2>
                <p class="text-center" style="color: rgb(255,255,255);">Are you looking for fresh produce to make your dinner taste even better ? You're in the right place ! You will find all you dinner needs with Treaty Market<br></p>
            </div>
            <?php if(session()->get('isLoggedInAdmin') || session()->get('isLoggedInCustomer')): ?>
                
            <?php else: ?>
                <div class="buttons"><a class="btn btn-primary" role="button" href="<?php echo base_url(); ?>/register">Sign UP</a></div>
            <?php endif; ?>
        </div>
    </section>
    <section class="article-list">
        <div class="container">
            <div class="intro">
                <h2 class="text-center" style="color: var(--bs-gray-dark);font-size: 34px;padding: .5em 0 0 0;margin: 0;">Weekly Discounts</h2>
            </div>
            <div class="row articles" style="background: #f1f7fc;">
                <div class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" src="assets/images/products/full/cabbage.jpg"></a>
                    <h3 class="name">Cabbage</h3>
                    <p class="description">Cabbage, comprising several cultivars of Brassica oleracea, is a leafy green, red, or white biennial plant grown as an annual vegetable crop for its dense-leaved heads.<br></p>
                    <?php if(session()->get('isLoggedInAdmin') || session()->get('isLoggedInCustomer')): ?>
                        <a class="action" href="<?php echo base_url();?>/drilldown/S10_4757">
                    <?php else: ?>
                        <a class="action" href="<?php echo base_url();?>/register">
                    <?php endif; ?>
                        <i class="fa fa-arrow-circle-right" style="border-color: var(--bs-green);color: var(--bs-green);"></i></a>
                </div>
                <div class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" src="assets/images/products/full/carrots.jpg"></a>
                    <h3 class="name">Carrots</h3>
                    <p class="description">The carrot is a root vegetable, typically orange in color, though purple, black, red, white, and yellow cultivars exist, all of which are domesticated forms of the wild carrot, Daucus carota, native to Europe and Southwestern Asia.<br></p>
                    <?php if(session()->get('isLoggedInAdmin') || session()->get('isLoggedInCustomer')): ?>
                        <a class="action" href="<?php echo base_url();?>/drilldown/S10_1949">
                    <?php else: ?>
                        <a class="action" href="<?php echo base_url();?>/register">
                    <?php endif; ?>
                        <i class="fa fa-arrow-circle-right" style="border-color: var(--bs-green);color: var(--bs-green);"></i></a>
                </div>
                <div class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" src="assets/images/products/full/brioche.jpg"></a>
                    <h3 class="name">Brioche</h3>
                    <p class="description">Brioche is a bread of French origin whose high egg and butter content gives it a rich and tender crumb. Chef Joël Robuchon described it as "light and slightly puffy, more or less fine, according to the proportion of butter and eggs."<br></p>
                    <?php if(session()->get('isLoggedInAdmin') || session()->get('isLoggedInCustomer')): ?>
                        <a class="action" href="<?php echo base_url();?>/drilldown/S18_3140">
                    <?php else: ?>
                        <a class="action" href="<?php echo base_url();?>/register">
                    <?php endif; ?>
                        <i class="fa fa-arrow-circle-right" style="border-color: var(--bs-green);color: var(--bs-green);"></i></a>
                </div>
                </div>
            </div>
            <div class="col">
                <section class="map-clean">
                    <div class="container">
                        <div class="intro">
                            <h2 class="text-center">Map of Area</h2>
                            <p class="text-center">Here you can find amazing restaurants, shops and other places in the area !!</p>
                        </div>
                    </div><iframe allowfullscreen="" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBfE6okj2PKQzNShpi35SyIG0h6X08GrMI&amp;q=Limerick&amp;zoom=15" width="100%" height="450"></iframe>
                </section>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>