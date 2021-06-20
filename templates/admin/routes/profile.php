<div class="container-fluid">
    <div class="col-xl-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title h1">User Account Profile</h4>
            </div>
            <div class="card-body">
                <form action="/ajax/profile" method="POST" enctype="multipart/form-data">
                    <?= $Me->tokenize() ?>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Firstname</label>
                            <input type="text" name="firstname" placeholder="Firstname" class="form-control" value="<?= $UserInfo->firstname ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Lastname</label>
                            <input type="text" name="lastname" placeholder="Lastname" class="form-control" value="<?= $UserInfo->lastname ?>">
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Email" class="form-control" value="<?= $UserInfo->email ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Telephone</label>
                            <input type="tel" name="mobile" placeholder="Telephone" class="form-control" value="<?= $UserInfo->mobile ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Change Password</label>
                            <input type="password" name="password1" placeholder="Password" minlength="4" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Confirm Password</label>
                            <input type="password" name="password2" placeholder="Password" minlength="4" class="form-control">
                        </div>
                    </div>

            </div>
            <div class="card-footer">
                <div class="row clearfix">
                    <div class="col-12 col-md-12 mt-5">
                        <button type="submit" class="btn btn-primary btn-lg">Update Profile</button>
                    </div>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>
</div>