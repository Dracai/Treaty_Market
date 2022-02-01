<div class="container" style="margin: 16px 300px;background: #eef4f7;padding: 1em 0;">
    <div class="row">
        <div class="col-md-6" style="margin: 1em 0 ;">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 266.938px;">Product</th>
                            <th>Quantity</th>
                            <th style="width: 84.3906px;">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orderDetails as $item): ?>
                            <tr>
                                <td><?= $item['productCode'] ?></td>
                                <td><?= $item['quantityOrdered'] ?></td>
                                <td><?= $item['priceEach'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php 
                    $x = 0;
                    foreach($orderDetails as $item)
                    {
                        $x += $item['priceEach'];
                    }
                ?>
                <h4 style="margin:1em 1em;">Total Price : € <?= $x ?></h4>
            </div>
        </div>
        <div class="col-md-6 justify-content-center d-flex">
        <form>
            <label class="form-label">Order Number</label>
            <input class="form-control" type="text" style="width: 350px;margin: 0 0 .5em 0;" value="<?= $orders['orderNumber'] ?>">
            <label class="form-label">Order Date</label>
            <input class="form-control" type="text" style="width: 350px;margin: 0 0 .5em 0;" value="<?= $orders['orderDate'] ?>">
            <label class="form-label">Required Date</label>
            <input class="form-control" type="text" style="width: 350px;margin: 0 0 .5em 0;" value="<?= $orders['requiredDate'] ?>">
            <label class="form-label">Shipped Date</label>
            <input class="form-control" type="text" style="width: 350px;margin: 0 0 .5em 0;" value="<?= $orders['shippedDate'] ?>">
            <label class="form-label">Status</label>
            <input class="form-control" type="text" style="width: 350px;margin: 0 0 .5em 0;" value="<?= $orders['status'] ?>">
            <label class="form-label">Comments</label>
            <input class="form-control" type="text" style="width: 350px;margin: 0 0 .5em 0;" value="<?= $orders['comments'] ?>">
        </form>
        </div>
    </div>
</div>
