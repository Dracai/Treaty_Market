<section class="team-boxed">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Orders</h2>
            </div>
            <div class="row people">
                <?php foreach($order as $orderItem): ?>
                <div class="col-md-6 col-lg-4 item">
                    <div class="box">
                        <h3 class="name"><?= $orderItem['orderNumber'] ?></h3>
                        <p class="description">Order Date : <?= $orderItem['orderDate'] ?><br>Status : <?= $orderItem['status'] ?> <br>Customer Number : <?= $orderItem['customerNumber'] ?></p>
                        <div class="social">
                            <a href="<?php echo base_url(); ?>/Administrator/viewOrderDetails/<?= $orderItem['orderNumber'] ?>">
                                <button class="btn btn-primary d-block w-100" type="submit" style="color: var(--bs-body-bg);background: #198754;">View Order</button>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>