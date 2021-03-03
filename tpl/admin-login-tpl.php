<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_TITLE ?> panel</title>
    <link rel="shortcut icon" href="<?= BASE_URL ?>assets/img/favicon-64.png">
    <link rel="stylesheet" href="assets/css/admin-login.css" />
</head>

<body>
    <div class=" main-panel">
        <h1>ورود به پنل مدیریت <span style="color:#007bec">آبی مپ</span></h1>
        <div class="box">
            <form action="adm.php" method="post">
                <input type="text" name="username" placeholder="Username" autocomplete="off"><br>
                <input type="password" name="password" placeholder="Password" autocomplete="off"><br>
                <input type="submit" value="Login" style="text-align: center">
            </form>
        </div>
    </div>
</body>

</html>