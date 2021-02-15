<?php
    include 'base.tpl.php';
    ?>
    <main role="main" class="inner cover">
    <h1 class="cover-heading">Registro</h1>
    <form method="post" action="<?=BASE;?>user/reg">
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br><br>
        <label for="username">Usuario:</label><br>
        <input type="text" id="username" name="username"><br><br>
        <label for="passw">Contraseña:</label><br>
        <input type="password" id="passw" name="passw"><br><br>
        <label for="passwd">Repetir Contraseña:</label><br>
        <input type="password" id="passwd" name="passwd"><br><br>
        <input type="submit" value="Registro">
    </form> 
  </main>
 
<?php

    include 'footer.tpl.php';
    ?>