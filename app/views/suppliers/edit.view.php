<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?= $dict["supplier_info"] ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="SupplierName"><?= $dict["supplier_name"] ?></label>
                                        <input type="text" class="form-control" id="SupplierName" name="SupplierName" placeholder="<?= $dict["supplier_name_placeholder"] ?>" value="<?= $Supplier->SupplierName ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="PhoneNumber"><?= $dict["supplier_phone"] ?></label>
                                        <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="<?= $dict["supplier_phone_placeholder"] ?>" value="<?= $Supplier->PhoneNumber ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="SupplierAddress"><?= $dict["supplier_address"] ?></label>
                                        <input type="text" class="form-control" id="SupplierAddress" name="SupplierAddress" placeholder="<?= $dict["supplier_address_placeholder"] ?>" value="<?= $Supplier->SupplierAddress ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="SupplierEmail"><?= $dict["supplier_email"] ?></label>
                                        <input type="email" class="form-control" id="SupplierEmail" name="SupplierEmail" placeholder="<?= $dict["supplier_email_placeholder"] ?>" value="<?= $Supplier->SupplierEmail ?>" required>
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