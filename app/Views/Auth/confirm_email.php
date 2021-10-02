<?php
$this->layout('auth_layout', ['title' => 'Confirm your email', 'action'=>'/confirmer_email']) ?>

<h1 class="h3 mb-3 fw-normal">Please insert your selector and token</h1>
<div class="form-floating">
    <input name="selector" type="text" class="form-control" id="floatingInput" placeholder="selector">
    <label for="floatingInput">Selector</label>
</div>

<div class="form-floating">
    <input name="token" type="text" class="form-control" id="floatingPassword" placeholder="token">
    <label for="floatingPassword">Token</label>
</div>

<button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
