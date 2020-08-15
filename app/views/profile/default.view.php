<section class="content">
    <div class="container-fluid">
        <div class="row">
            <?php // Messages
            $messages = $this->messenger->getMessages();
            if (!empty($messages)) : foreach ($messages as $message) :
            ?>
                    <div class="alert alert-dismissible alert-<?= $message["type"] ?> col-md-12" role="alert" class="close" data-dismiss="alert" aria-hidden="true">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?= $this->getMsg($message["content"]) ?>
                    </div>
            <?php endforeach;
            endif; ?>
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="/images/<?= $user->UserImage == null ? "default-user-image.png" : $user->UserImage ?>" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center"><?= $user->FirstName . " " . $user->LastName ?></h3>
                        <p class="text-muted text-center">Category Name Goes Here</p>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Account Settings</a></li>
                            <li class="nav-item"><a class="nav-link" href="#changepassword" data-toggle="tab">Change Password</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="settings">
                                <form class="form-horizontal" method="POST">
                                    <div class="form-group row">
                                        <label for="Username" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Username" name="Username" placeholder="Username" value="<?= $user->Username ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" value="<?= $user->Email ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="PhoneNumber" class="col-sm-2 col-form-label">Phone Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="Phone Number" value="<?= $user->PhoneNumber ?>">
                                        </div>
                                    </div>
                                    <hr style="margin: 25px 0;">
                                    <div class="form-group row">
                                        <label for="FirstName" class="col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="First Name" value="<?= $user->FirstName ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="LastName" class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="LastName" placeholder="Last Name" name="LastName" value="<?= $user->LastName ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Address" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Address" placeholder="Address" name="Address" value="<?= $user->Address ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="DOB" class="col-sm-2 col-form-label">Date of Birth</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="DOB" placeholder="Address" name="DOB" value="<?= $user->DOB ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" name="update" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="changepassword">
                                <form class="form-horizontal" method="POST">
                                    <div class="form-group row">
                                        <label for="oldpassword" class="col-sm-2 col-form-label">Old Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="OldPassword" id="oldpassword" placeholder="Enter Your Old Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newpassword" class="col-sm-2 col-form-label">New Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="newpassword" name="NewPassword" placeholder="Enter Your New Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newpassword2" class="col-sm-2 col-form-label">Confirm New Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="newpassword2" name="NewPassword2" placeholder="Confirm Your New Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" name="changepassword" class="btn btn-danger">Change Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </div>
    </div>
</section>