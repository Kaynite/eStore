<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Left Column -->
            <?php // Messages
            $messages = $this->messenger->getMessages();
            if (!empty($messages)) : foreach ($messages as $message) :
            ?>
                    <div class="col-md-12 alert alert-dismissible alert-<?= $message["type"] ?>" role="alert" class="close" data-dismiss="alert" aria-hidden="true">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?= $this->getMsg($message["content"]) ?>
                    </div>
            <?php endforeach;
            endif; ?>
            <div class="col-md-6">
                <form method="POST" enctype="multipart/form-data">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Account Info</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" class="form-control" id="Username" name="Username" placeholder="Enter Your Username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="Password" placeholder="Enter Your Password" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password" class="form-control" id="password" name="Password2" placeholder="Confirm Your Password" required>
                            </div>
                            <div class="form-group">
                                <label for="Email">Email address</label>
                                <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter Your Email" required>
                            </div>
                            <div class="form-group">
                                <label for="email2">Confirm Email address</label>
                                <input type="email" class="form-control" id="email2" name="Email2" placeholder="Confirm Your Email" required>
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="text" class="form-control" id="phoneNumber" name="PhoneNumber" placeholder="Enter Your Phone Number">
                            </div>
                            <div class="form-group">
                                <label>Group</label>
                                <select class="custom-select" name="GroupId" required>
                                    <option disabled selected>Select User Group</option>
                                    <?php foreach ($usersgroups as $group) : ?>
                                        <option value="<?= $group->GroupId ?>"><?= $group->GroupName ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">User's General Info</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="FirstName" placeholder="Enter Your First Name" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="LastName" placeholder="Enter Your Last Name" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="Address" placeholder="Enter Your Address" required>
                        </div>
                        <div class="form-group">
                            <label for="DOB">Date of Birth</label>
                            <input type="date" class="form-control" id="DOB" name="DOB" placeholder="Enter Your Date of Birth" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">User Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="UserImage">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!-- /.card-body -->
                </div>
                </form>
            </div>


        </div>
    </div>
</section>