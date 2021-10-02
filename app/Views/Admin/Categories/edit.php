<?php 
$this->layout('admin_layout', [
    'title' => $title
]);?>


<div class="container">
    <div class="row">
        <div class="col-md-6 mt-5">
            <form action="/admin/category/editor/<?=$category['id']?>" method="post">
                <fieldset>
                    <legend>
                        EDIT A CATEGORY
                    </legend>

                    <?=flash()->display();?>

                    <div class="input-group mb-3 mt-md-5">
                        <span class="input-group-text" id="basic-addon1">Category Title</span>
                        <input name="title" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" value="<?=$category['title']?>">
                    </div>

                    <button type='submit' class="btn btn-lg btn-warning mt-md-3">Update</button>

                </fieldset>
            </form>
        </div>
    </div>
</div>
