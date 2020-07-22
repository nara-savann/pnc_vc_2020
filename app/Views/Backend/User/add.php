<?php
?>
<!doctype html>
<html lang="kh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Welcome to Authentication User</h1>
    <form action="<?php echo base_url(''); ?>" method="post">
        <input type="text" name="firstname">
        <input type="text" name="lastname">
        <input type="email" name="email">

        <input type="submit" value="Submit">
    </form>
</body>
</html>
