<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Privilege Details</h3>
                    </div>
                    <form role="form" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="privilegeTitle"><?= $dict["privilege_title"] ?></label>
                                        <input type="text" class="form-control" id="privilegeTitle" name="PrivilegeTitle" placeholder="Enter The Privilege Title" value="<?= $privilege->PrivilegeTitle ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="privilegeUrl"><?= $dict["privilege_url"] ?></label>
                                        <input type="text" class="form-control" id="privilegeUrl" name="PrivilegeUrl" placeholder="Enter The Privilege URL" value="<?= $privilege->Privilege ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="update" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>