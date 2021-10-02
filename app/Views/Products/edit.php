<?php
$this->layout('common_layout', [
    'title' => $title,
    'authHelper' => $authHelper]);
?>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="/product/editor/<?=$product['id']?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>
                        EDIT THE PRODUCT
                    </legend>

                    <div class="input-group mb-3 mt-md-5">
                        <span class="input-group-text" id="basic-addon1">Product Name</span>
                        <input name="title" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" value="<?=$product['title']?>">
                    </div>

                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Product Category</label>
                        <select name='category_id' class="form-select" id="inputGroupSelect01">
                            <?php foreach($categories as $category) :?>
                                <?php if($category['id'] == $product['category_id']) :?>
                                    <option value="<?=$category['id']?>" selected><?=$category['title']?></option>
                                <?php else :?>
                                    <option value=<?=$category['id']?>"><?=$category['title']?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Product Short Description</span>
                        <textarea name='description' class="form-control" aria-label="With textarea"><?= $product['description']?></textarea>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Product Full Description</span>
                        <textarea name='text' class="form-control" aria-label="With textarea"><?= $product['text']?></textarea>
                    </div>

                    <div class="input-group mb-3">
                        <input name='image' type="file" class="form-control" id="inputGroupFile01" value="<?=$product['image']?>">
                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                    </div>

                    <?php if ($authHelper->is_admin()) :?>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect02">Status</label>
                            <select name='status_id' class="form-select" id="inputGroupSelect02">
                                <?php foreach($statuses as $status) : ?>
                                    <?php if($status['id'] == $product['status_id']) :?>
                                        <option value="<?=$status['id']?>" selected><?=$status['title']?></option>
                                    <?php else :?>
                                        <option value="<?=$status['id']?>"><?=$status['title']?></option>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </select>
                        </div>  
                    <?php endif;?>

                    
                    <button type='submit' class="btn btn-lg btn-warning mt-md-3">Update</button>
                    <a href="/" class="btn btn-lg btn-dark mt-md-3">Go back</a>

                </fieldset>
            </form>
        </div>
    </div>
</div>

