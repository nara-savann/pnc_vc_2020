<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password</title>
    <link rel="stylesheet" href="<?php echo base_url('node_modules/bootstrap/dist/css/bootstrap.min.css'); ?>">
</head>
<body>
<div class="container padding-bottom-3x mb-2 mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="forgot">
                <h2>Forgot your password?</h2>
                <p>Change your password in three easy steps. This will help you to secure your password!</p>
                <ol class="list-unstyled">
                    <li><span class="text-primary text-medium">1. </span>Enter your email address below.</li>
                    <li><span class="text-primary text-medium">2. </span>Our system will send you a temporary link</li>
                    <li><span class="text-primary text-medium">3. </span>Use the link to reset your password</li>
                </ol>
            </div>
            <form class="card mt-4" action="<?php echo base_url('/forget'); ?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="email-for-pass">Enter your email address</label>
                        <input class="form-control" type="email" name="email" id="email-for-pass" required="">
                        <small class="form-text text-muted">Enter the email address you used during the registration.
                            Then we'll email a link to this address.</small>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" type="submit">Get New Password</button>
                    <a href="<?php echo base_url('/login'); ?>" class="btn btn-primary" type="link">Back to Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>