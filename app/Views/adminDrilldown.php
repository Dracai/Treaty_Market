<div class="container" style="margin: 16px 300px;background: #eef4f7;padding: 1em 0;">
    <div class="row">
        <div class="col-md-6" style="margin: 1em 0 ;">
            <h2 style="text-align: center;"><?= $post["produceCode"]?></h2>
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
            <label class="form-label" >Price</label>
            <input class="form-control" type="text" style="margin: 0 0 .5em 0;width: 350px;" value="<?= $post["bulkBuyPrice"]?>">
            <label class="form-label">Image Upload</label>
            <input class="form-control" type="file" name="userfile" style="margin: 0 0 .5em 0;width: 350px;">
            <div class="btn-group" role="group">
                <button class="btn btn-primary" tpye="button" style="margin: 1em;background: rgb(25,135,84);">Save</button>
                <button class="btn btn-primary" tpye="button" style="margin: 1em;background: rgb(25,135,84);">Delete</button>
            </div>
        </form>
        </div>
    </div>
</div>
