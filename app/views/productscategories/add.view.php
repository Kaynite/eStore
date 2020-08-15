<section class="content">
    <div class="container-fluid">
        <div class="row">
        
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">
                <?php // Messages
                $messages = $this->messenger->getMessages();
                if (!empty($messages)) : foreach ($messages as $message) :
                ?>
                        <div class="alert alert-dismissible alert-<?= $message["type"] ?>" role="alert" class="close" data-dismiss="alert" aria-hidden="true">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?= $this->getMsg($message["content"]) ?>
                        </div>
                <?php endforeach;
                endif; ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?= $dict["category_info"] ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="CategoryName"><?= $dict["category_name"] ?></label>
                                        <input type="text" class="form-control" id="CategoryName" name="CategoryName" placeholder="<?= $dict["category_name_placeholder"] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile"><?= $dict["category_image"] ?></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="CategoryImage" name="CategoryImage">
                                                <label class="custom-file-label" for="CategoryImage">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" name="submit" class="btn btn-primary"><?= $dict["submit"] ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>