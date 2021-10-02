<?php 
$this->layout('admin_layout', [
  'style' => $style,
  'title' => $title
]);?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-10 offset-1">
        <h1>Admin Panel</h1>
        <p class="lead">Choose the table </p>
        <p class="lead">
          <a class="btn btn-primary mx-2" href="/admin/users">Users</a>
          <a class="btn btn-warning mx-2" href="/admin/categories">Categories</a>
          <a class="btn btn-danger mx-2" href="/admin/products">Products</a>
          <a class="btn btn-success mx-2" href="/admin/reviews">Reviews</a>
        </p>
      </div>
    </div>
  </div>
</section>




