<?php $this->layout('layout') ?>

<div class="container">
	<p><?= $titulo ?></p>
	<p>Estoy en la Home de esta app</p>
</div>
<div class="container">
	<?php $this->insert('partials/banner', ['dato' => '$dato en Portada']) ?>
</div>
