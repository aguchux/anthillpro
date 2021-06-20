<div class="container-fluid">
    <div class="col-xl-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title h1">User Account Profile</h4>
            </div>
            <div class="card-body">
                <form action="/ajax/settings" method="POST" enctype="multipart/form-data">
                    <?= $Me->tokenize() ?>
                    

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