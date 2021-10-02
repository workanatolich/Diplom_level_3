<?php 
$this->layout('admin_layout', [
    'style' => $style,
    'title' => $title
  ]);?>


<section>
    <div class="container">
        <h1>All Reviews</h1>
        <?= flash()->display();?>
        <div class="row">
            <div class="col">
                <div class='create-button'>
                    <a href="/admin/review/create" class="btn btn-success">Create a review</a>
                </div>
                <table class="table table-dark table-bordered table-striped text-center my-3">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User_ID</th>
                            <th scope="col">Product_ID</th>
                            <th scope="col">Text</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($reviews as $review) :?>
                        <tr class="col-md-12">
                            <td class="col-md-1"><?=$review['id']?></td>
                            <td class="col-md-1"><?=$review['user_id']?></td>
                            <td class="col-md-1"><?=$review['product_id']?></td>
                            <td class="col-md-7"><?=$review['text']?></td>
                            <td class="col-md-2">
                                <a href="/admin/review/edit/<?=$review['id']?>" class="btn btn-warning">Edit</a>
                                <form action="/admin/review/deletor/<?=$review['id']?>" method="post">
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