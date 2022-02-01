
<div class="container justify-content-center d-flex" style="background: #eef4f7; padding: 1em 0;">
        <form action="<?php echo base_url();?>/addProduct" method="post" enctype="multipart/form-data"> 
            <label class="form-label">Description</label>
            <input class="form-control" id="description" name="description" type="text" style="width: 350px;margin: 0 0 .5em 0;" value="<?= set_value('description') ?>">
            <label class="form-label">Supplier</label>
            <select class="form-select" id="supplier" name="supplier" style="width: 350px;margin: 0 0 .5em 0;" value="<?= set_value('supplier') ?>">
                <option value="Fedemore Organics">Fedemore Organics</option>
                <option value="Frank Ryan Veg">Frank Ryan Veg</option>
                <option value="Fresh Fredas">Fresh Fredas</option>
                <option value="Friarstown Bees">Friarstown Bees</option>
                <option value="Mama Nature Fresh Fruit & Veg">Mama Nature Fresh Fruit & Veg</option>
                <option value="Owen Finch Farm Goods">Owen Finch Farm Goods</option>
                <option value="Quilty Egg Farm">Quilty Egg Farm</option>
            </select>
            <label class="form-label">Category</label>
            <select class="form-select" id="category" name="category" style="width: 350px;margin: 0 0 .5em 0;" value="<?= set_value('category') ?>">
                <option value="Fruit">Fruit</option>
                <option value="Vegetables">Vegetables</option>
                <option value="Jams and Preserves">Jams and Preserves</option>
                <option value="Baked Goods">Baked Goods</option>
                <option value="Eggs & Dairy">Eggs & Dairy</option>
                <option value="Salads">Salads</option>
            </select>
            <label class="form-label">Quantity</label>
            <input class="form-control" type="number" id="quantity" name="quantity" style="margin: 0 0 .5em 0;width: 350px;" value="<?= set_value('quantity') ?>">
            <label class="form-label" >Bulk Buy Price</label>
            <input class="form-control" type="text" id="bulkBuyPrice" name="bulkBuyPrice" style="margin: 0 0 .5em 0;width: 350px;" value="<?= set_value('bulkBuyPrice') ?>">
            <label class="form-label" >Bulk Sale Price</label>
            <input class="form-control" type="text" id="bulkSalePrice" name="bulkSalePrice" style="margin: 0 0 .5em 0;width: 350px;" value="<?= set_value('bulkSalePrice') ?>">
            <label class="form-label">Image Upload</label>
            <input class="form-control" type="file" id="file" name="file" style="margin: 0 0 .5em 0;width: 350px;" value="<?= set_value('userFile') ?>">
            <?php if(isset($validation)) :?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="btn-group" role="group">
                <button class="btn btn-primary" type="submit" style="margin: 1em;background: rgb(25,135,84);">Add Product</button>
            </div>
        </form>
</div>
