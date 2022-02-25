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
                
            </div>
            <div class="col">
                <div class="input-group" style="margin: 1em 0 0 4.1em;width: 30em;">
                <?php if(session()->get('isLoggedInAdmin')): ?>
                    <a href="<?php echo base_url(); ?>/addProduct">
                        <button class="btn btn-primary" type="button" style="background: rgb(25,135,84);">Add Product</button>
                    </a>
                <?php endif; ?>
                <form action="<?php echo base_url(); ?>/browse" method="post">
                    <input type="text" name="searchID" id="searchID" style="margin-left: 55px;"/>
                    <input type="submit" value="Search"/>
                </form>
                </div>
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
        <?php elseif (session()->get('addToCart')):?>
            <div class="alert alert-success" role="alert">
                <?= session()->get('addToCart')?>
            </div>
        <?php elseif (session()->get('deletedProduct')):?>
            <div class="alert alert-warning" role="alert">
                <?= session()->get('deletedProduct')?>
            </div>
        <?php elseif (session()->get('cantDelete')):?>
            <div class="alert alert-danger" role="alert">
                <?= session()->get('cantDelete')?>
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
                        <th style="width: 60.188px;"> Quantity </th>
                        <th style="width: 60.188px;"></th>
                        <?php endif; ?>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($news as $newsItem): ?>
                        <tr>
                        <form action="<?php echo base_url(); ?>/addToShoppingCart/<?= $newsItem['produceCode'] ?>" method="post">
                            <td>
                                <?php if(session()->get('isLoggedInAdmin')): ?>
                                    <a href="<?php echo base_url(); ?>/adminDrilldown/<?= $newsItem['produceCode'] ?>"><img src="assets/images/products/thumbs/<?= $newsItem['photo'] ?>"></a></td>
                                <?php else:?>
                                    <a href="<?php echo base_url(); ?>/drilldown/<?= $newsItem['produceCode'] ?>"><img src="assets/images/products/thumbs/<?= $newsItem['photo'] ?>"></a></td>
                                <?php endif; ?>
                            <td style="border-left-width: 1px;border-left-color: rgb(222,226,230);"><?= $newsItem['description'] ?></td>
                            <td style="border-right-width: 1px;border-right-color: rgb(222,226,230);border-left: 1px solid rgb(222,226,230) ;">€ <?= $newsItem['bulkBuyPrice']?></td>
                            <?php if(session()->get('isLoggedInCustomer')):?>
                            <td style="border-right-width: 1px;border-right-color: rgb(222,226,230);border-left: 1px solid rgb(222,226,230) ;">
                            <form action="" method="post">
                                <input type="number" id="quantity" name="quantity" sytle="width: 60.188px" min="0">
                            </td>
                            <td>
                                <a href="<?php echo site_url('GeneralUser/addToShoppingCart/'.$newsItem['produceCode'].'/'.$newsItem['description'].'/'.$newsItem['bulkBuyPrice'])?>">
                                    <button class="btn btn-primary" type="submit" style="width: 80px;margin: 0 0 .25em 0 ;">Add to Cart</button>
                                </a>
                                <a href="<?php echo site_url('GeneralUser/addToWishlist/'.$newsItem['bulkBuyPrice'].'/'.$newsItem['description'].'/'.$newsItem['produceCode'])?>">
                                    <button class="btn btn-primary" id="button_wishlist" type="button" style="width: 80px;">Wishlist</button>
                                </a>
                            </td>
                            
                            <?php elseif(session()->get('isLoggedInAdmin')): ?>
                            <td><a href="<?php echo site_url('Administrator/delProduct/'.$newsItem["produceCode"]); ?>" 
                                onclick="return confirm('Are you sure you want to delete this product?');">
                                <button class="btn btn-primary" type="button" name="delete" id="delete" style="margin: 1em;background: rgb(25,135,84);">Delete</button>
                            </a></td>
                            <?php endif; ?>
                            </form>
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