<?php $this->layout('layout') ?>

<div class="container">
	<h2>Login Correcto</h2>
	<p>Login Ok, amigo <?= Session::get("user_name") ?></p>
</div>