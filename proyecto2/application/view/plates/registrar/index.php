<?php $this->layout('layout') ?>

<div class="container">
    <h2>Registro de Usuario</h2>
    <?php $this->insert('partials/feedback') ?>
    <form action="/registrar/doregister" method="post" class="registrar">
        <section>
            <label>Email:</label> <input type="text" name="email">
            <br />
            <label>Clave:</label> <input type="password" name="clave">
            <br />
            <label>&nbsp</label> <input type="submit" value="Registrarse">
        </section>
    </form>
</div>