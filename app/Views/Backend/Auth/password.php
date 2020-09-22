<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('node_modules/bootstrap/dist/css/bootstrap.min.css'); ?>">
</head>
<body>
<div class="col-md-6 offset-md-3">
    <span class="anchor" id="formChangePassword"></span>
    <hr class="mb-5">

    <!-- form card change password -->
    <div class="card card-outline-secondary">
        <div class="card-header">
            <h3 class="mb-0">Change Password</h3>
        </div>
        <div class="card-body">
            <form class="form" role="form" autocomplete="off" method="post" action="<?php echo current_url(); ?>">
                <div class="form-group">
                    <label for="pass">New Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" required="">
                    <span class="form-text small text-muted">
                                            The password must be 8-20 characters, and must <em>not</em> contain spaces.
                                        </span>
                </div>
                <div class="form-group">
                    <label for="re_pass">Verify</label>
                    <input type="password" class="form-control" id="re_pass" name="re_pass" required="">
                    <span class="form-text small text-muted">
                                            To confirm, type the new password again.
                                        </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg float-right">Save</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /form card change password -->

</body>
</html>