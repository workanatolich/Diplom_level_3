<?php

$this->layout('auth_layout', ['title' => 'Registration', 'action' => '/register']) ?>



<h1 class="h3 mb-3 fw-normal">Please register</h1>

<div class="form-floating">
     <input name="username" type="text" class="form-control" id="floatingInput" placeholder="nickname">
     <label for="floatingInput">Name</label>
</div>

<div class="form-floating">
    <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
    <label for="floatingInput">Email address</label>
</div>

<div class="form-floating">
    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
    <label for="floatingPassword">Password</label>
</div>

<button class="w-100 btn btn-lg btn-primary" type="submit">Register </button>
