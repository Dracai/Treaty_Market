    <section class="article-dual-column" style="font-family: 'Open Sans', sans-serif;">
        <div class="container" style="background: #f1f7fc;">
        <?php if (session()->get('wishlist')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->get('wishlist')?>
            </div>
        <?php elseif (session()->get('duplicate')):?>
            <div class="alert alert-warning" role="alert">
                <?= session()->get('duplicate')?>
            </div>
        <?php endif; ?>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="intro">
                        <h1 class="text-center"><?= $post["description"] ?></h1>
                        <p class="text-center"><span class="by">from</span> <a href="#"><?= $post["supplier"] ?></a></p><img class="img-fluid" src="<?php echo base_url(); ?>/assets/images/products/full/<?= $post["photo"] ?>">
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-10 col-lg-7 offset-md-1 offset-lg-0" style="width: 1320px;">
                    <?php if(session()->get('isLoggedInAdmin')): ?>
                        <p style="font-size: 22px;">Produce Code : <?= $post["produceCode"] ?></p>
                    <?php endif; ?>
                        <p style="font-size: 22px;">Price : € <?= $post["bulkBuyPrice"] ?></p>
                    <?php if(session()->get('isLoggedInCustomer')): ?>
                        <button class="btn btn-primary" type="button" style="margin: 1em;">Add to Cart</button>
                        <a href="<?php echo site_url('GeneralUser/addToWishlist/'.$post['bulkBuyPrice'].'/'.$post['description'].'/'.$post['produceCode'])?>">
                            <button class="btn btn-primary" type="button" style="margin: 0 1em 0 0;background: rgb(25,135,84);">Add to Wishlist</button>
                        </a>
                        <a href="<?php echo base_url();?>/browse">
                            <button class="btn btn-primary" type="button" style="background: var(--bs-red);">Back</button>
                        </a>
                    <?php elseif(session()->get('isLoggedInAdmin')): ?>
                        <button class="btn btn-primary" type="button" style="margin: 1em;">Edit Product</button>
                        <button class="btn btn-primary" type="button" style="margin: 0 1em 0 0;background: rgb(25,135,84);">Delete Product</button>
                        <button class="btn btn-primary" type="button" style="background: var(--bs-red);">Back</button>
                    <?php else: ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>