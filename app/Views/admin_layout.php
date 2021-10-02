<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->e($title)?></title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">
    <link href="<?=$this->e($style)?>" rel="stylesheet">
  </head>
  <body class="wrapper">

  <header>
      <nav class="navbar navbar-dark bg-dark" aria-label="First navbar example">
          <div class="container-fluid">
            <ul class="nav justify-content-start nav-brand">
              <li class="nav-item"><a href="/" class="nav-link">My products</a></li>
              <li class="nav-item"><a href="/admin" class="nav-link">Admin Menu</a></li>
            </ul>

            <ul class="nav justify-content-end">
              <li class="nav-item"><a href="/admin/users" class="nav-link">Users</a></li>
              <li class="nav-item"><a href="/admin/categories" class="nav-link">Categories</a></li>
              <li class="nav-item"><a href="/admin/products" class="nav-link">Products</a></li>
              <li class="nav-item"><a href="/admin/reviews" class="nav-link">Reviews</a></li>
            </ul>
          </div>
      </nav>
    </header>

    <main class="main">
        <?= $this->section('content');?>
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
  </body>
</html>
