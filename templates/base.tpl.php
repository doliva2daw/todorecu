<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">   
    <link href="<?= BASE;?>public/css/cover.css" rel="stylesheet">
    <title>Todo</title>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand">Todo</h3>
      <nav class="nav nav-masthead justify-content-center">
        
        <?php if(isset($user)){ ?>
          <a class="nav-link active" href="<?=BASE;?>task/dashboard">Tareas</a>
          <a class="nav-link active" href="<?=BASE;?>task/completed">Acabado</a>
          <a class="nav-link" href="<?=BASE;?>user/logout">Cerrar</a>
        <?php }else{ ?>
          <a class="nav-link active" href="<?=BASE;?>">Home</a>
          <a class="nav-link" href="<?=BASE;?>user/register">Registro</a>
          <a class="nav-link" href="<?=BASE;?>user/login">Login</a>
        <?php } ?>
      </nav>
    </div>
  </header>

  

  
   



    
   
  
  
