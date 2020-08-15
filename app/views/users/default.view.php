<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <a href="/users/add" class="btn btn-primary mb-3">
                    <i class="fas fa-plus"></i> <?= $dict["add"] ?>
                </a>
                <?php // Messages
                $messages = $this->messenger->getMessages();
                if (!empty($messages)) : foreach ($messages as $message) :
                ?>
                        <div class="alert alert-dismissible alert-<?= $message["type"] ?>" role="alert" class="close" data-dismiss="alert" aria-hidden="true">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?= $this->getMsg($message["content"]) ?>
                        </div>
                <?php endforeach; endif; ?>
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
                                                <th class="sorting_asc" tabindex="0" aria-controls="users-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"><?= $dict["user_id"] ?></th>
                                                <th class="sorting" tabindex="0" aria-controls="users-table" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"><?= $dict["user_username"] ?></th>
                                                <th class="sorting" tabindex="0" aria-controls="users-table" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"><?= $dict["user_email"] ?></th>
                                                <th class="sorting" tabindex="0" aria-controls="users-table" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"><?= $dict["user_subdate"] ?></th>
                                                <th class="sorting" tabindex="0" aria-controls="users-table" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"><?= $dict["user_phonenumber"] ?></th>
                                                <th class="sorting" tabindex="0" aria-controls="users-table" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"><?= $dict["user_lastlogin"] ?></th>
                                                <th class="sorting" tabindex="0" aria-controls="users-table" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"><?= $dict["controls"] ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($users as $user) : ?>
                                                <tr>
                                                    <td><?= $user->UserId ?></td>
                                                    <td><?= $user->Username ?></td>
                                                    <td><?= $user->Email ?></td>
                                                    <td><?= $user->SubDate ?></td>
                                                    <td><?= $user->PhoneNumber ?></td>
                                                    <td><?= $user->LastLogin ?></td>
                                                    <td><a href="/users/edit/<?= $user->UserId ?>"><i class="fas fa-edit"></i></a> | <a href="#" data-toggle="modal" data-target="#modal-<?= $user->UserId ?>"><i class="fas fa-times"></i></a></td>
                                                    <div class="modal fade" id="modal-<?= $user->UserId ?>">
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
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal"><?= $dict["modal_close"] ?></button>
                                                                    <a href="/users/delete/<?= $user->UserId ?>" type="button" class="btn btn-danger"><?= $dict["modal_delete"] ?></a>
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