<div class="container-fluid">
    <div class="col-xl-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Site Settings</h4>
            </div>
            <div class="card-body">
                <form action="/ajax/settings" method="POST" enctype="multipart/form-data">
                    <?= $Me->tokenize() ?>
                    <div class="row">
                        <?php while ($site = mysqli_fetch_object($SiteInfos)) : ?>
                            <div class="col-12 col-md-12 form-group my-0">
                                <label><?= strtoupper($site->caption) ?></label>
                                <?php if ($site->type == "input") : ?>
                                    <input required name="<?= $site->name ?>" class="form-control form-control-lg" type="text" value="<?= $site->value ?>" placeholder="<?= strtoupper($site->name) ?>" />
                                <?php elseif ($site->type == "checkbox ") : ?>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="<?= $site->name ?>" value="1" name="<?= $site->name ?>" <?= $site->value ? "checked" : "" ?>> <?= strtoupper($site->name) ?>
                                    </label>
                                <?php elseif ($site->type == "textarea") : ?>
                                    <textarea required name="<?= $site->name ?>" class="form-control form-control-lg" placeholder="<?= strtoupper($site->name) ?>"><?= $site->value ?></textarea>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>

                    <div class="card-footer">
                        <div class="row clearfix">
                            <div class="col-12 col-md-12 mt-5">
                                <button type="submit" class="btn btn-primary btn-lg">Update Settings</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>