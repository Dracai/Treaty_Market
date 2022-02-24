<!DOCTYPE html>
<html lang="en">

<body>
    <section class="highlight-blue" style="margin: 0;background: var(--bs-green);">
        <div class="container">
            <div class="intro"></div>
        </div>
        <div class="container">
            <div class="intro">
                <h2 class="text-center" style="color: rgb(255, 255, 255);">Shopping Cart</h2>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 159.14099999999993px;"></th>
                        <th>Product</th>
                        <th style="width: 91.391px;">Price</th>
                        <th style="width: 81.688px;">Quantity</th>
                        <th style="width: 60.188px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $x):   ?>
                        <?php foreach($x as $y):   ?>
                            <tr>
                                <td><img></td>
                                <td style="border-left-width: 1px;border-left-color: rgb(222,226,230);"><?= $y['id'] ?></td>
                                <td style="border-right-width: 1px;border-right-color: rgb(222,226,230);border-left: 1px solid rgb(222,226,230) ;"></td>
                                <td style="border-right-width: 1px;border-right-style: solid;"><?= $y['quantity'] ?></td>
                                <td><button class="btn btn-primary" type="button" style="width: 80px;margin: 0 0 .25em 0 ;">Remove</button></td>
                            </tr>
                        <?php  endforeach; ?>
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
    <div class="container"><a href="<?php echo base_url(); ?>/browse"><button class="btn btn-primary" type="button" style="background: var(--bs-red); margin: 0 0 3em 0;">Keep Shopping</button></a></div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>