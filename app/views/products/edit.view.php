<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?= $dict["product_info"] ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ProductName"><?= $dict["product_name"] ?></label>
                                        <input type="text" class="form-control" id="ProductName" name="ProductName" placeholder="<?= $dict["product_name_placeholder"] ?>" value="<?= $product->ProductName ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?= $dict["product_category"] ?></label>
                                        <select class="custom-select" name="CategoryId" required>
                                            <option disabled selected>Select Product Category</option>
                                            <?php foreach ($categories as $category) : ?>
                                                <option <?= $category->CategoryId == $product->CategoryId ? "selected" : NULL ?> value="<?= $category->CategoryId ?>"><?= $category->CategoryName ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ProductQuantity"><?= $dict["product_quantity"] ?></label>
                                        <input type="number" class="form-control" id="ProductQuantity" name="ProductQuantity" placeholder="<?= $dict["product_quantity_placeholder"] ?>" value="<?= $product->ProductQuantity ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ProductPrice"><?= $dict["product_price"] ?></label>
                                        <input type="number" step="0.01" class="form-control" id="ProductPrice" name="ProductPrice" placeholder="<?= $dict["product_price_placeholder"] ?>" value="<?= $product->ProductPrice ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile"><?= $dict["product_image"] ?></label>
                                        <img class="mb-5" style="width: 100%; display: block" src="/images/<?= $product->ProductImage ?>">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="ProductImage" name="ProductImage" accept="image/*">
                                                <label class="custom-file-label" for="ProductImage">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="BarCode"><?= $dict["product_barcode"] ?></label>
                                        <input type="text" class="form-control" id="BarCode" name="BarCode" value="<?= $product->BarCode ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" name="update" class="btn btn-primary"><?= $dict["update"] ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>