<!doctype html>
<html lang="en">
<head>
    <meta charset="utf8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?=$this->e($title)?></title>
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/css/common.css" rel="stylesheet" type="text/css">
    
    <?php if(is_array($style)): foreach($style as $item):?>
        <link href="<?=$this->e($item)?>" rel="stylesheet" type="text/css">
    <?php endforeach;?>

    <?php else :?>
        <link href="<?=$this->e($item)?>" rel="stylesheet" type="text/css">
    <?php endif;?>   

</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark" aria-label="First navbar example">
            <div class="container-fluid">
                <ul class="nav justify-content-start">
                    <li class="nav-item"><a href="/" class="nav-link">My products</a></li>
                    <?php if(isset($authHelper)): ?>
                        <?php if($authHelper->is_admin()) :?>
                            <li class="nav-item"><a href="/admin" class="nav-link">Admin Menu</a></li>
                        <?php endif;?>
                    <?php endif;?>
                </ul>                
                <ul class="nav justify-content-end">
                    <li class="nav-item mx-2">
                        <?php if(isset($authHelper)): ?>
                            <?php if($authHelper->is_logged_in()) :?>
                                <form action="/logout" method="post">
                                    <button class="nav-link btn btn-outline-dark" aria-current="page" type="submit">Sign out</button>
                                </form>
                            <?php else :?>
                                <a class="nav-link btn btn-outline-dark" aria-current="page" href="/login">Sign in</a>
                            <?php endif;?>
                        <?php endif;?>
                    </li>
                    <li class="nav-item">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </li>
                </ul>

                <div class="collapse navbar-collapse" id="navbarsExample01">
                    <ul class="navbar-nav me-auto mb-2">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown04">
                                <?php foreach($categories as $category) :?>
                                    <li><a class="dropdown-item" href="/products/<?=$category['title']?>/1"><?= $category['title']?></a></li>
                                <?php endforeach;?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <?= $this->section('content')?>
    </main>

    <footer class="footer mt-auto py-3 bg-light">
            <div class="container">
                <p class="mb-1 float-end">
                    <a href="#">Back to top</a>
                </p>
                <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
                <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
            </div>
    </footer>

    <script src="/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="<?= $this->e($js)?>" type="text/javascript"></script>
</body>
</html>
