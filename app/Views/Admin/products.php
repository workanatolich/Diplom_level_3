<?php 
$this->layout('admin_layout', [
    'style' => $style,
    'title' => $title
  ]);?>

<section>
    <h1>All Products</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class='create-button'>
                    <a href="/admin/product/create" class="btn btn-success">Create a product</a>
                </div>
                <table class="table table-bordered table-dark table-sm table-striped text-center my-3">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category_ID</th>
                            <th scope="col">User_ID</th>
                            <th scope="col">Status_ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($products as $product) :?>
                        <tr class="col-md-12">
                            <td class="col-md-1"><?=$product['id']?></td>
                            <td class="col-md-1"><?=$product['category_id']?></td>
                            <td class="col-md-1"><?=$product['user_id']?></td>
                            <td class="col-md-1"><?=$product['status_id']?></td>
                            <td class="col-md-2"><?=$product['title']?></td>
                            <td class="col-md-4"><?=$product['description']?></td>
                            <td class="col-md-2">
                                <a href="/product/<?=$product['id']?>" class="btn btn-info">View</a>
                                <form action="/product/edit/<?=$product['id']?>" method="post"><button type="submit" class="btn btn-warning">Edit</button></form>
                                <form action="/product/delete/<?=$product['id']?>" method="post"><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Delete</button></form>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>