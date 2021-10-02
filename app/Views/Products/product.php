<?php
$this->layout('common_layout', [
    'title' => $title,
    'style' => $style,
    'js' => $js,
    'categories' => $categories,
    'authHelper' => $authHelper])
?>


<div class="container my-5">
    <section>
        <div class="row">
            <div class="col-md-4">
                <img src="<?= $product['image']?>" alt="" width="400" height="400">
            </div>
            <div class="col-md-4">
                <h2 class="pro-d-title">
                    <?=$product['title']?>
                </h2>
                <p>
                    <?=$product['text']?>
                </p>
                <?php if(isset($authHelper)) :?>
                    <?php if($authHelper->get_user_id() == $product['user_id'] || $authHelper->is_admin()) : ?>
                        <form action="/product/edit/<?=$product['id']?>" method="post" class="form-edit">
                            <button type="submit" class="btn btn-lg btn-outline-warning">Edit</button>
                        </form>
                        <form action="/product/deletor/<?=$product['id']?>" method="post" class="form-delete">
                            <button type="submit" class="btn btn-lg btn-outline-danger mx-1" onclick="return confirm('Are you sure ?')">Delete</button>
                        </form>
                    <?php endif;?> 
                <?php endif;?>
            </div>
            
            <div class="row">
                <div class="col-md-12 mt-md-3">
                    <div class="col-md-6">
                        <a href="/" class="btn btn-lg btn-outline-dark">Go back</a>
                        <button class="btn btn-lg btn-outline-primary action-create">Write a review</a>
                    </div>
                    <hr class="mt-md-3">
                </div>
            </div>    
    </section>
           

    <section class="review-form-create">
        <div class="row my-3">
            <div class="col-md-6">
                <form action="/review/creator/<?=$product['id']?>" method="post"> 
                    <textarea name="text" class="form-control" rows="5" placeholder="Добавьте Ваш комментарий"></textarea>
                    <button class="btn btn-sm btn-primary mt-1" type="submit">Add</button>
                </form>
            </div>     
        </div>
    </section>

    <section class="review-form-edit">
        <div class="row my-3">
            <div class="col-md-6">
                <?php foreach($reviews as $review): ?>    
                    <?php if($review['user_id'] == $user_id || $authHelper->is_admin()) :?>
                        <form action="/review/editor/<?=$product['id']?><?=$review['id']?>" method="post"> 
                            <textarea name="text" class="form-control" rows="5"><?=$review['text']?></textarea>
                            <button class="btn btn-sm btn-warning mt-1" type="submit">Update</button>
                        </form>
                    <?php endif;?> 
                <?php endforeach;?>
            </div>  
        </div>
    </section>


    <section>
        <div class="row">
        <?php if(isset($reviews)) foreach($reviews as $review):?>
            <?php if($review['user_id'] == $user_id) :?>
                <div class ="col-md-4 py-3 review-form-view">
            <?php else: ?>
                <div class ="col-md-4 py-3">
            <?php endif;?>

                <h6 class="mb-1"><?= $review['username']?></h6>
                <p class="text"><?= $review['text']?></p>

            <?php if($review['user_id'] == $user_id || $authHelper->is_admin()) : ?>

                <button class="btn btn-sm action action-edit"><i class="fi fi-rr-edit"></i></button>
                
                <form action="/review/deletor/<?=$product['id']?><?=$review['id']?>" method="post" class="form-delete">
                    <button type="submit" class="btn btn-sm mx-1 button-danger" onclick="return confirm('Are you sure ?')"><i class="fi fi-rr-trash"></i></button>
                </form>
                    
                </a>
            <?php endif;?>

                </div>
        <?php endforeach;?>
        </div>
    </section>


</div>