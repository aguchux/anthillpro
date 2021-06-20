<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <base href="<?= domain ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="<?= $adminassets ?>/vendor/chartist/css/chartist.min.css">
    <link href="<?= $adminassets ?>/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?= $adminassets ?>/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="<?= $adminassets ?>/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?= $adminassets ?>/css/style.css" rel="stylesheet">
</head>

<body class="h-100">

    <div class="h-100 mt-5 pt-5">
        <div class="authincation h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-md-6">
                        <div class="authincation-content">
                            <div class="row no-gutters">
                                <div class="col-xl-12">
                                    <div class="auth-form">
                                        <h4 class="text-center mb-4">Sign in your account</h4>
                                        <form action="/admin/forms/login" method="POST">
                                            <div class="form-group">
                                                <label class="mb-1"><strong>Email</strong></label>
                                                <input type="email" name="email" class="form-control" required aria-required="true" placeholder="hello@example.com">
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1"><strong>Password</strong></label>
                                                <input type="password" name="password" class="form-control" required aria-required="true" placeholder="Password">
                                            </div>
                                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox ml-1">
                                                        <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                                        <label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <a href="#">Forgot Password?</a>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                            </div>
                                        </form>
                                        <div class="new-account mt-3">
                                            <p>Don't have an account? <a class="text-primary" href="#">Sign up</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= $adminassets ?>/vendor/global/global.min.js"></script>
    <script src="<?= $adminassets ?>/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= $adminassets ?>/js/deznav-init.js"></script>
    <script src="<?= $adminassets ?>/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="<?= $adminassets ?>/js/custom.min.js"></script>

</body>

</html>