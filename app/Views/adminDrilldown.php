<div class="container" style="margin: 16px 300px;background: #eef4f7;padding: 1em 0;">
    <div class="row">
        <div class="col-md-6" style="margin: 1em 0 ;">
            <img class="img-fluid" src="<?php echo base_url(); ?>/assets/images/products/full/<?= $post["photo"] ?>">
        </div>
        <div class="col-md-6">
        <form>
            <label class="form-label">Description</label>
            <input class="form-control" type="text" style="width: 350px;margin: 0 0 .5em 0;" value="<?= $post["description"]?>">
            <label class="form-label">Category</label>
            <select class="form-select" style="width: 350px;margin: 0 0 .5em 0;" value="<?= $post["category"]?>">
                <option value="Fruit"<?php if($post["category"] == 'Fruit'): ?> selected="selected" <?php endif; ?>>Fruit</option>
                <option value="Vegetables"<?php if($post["category"] == 'Vegetables'): ?> selected="selected" <?php endif; ?>>Vegetables</option>
                <option value="Jams and Preserves"<?php if($post["category"] == 'Jams and Preserves'): ?> selected="selected" <?php endif; ?>>Jams and Preserves</option>
                <option value="Baked Goods"<?php if($post["category"] == 'Baked Goods'): ?> selected="selected" <?php endif; ?>>Baked Goods</option>
                <option value="Eggs & Dairy"<?php if($post["category"] == 'Eggs & Dairy'): ?> selected="selected" <?php endif; ?>>Eggs & Dairy</option>
                <option value="Salads"<?php if($post["category"] == 'Salads'): ?> selected="selected" <?php endif; ?>>Salads</option>
            </select>
            <label class="form-label">Quantity</label>
            <input class="form-control" type="text" style="margin: 0 0 .5em 0;width: 350px;" value="<?= $post["quantityInStock"]?>">
            <label class="form-label" >Bulk Buy Price</label>
            <input class="form-control" type="text" style="margin: 0 0 .5em 0;width: 350px;" value="€ <?= $post["bulkBuyPrice"]?>">
            <label class="form-label" >Bulk Sale Price</label>
            <input class="form-control" type="text" style="margin: 0 0 .5em 0;width: 350px;" value="€ <?= $post["bulkSalePrice"]?>">
            <label class="form-label">Image Upload</label>
            <input class="form-control" type="file" name="userfile" style="margin: 0 0 .5em 0;width: 350px;">
            <div class="btn-group" role="group">
                <a href="" onlick="">
                    <button class="btn btn-primary" type="button" name="save" id="save" style="margin: 1em;background: rgb(25,135,84);">Save</button>
                </a>
                <a href="<?php echo site_url('Administrator/delProduct/'.$post["produceCode"]); ?>" 
                    onclick="return confirm('Are you sure you want to delete this product?');">
                    <button class="btn btn-primary" type="button" name="delete" id="delete" style="margin: 1em;background: rgb(25,135,84);">Delete</button>
                </a>
            </div>
        </form>
        </div>
    </div>
</div>
