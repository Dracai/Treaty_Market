<body style="font-family: 'Open Sans', sans-serif;">
    <section class="highlight-blue" style="margin: 0;background: var(--bs-green);font-family: 'Open Sans', sans-serif;">
        <div class="container">
            <div class="intro"></div>
        </div>
        <div class="container">
            <div class="intro">
                <h2 class="text-center" style="color: rgb(255, 255, 255);">Browse our Products</h2>
                <p class="text-center" style="color: rgb(255,255,255);">Here you will see a variety of our products ranging from vegetable and fruits to fresh and fragrant baked goods !<br></p>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="dropdown"><button class="btn btn-primary dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button" style="margin: 1em;background: rgb(25,135,84);">Categories</button>
                    <div class="dropdown-menu"><a class="dropdown-item" href="#">All</a><a class="dropdown-item" href="#">Vegetables</a><a class="dropdown-item" href="#">Fruits</a><a class="dropdown-item" href="#">Bakery</a></div>
                </div>
            </div>
            <div class="col">
                <div class="input-group" style="margin: 1em 0 0 4.1em;width: 30em;">
                <button class="btn btn-primary" type="button" style="background: rgb(25,135,84);">Add Product</button>
                <input class="form-control" type="text" style="margin-left: 55px;"><button class="btn btn-primary" type="button" style="padding: 6px 12px;background: rgb(25,135,84);">Search</button></div>
            </div>
        </div>
    </div>
    <div class="container">
        <?php if (session()->get('wishlist')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->get('wishlist')?>
            </div>
        <?php elseif (session()->get('duplicate')):?>
            <div class="alert alert-warning" role="alert">
                <?= session()->get('duplicate')?>
            </div>
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 159.14099999999993px;"></th>
                        <th>Product</th>
                        <th style="width: 91.391px;">Price</th>
                        <?php if(session()->get('isLoggedInCustomer')):?>
                        <th style="width: 60.188px;"></th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($news as $newsItem): ?>
                    <tr>
                        <td>
                            <?php if(session()->get('isLoggedInAdmin')): ?>
                                <a href="<?php echo base_url(); ?>/adminDrilldown/<?= $newsItem['produceCode'] ?>"><img src="assets/images/products/thumbs/<?= $newsItem['photo'] ?>"></a></td>
                            <?php else:?>
                                <a href="<?php echo base_url(); ?>/drilldown/<?= $newsItem['produceCode'] ?>"><img src="assets/images/products/thumbs/<?= $newsItem['photo'] ?>"></a></td>
                            <?php endif; ?>
                        <td style="border-left-width: 1px;border-left-color: rgb(222,226,230);"><?= $newsItem['description'] ?></td>
                        <td style="border-right-width: 1px;border-right-color: rgb(222,226,230);border-left: 1px solid rgb(222,226,230) ;">€ <?= $newsItem['bulkBuyPrice']?></td>
                        <?php if(session()->get('isLoggedInCustomer')):?>
                        <td>
                            <button class="btn btn-primary" type="button_addToCart" style="width: 80px;margin: 0 0 .25em 0 ;">Add to Cart</button>
                            <a href="<?php echo site_url('GeneralUser/addToWishlist/'.$newsItem['produceCode'].'/'.$newsItem['description'].'/'.$newsItem['bulkBuyPrice']);?>"><button class="btn btn-primary" id="button_wishlist" type="button" style="width: 80px;">Wishlist</button></a>
                        </td>
                        <?php elseif(session()->get('isLoggedInAdmin')): ?>
                        <td><button class="btn btn-primary" type="button">Remove</button></td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container">
        <nav>
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
            </ul>
        </nav>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>