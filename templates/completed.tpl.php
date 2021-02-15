<?php
    include 'base.tpl.php';
    ?>
<main class="container">
   
   <h3>Tareas por hacer acabadas</h3>
   <div class="col my-auto">
   <section class="list">
   
   <?php
       if(isset($data)){
           foreach ($data as $row){
               
                  echo '<article class="post mb-3" style="background-color:grey;"><h2>'.
                  '<a href="'.BASE.'#'.$row['id'].'">'.$row['description'].'</a></h2><br></article>';//. 
                  //htmlspecialchars($row['cont']).'<h5><a href="'.BASE.'post/comment/id/'.$row['id'].'">Comment</a></h5></article>';
               } 
            }
       else{
           echo '<h3>No hay tareas acabadas</h3>';
       }
   ?>
   </div>
   </section>
  
   <section>
   </section>
   
</main>
<?php

    include 'footer.tpl.php';
    ?>