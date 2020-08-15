<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?= $dict["client_info"] ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ClientName"><?= $dict["client_name"] ?></label>
                                        <input type="text" class="form-control" id="ClientName" name="ClientName" placeholder="<?= $dict["client_name_placeholder"] ?>" value="<?= $client->ClientName ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="PhoneNumber"><?= $dict["client_phone"] ?></label>
                                        <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="<?= $dict["client_phone_placeholder"] ?>" value="<?= $client->PhoneNumber ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ClientAddress"><?= $dict["client_address"] ?></label>
                                        <input type="text" class="form-control" id="ClientAddress" name="ClientAddress" placeholder="<?= $dict["client_address_placeholder"] ?>" value="<?= $client->ClientAddress ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ClientEmail"><?= $dict["client_email"] ?></label>
                                        <input type="email" class="form-control" id="ClientEmail" name="ClientEmail" placeholder="<?= $dict["client_email_placeholder"] ?>" value="<?= $client->ClientEmail ?>" required>
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