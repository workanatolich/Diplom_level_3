<?php
$this->layout('common_layout', [
    'title' => $title,
    'authHelper' => $authHelper]);
?>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="/product/creator" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>
                        CREATE A PRODUCT
                    </legend>

                    <div class="input-group mb-3 mt-md-5">
                        <span class="input-group-text" id="basic-addon1">Product Name</span>
                        <input name="title" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Product Category</label>
                        <select name='category_id' class="form-select" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <?php foreach($statuses as $status) :?>
                            <option value="<?=$category['id']?>"><?=$category['title']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Product Short Description</span>
                        <textarea name='description' class="form-control" aria-label="With textarea"></textarea>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Product Full Description</span>
                        <textarea name='text' class="form-control" aria-label="With textarea"></textarea>
                    </div>

                    <div class="input-group mb-3">
                        <input name='image' type="file" class="form-control" id="inputGroupFile01">
                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                    </div>

                    <?php if($authHelper->is_admin()) :?>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect02">Status</label>
                            <select name='status_id' class="form-select" id="inputGroupSelect02">
                                <option selected>Choose...</option>
                                <?php foreach($statuses as $status) :?>
                                <option value="<?=$status['id']?>"><?=$status['title']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    <?php endif;?>

                    <button type='submit' class="btn btn-lg btn-success mt-md-3">Submit</button>
                    <a href="/" class="btn btn-lg btn-dark mt-md-3">Go back</a>

                </fieldset>
            </form>
        </div>
    </div>
</div>

