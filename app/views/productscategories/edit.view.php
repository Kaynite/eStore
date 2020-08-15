<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?= $dict["category_info"] ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="CategoryName"><?= $dict["category_name"] ?></label>
                                        <input type="text" class="form-control" id="CategoryName" name="CategoryName" placeholder="<?= $dict["category_name_placeholder"] ?>" value="<?= $category->CategoryName ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile"><?= $dict["category_image"] ?></label>
                                        <img class="mb-3" style="width: 100%; height: 300px; object-fit: cover" src="/images/<?= $category->CategoryImage ?>" alt="">
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
                            <button type="submit" name="update" class="btn btn-primary"><?= $dict["update"] ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>