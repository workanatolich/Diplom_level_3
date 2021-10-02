<?php 
$this->layout('admin_layout', [
    'style' => $style,
    'title' => $title
  ]);?>

<section>
    <h1>All categories</h1>
    <?= flash()->display();?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class='create-button'>
                    <a href="/admin/category/create" class="btn btn-success">Create a category</a>
                </div>
                <table class="table table-dark table-bordered table-striped text-center my-3">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach($categories as $category) :?>
                        <tr class="col-md-12">
                            <td class="col-md-1"><?= $category['id']?></th>
                            <td class="col-md-9"><?= $category['title']?></td>
                            <td class="col-md-2">
                                <a href="/admin/category/edit/<?=$category['id']?>" class="btn btn-warning">Edit</a>
                                <form action="/admin/category/deletor/<?=$category['id']?>" method="post">
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
