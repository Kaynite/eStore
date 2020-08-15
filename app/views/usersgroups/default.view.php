<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <a href="/usersgroups/add" class="btn btn-primary mb-3">
                    <i class="fas fa-plus"></i> <?= $dict["add"] ?>
                </a>
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="users-table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="users-table" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="users-table_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="users-table" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"><?= $dict["group_id"] ?></th>
                                                <th class="sorting" tabindex="0" aria-controls="users-table" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"><?= $dict["group_name"] ?></th>
                                                <th class="sorting" tabindex="0" aria-controls="users-table" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"><?= $dict["controls"] ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($usersgroups as $usersgroup) : ?>
                                                <tr>
                                                    <td style="width:11%"><?= $usersgroup->GroupId ?></td>
                                                    <td><?= $usersgroup->GroupName ?></td>
                                                    <td style="width:20%"><a href="/usersgroups/edit/<?= $usersgroup->GroupId ?>"><i class="fas fa-edit"></i></a> | <a href="#" data-toggle="modal" data-target="#modal-<?= $usersgroup->GroupId ?>"><i class="fas fa-times"></i></a></td>
                                                    <div class="modal fade" id="modal-<?= $usersgroup->GroupId ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title"><?= $dict["modal_title"] ?></h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p><?= $dict["modal_msg"] ?></p>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    <a href="/usersgroups/delete/<?= $usersgroup->GroupId ?>" type="button" class="btn btn-danger">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>