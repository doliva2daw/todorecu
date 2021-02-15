<?php
    include 'base.tpl.php';
    ?>
    <main role="main" class="inner cover">
    <h1 class="cover-heading">Inicia Sesion</h1>
    <form method="post" action="<?=BASE;?>user/log">
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br>
        <label for="passw">Contraseña:</label><br>
        <input type="password" id="passw" name="passw"><br><br>
        <input type="checkbox" id="remember-me" name="remember-me" value="1">
        <label for="remember-me">Recuerdame</label><br>
        <input type="submit" value="Entrar">
    </form> 
  </main>
 
<?php

    include 'footer.tpl.php';
    ?>