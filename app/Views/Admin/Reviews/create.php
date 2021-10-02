<?php 
$this->layout('admin_layout', [
    'title' => $title
]);
?>


<div class="container">
    <div class="row">
        <div class="col-md-6 mt-5">
            <form action="/admin/review/creator" method="post">
                <fieldset>
                    <legend>
                        CREATE A REVIEW
                    </legend>

                    <?=flash()->display();?>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Product ID</span>
                        <input name="product_id" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon2">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Review Text</span>
                        <textarea name="text" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect02">Status</label>
                        <select name='status_id' class="form-select" id="inputGroupSelect02">
                            <option selected>Choose...</option>
                            <?php foreach($statuses as $status) :?>
                            <option value="<?=$status['id']?>"><?=$status['title']?></option>
                            <?php endforeach;?>
                        </select>
                    </div> 

                    <button type='submit' class="btn btn-lg btn-success mt-md-3">Submit</button>

                </fieldset>
            </form>
        </div>
    </div>
</div>

