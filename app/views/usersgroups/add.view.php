<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Users Group Details</h3>
                    </div>
                    <form role="form" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="GroupName"><?= $dict["group_name"] ?></label>
                                        <input type="text" class="form-control" id="GroupName" name="GroupName" placeholder="Enter The Group Name">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Privileges</label>
                                        <select class="duallistbox" name="privileges[]" multiple="multiple" style="display: none;">
                                            <?php foreach ($privileges as $privilege) : ?>
                                                <option value="<?= $privilege->PrivilegeId ?>"><?= $privilege->PrivilegeTitle ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>