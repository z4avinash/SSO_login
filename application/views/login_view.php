<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body>

    <form action="<?php echo base_url('checkUserLogin') ?>" method="post">

        <div class="username">
            <label for="username">Username: </label><input type="text" placeholder="username" name="username" id="username" value="<?php echo set_value('username') ?>">
            <?php echo form_error('username') ?>
        </div><br>

        <div class="password">
            <label for="password">Password: </label><input type="password" id="password" name="password" placeholder="password" value="<?php echo set_value('password') ?>">
            <?php echo form_error('password') ?>
        </div><br><br>

        <input type="submit" value="login" id="login">

    </form>

</body>

</html>