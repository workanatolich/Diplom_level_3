<?php 
$this->layout('admin_layout', [
    'style' => $style,
    'title' => $title
  ]);?>

<section>
    <h1>All users</h1>
    <?= flash()->display();?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class='create-button'>
                    <a href="/admin/user/create" class="btn btn-success">Create a user</a>
                </div>
                <table class="table table-dark table-bordered table-striped text-center my-3">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach($users as $user) :?>
                        <tr class="col-md-12">
                            <td class="col-md-1"><?= $user['id']?></th>
                            <td class="col-md-2"><?= $user['username']?></td>
                            <td class="col-md-4"><?= $user['email']?></td>
                            <td class="col-md-1">
                                
                                <?php if($user['roles_mask'] == 1) {
                                    echo 'Admin';
                                } else {
                                    echo 'User';
                                }?>

                            </td>
                            <td class="col-md-2">
                                <a href="/admin/user/edit/<?=$user['id']?>" class="btn btn-warning">Edit</a>
                                <form action="/admin/user/deletor/<?=$user['id']?>" method="post">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
