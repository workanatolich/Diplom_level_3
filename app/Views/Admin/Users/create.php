<?php 
$this->layout('admin_layout', [
    'title' => $title
]);?>


<div class="container">
    <div class="row">
        <div class="col-md-6 mt-5">
            <form action="/admin/user/creator" method="post">
                <fieldset>
                    <legend>
                        CREATE A USER
                    </legend>

                    <?=flash()->display();?>

                    <div class="input-group mb-3 mt-md-3">
                        <span class="input-group-text" id="basic-addon1">Username</span>
                        <input name="username" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    
                    <div class="input-group mb-3 mt-md-3">
                        <span class="input-group-text" id="basic-addon2">Email</span>
                        <input name="email" type="email" class="form-control" aria-label="Email" aria-describedby="basic-addon2">
                    </div>

                    <div class="input-group mb-3 mt-md-3">
                        <span class="input-group-text" id="basic-addon3">Password</span>
                        <input name="password" type="password" class="form-control" aria-label="Password" aria-describedby="basic-addon3">
                    </div>

                    <button type='submit' class="btn btn-lg btn-success mt-md-3">Submit</button>

                </fieldset>
            </form>
        </div>
    </div>
</div>
