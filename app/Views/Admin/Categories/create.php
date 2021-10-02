<?php 
$this->layout('admin_layout', [
    'title' => $title
]);?>


<div class="container">
    <div class="row">
        <div class="col-md-6 mt-5">
            <form action="/admin/category/creator" method="post">
                <fieldset>
                    <legend>
                        CREATE A CATEGORY
                    </legend>

                    <?=flash()->display();?>

                    <div class="input-group mb-3 mt-md-5">
                        <span class="input-group-text" id="basic-addon1">Category Title</span>
                        <input name="title" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <button type='submit' class="btn btn-lg btn-success mt-md-3">Submit</button>

                </fieldset>
            </form>
        </div>
    </div>
</div>
