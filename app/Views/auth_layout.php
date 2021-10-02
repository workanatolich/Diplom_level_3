<!doctype html>
<html lang="en">
<head>
    <meta charset="utf8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?=$this->e($title)?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/signin.css" rel="stylesheet" type="text/css">
</head>
<body class="text-center">
    <main class="form-signin">
        <form action="<?=$this->e($action)?>" method="post">
            <img class="mb-4" src="img/default/login_logo.svg" alt="" width="72" height="57">
            <?=flash()->display()?>
            <?= $this->section('content')?>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
    </main>

    <script type="javascript" src="js/bootstrap.bundle.min.js"></script>
</body>

</html>