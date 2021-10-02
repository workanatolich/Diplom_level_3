<?php
$this->layout('admin_layout', [
    'title' => $title
]);
?>


<div class="container">
    <div class="row">
        <div class="col-md-6 mt-5">
            <form action="/admin/review/editor/<?=$review['id']?>" method="post">
                <fieldset>
                    <legend>
                        EDIT A REVIEW
                    </legend>

                    <?=flash()->display();?>
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Review Text</span>
                        <textarea name="text" rows="5" class="form-control"><?= $review['text']?></textarea>
                    </div>

                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect02">Review Status</label>
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



                    <button type='submit' class="btn btn-lg btn-warning mt-md-3">Update</button>

                </fieldset>
            </form>
        </div>
    </div>
</div>
