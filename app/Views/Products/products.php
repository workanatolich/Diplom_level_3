<?php
$this->layout('common_layout', [
    'title' => $title,
    'categories' => $categories,
    'style' => $style,
    'authHelper' => $authHelper]);
?>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Our products</h1>
            <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aperiam consectetur cumque distinctio explicabo harum illum quos sunt unde voluptates!</p>
            
            <?=flash()->display()?>
            
            <?php if(isset($authHelper)) : ?>
                <?php if($authHelper->is_logged_in()) : ?>
                    <a href="/product/create" class="btn btn-lg btn-outline-primary">Add Product</a>
                <?php endif;?>
            <?php endif;?>
        </div>
    </div>
</section>

<div class="album py-2">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
            <?php foreach($products as $product):?>
                <div class="col-md-3 d-flex">
                    <div class="card mb-2 flex-fill">
                        <img src="<?= $product['image']?>" class="img-thumbnail">
                        <div class="card-body">
                            <h3 class="card-title"><?=$product['title']?></h3>
                            <p class="card-text"><?=$product['description']?></p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <div class="btn-group">
                                    <a href="/product/<?=$product['id']?>" class="btn btn-lg btn-outline-primary">Show</a>
                                    <?php if(isset($authHelper)) :?>
                                        <?php if($authHelper->get_user_id() == $product['user_id'] || $authHelper->is_admin()) :?>
                                            
                                            <form action="/product/edit/<?=$product['id']?>" method="post" class="form-edit">
                                                <button type="submit" class="btn btn-lg btn-outline-warning mx-3">Edit</button>
                                            </form>
                                            
                                            <form action="/product/deletor/<?=$product['id']?>" method="post" class="form-delete">
                                                <button type="submit" class="btn btn-lg btn-outline-danger" onclick="return confirm('Are you sure ?')">Delete</button>
                                            </form>

                                       <?php endif;?>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <nav aria-label="Page navigation example">
            <?php if(is_object($paginator)) : ?>
                <ul class="pagination">
                    <?php if ($paginator->getPrevUrl()): ?>
                        <li class="page-item"><a class="page-link" href="<?php echo $paginator->getPrevUrl(); ?>">&laquo; Previous</a></li>
                    <?php endif; ?>

                    <?php foreach ($paginator->getPages() as $page): ?>
                        <?php if ($page['url']): ?>
                            <li <?php echo $page['isCurrent'] ? 'class="page-item active"' : 'class="page-item"'; ?>>
                                <a class="page-link" href="<?php echo $page['url']; ?>"><?php echo $page['num']; ?></a>
                            </li>
                        <?php else: ?>
                            <li class="page-item" class="disabled"><span><?php echo $page['num']; ?></span></li>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <?php if ($paginator->getNextUrl()): ?>
                        <li class="page-item"><a class="page-link" href="<?php echo $paginator->getNextUrl(); ?>">Next &raquo;</a></li>
                    <?php endif; ?>
                </ul>
            <?php endif;?>
        </nav>

    </div>
</div>




