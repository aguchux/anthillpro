<div class="container-fluid">
    <div class="col-xl-12 col-12">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create New Page</h4>
                <a type="button" href="/admin/pages" class="btn btn-rounded btn-info float-right btn-md"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>Manage Pages</a>
            </div>
            <div class="card-body">

                <form action="/ajax/add-page" method="POST" enctype="multipart/form-data">

                    <?= $Me->tokenize() ?>

                    <div class="row mx-auto">

                        <div class="col-md-3 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category1" value="cat1" name="category[]"> Top Link Menu
                            </label>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category2" value="cat2" checked aria-checked="true" name="category[]"> Main Site Menu
                            </label>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category3" value="cat3" name="category[]"> 1ST Footer Menu
                            </label>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category4" value="cat4" name="category[]"> 2ND Footer Menu
                            </label>
                        </div>
                        <div class="col-md-12 form-group">
                            <hr />
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-12 col-md-4 form-group">
                            <label for="title">Page Title</label>
                            <input required name="title" id="title" class="form-control form-control-lg" type="text" placeholder="Page Title">
                        </div>

                        <div class="col-12 col-md-4 form-group">
                            <label for="menutitle">Menu Title</label>
                            <input required class="form-control form-control-lg" name="menutitle" id="menutitle" type="text" placeholder="menutitle">
                        </div>


                        <div class="col-12 col-md-2 form-group">
                            <label for="showheader">Show Top Menu</label><br />
                            <label class="checkbox-inline mt-2">
                                <input type="checkbox" id="showheader" value="1" name="showheader" checked="checked" /> Show Header
                            </label>
                        </div>
                        <div class="col-12 col-md-2 form-group">
                            <label for="showfooter">Show Bottom Footer</label><br />
                            <label class="checkbox-inline mt-2">
                                <input type="checkbox" id="showfooter" value="1" name="showfooter" checked="checked" /> Show Footer
                            </label>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-12 col-md-3 form-group">
                            <label class="col-12 col-md-12" for="parent">Parent Page</label>
                            <select name="parent" id="parent" class="form-control form-control-lg">
                                <option value="<?= $Core->getSiteInfo('defaultlandingpage') ?>">Home</option>
                                <?php while ($pr = mysqli_fetch_array($parents)) : ?>
                                    <option value="<?= $pr['pageid'] ?>"><?= $pr['menutitle'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-3 form-group">
                            <label for="sort">Sort Number?</label>
                            <input required name="sort" class="form-control form-control-lg" type="text" value="<?= $Core->GetNextSort('page'); ?>" placeholder="0">
                        </div>
                        <div class="col-12 col-md-3 form-group">
                            <label class="col-12 col-md-12">Content Type</label>
                            <select name="type" required class="form-control form-control-lg">
                                <option value="" selected="selected"> - Content Type - </option>
                                <option value="page">Site Page</option>
                                <option value="blog">Blog & News</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-3 form-group">
                            <label for="newsphoto">Page Photo</label>
                            <input name="newsphoto" id="newsphoto" class="form-control form-control-lg" type="file" placeholder="Page Title">
                        </div>

                    </div>

                    <div class="row clearfix">
                        <div class="col-12 col-md-12 mt-5">
                            <button type="submit" class="btn btn-primary btn-lg">Create my Page</button>
                        </div>
                    </div>


                </form>

            </div>
        </div>

    </div>
</div>