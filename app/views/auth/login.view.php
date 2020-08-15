<div class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>Store</b>App</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <?php // Messages
                $messages = $this->messenger->getMessages();
                if (!empty($messages)) : foreach ($messages as $message) :
                ?>
                        <div class="alert alert-dismissible alert-<?= $message["type"] ?>" role="alert" class="close" data-dismiss="alert" aria-hidden="true">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?= $message["content"] ?>
                        </div>
                <?php endforeach;
                endif; ?>
                <p class="login-box-msg">Sign in to start your session</p>
                <form method="post" class="mb-3">
                    <div class="input-group mb-3">
                        <input type="text" name="Username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="Password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" name="login" class="btn btn-primary btn-block mt-3">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</div>