<div class="container-fluid">
    <div class="col-xl-12 col-12">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Page</h4>
                <a type="button" href="/admin/pages" class="btn btn-rounded btn-info float-right btn-md"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>Manage Pages</a>
            </div>
            <div class="card-body">

                <form action="/ajax/edit-page" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="pageid" value="<?= $pageinfo->pageid ?>" />


                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category1" value="cat1" name="category[]" <?= in_array('cat1', $cat) ? 'checked="checked"' : ''; ?> /> Top Link Menu
                            </label>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category2" value="cat2" name="category[]" <?= in_array('cat2', $cat) ? 'checked="checked"' : ''; ?> /> Main Site Menu
                            </label>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category3" value="cat3" name="category[]" <?= in_array('cat3', $cat) ? 'checked="checked"' : ''; ?> /> 1ST Footer Menu
                            </label>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category4" value="cat4" name="category[]" <?= in_array('cat4', $cat) ? 'checked="checked"' : ''; ?> /> 2ND Footer Menu
                            </label>
                        </div>

                        <div class="col-md-12 form-group">
                            <hr />
                        </div>

                    </div>




                    <div class="row">

                        <div class="col-12 col-md-4 form-group">
                            <label for="title">Page Title</label>
                            <input required name="title" id="title" class="form-control form-control-lg" type="text" placeholder="Page Title" value="<?= $pageinfo->title; ?>">
                        </div>

                        <div class="col-12 col-md-4 form-group">
                            <label for="menutitle">Menu Title</label>
                            <input required class="form-control form-control-lg" name="menutitle" id="menutitle" type="text" placeholder="menutitle" value="<?= $pageinfo->menutitle; ?>">
                        </div>

                        <div class="col-md-2 form-group">
                            <label for="showheader">Show Top Menu</label><br />
                            <label class="checkbox-inline mt-2">
                                <input type="checkbox" id="showheader" value="1" name="showheader" <?= $pageinfo->showheader ? 'checked="checked"' : ''; ?> /> Show Header
                            </label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="showfooter">Show Bottom Footer</label><br />
                            <label class="checkbox-inline mt-2">
                                <input type="checkbox" id="showfooter" value="1" name="showfooter" <?= $pageinfo->showfooter ? 'checked="checked"' : ''; ?> /> Show Footer
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-3 form-group">
                            <label class="col-12 col-md-12" for="parent">Parent Page</label>
                            <select name="parent" id="parent" class="form-control form-control-lg">
                                <option value="<?= $Core->getSiteInfo('defaultlandingpage') ?>">Home</option>
                                <?php while ($pr = mysqli_fetch_array($parents)) : ?>
                                    <option value="<?= $pr['pageid'] ?>" <?= $pageinfo->parent == $pr['pageid'] ? "selected='selected'" : "" ?>><?= $pr['menutitle'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-3 form-group">
                            <label for="sort">Sort Number?</label>
                            <input required name="sort" class="form-control form-control-lg" type="text" value="<?= $pageinfo->sort; ?>" placeholder="0">
                        </div>
                        <div class="col-12 col-md-3 form-group">
                            <label class="col-12 col-md-12">Content Type</label>
                            <select name="type" required class="form-control form-control-lg">
                                <option value="page" <?= $pageinfo->pagestyle=="page"?'selected="selected"':'' ?> >Site Page</option>
                                <option value="blog" <?= $pageinfo->pagestyle=="blog"?'selected="selected"':'' ?> >Blog & News</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-3 form-group">
                            <label for="newsphoto">Page Photo</label>
                            <input name="newsphoto" id="newsphoto" class="form-control form-control-lg" type="file" placeholder="Page Title">
                        </div>

                    </div>


                    <?php if ($pageinfo->pagestyle == "blog") : ?>
                        <div class="row clearfix">
                            <div class="col-md-12 form-group">
                                <textarea class="form-control tinymce-classic" name="contents" id="contents" style="width:100%;"><?= $pageinfo->content; ?></textarea>
                            </div>
                        </div>
                    <?php endif; ?>



                    <div class="row clearfix">
                        <div class="col-12 col-md-12 mt-5">
                            <button type="submit" class="btn btn-primary btn-lg">Update Page</button>
                        </div>
                    </div>



                </form>

            </div>
        </div>

    </div>
</div>