<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Profile Info</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class="file-field">
                                        <div class="mb-4">
                                            <img style="width: 200px; height: 200px; object-fit: cover; border-radius: 7px" src="/images/<?= !file_exists(IMAGES_PATH . $user->UserImage) || empty($user->UserImage) ? "default-user-image.png" : $user->UserImage ?>">
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <label class="file-upload btn btn-primary">
                                                    <i class="fas fa-upload"></i><input type="file" name="UserImage" />
                                                </label>
                                                <a class="btn btn-danger" userId="<?= $user->UserId ?>" id="deleteUserImage">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="Username" value="<?= $user->Username ?>" placeholder="Enter Your Username">
                                    </div>
                                    <div class="form-group">
                                        <label>Group</label>
                                        <select class="custom-select" name="GroupId" required>
                                            <option disabled selected>Select User Group</option>
                                            <?php foreach ($groups as $group) : ?>
                                                <option <?= $group->GroupId == $user->GroupId ? "selected" : NULL ?> value="<?= $group->GroupId ?>"><?= $group->GroupName ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Profile Info</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control" id="firstname" name="FirstName" placeholder="Enter Your First Name" value="<?= $user->FirstName ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" id="lastname" name="LastName" placeholder="Enter Your Last Name" value="<?= $user->LastName ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" name="Email" placeholder="Enter Your Email" value="<?= $user->Email ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phoneNumber">Phone Number</label>
                                        <input type="text" class="form-control" id="phoneNumber" name="PhoneNumber" value="<?= $user->PhoneNumber ?>" placeholder="Enter Your Phone Number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="Address" placeholder="Enter Your Address" value="<?= $user->Address ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="DOB">Date of Birth</label>
                                        <input type="date" class="form-control" id="DOB" name="DOB" placeholder="Enter Your Date of Birth" value="<?= $user->DOB ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" name="update" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>