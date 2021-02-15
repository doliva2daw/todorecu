<?php
    include  'base.tpl.php';

    ?>
    <main class="container">
        <form method="post" action="<?=BASE;?>task/add">
            <label for="body">Tarea Nueva:</label><br>
            <textarea id="body" name="body" rows="5" cols="40"></textarea><br>  
            <input type="submit" value="Crear Tarea">
        </form>    
    </main>
    <script>
                    
    </script>
    
        <?php

        include 'footer.tpl.php';
        ?>