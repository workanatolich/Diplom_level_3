<?php 
$this->layout('admin_layout', [
    'title' => $title
]);?>


<div class="container">
    <div class="row">
        <div class="col-md-6 mt-5">
            <form action="/admin/user/editor/<?=$user['id']?>" method="post">
                <fieldset>
                    <legend>
                        EDIT A USER
                    </legend>

                    <?=flash()->display();?>

                    <div class="input-group mb-3 mt-md-3">
                        <span class="input-group-text" id="basic-addon1">Username</span>
                        <input name="username" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" value="<?=$user['username']?>">
                    </div>
                    
                    <div class="input-group mb-3 mt-md-3">
                        <label class="input-group-text" for="inputGroupSelect01">Role</label>
                        <select name='roles_mask' class="form-select" id="inputGroupSelect02">
                        <?php if($user['roles_mask'] == 0) : ?>
                            <option value="0" selected>User</option>
                            <option value="1">Admin</option>
                        <?php else :?>
                            <option value="0">User</option>
                            <option value="1" selected>Admin</option>
                        <?php endif;?>
                        </select>
                    </div>

                    <button type='submit' class="btn btn-lg btn-warning mt-md-3">Update</button>

                </fieldset>
            </form>
        </div>
    </div>
</div>
