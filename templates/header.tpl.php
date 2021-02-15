<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">   
    <link rel="stylesheet" href="<?= BASE;?>public/css/app.css">
    <title><?php echo $title??'Todo'; ?></title>
 
</head>
<body class="text-center">  
  <header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand">Cover</h3>
      <nav class="nav nav-masthead justify-content-center">
        
        <?php 
                if ($user){
                    echo '<a class="nav-link" href="'.BASE.'user/dashboard">Home</a></li>';
                    echo '<a class="nav-link" href="'.BASE.'user/logout">Logout</a></li>';
                    echo '<a class="nav-link" href="'.BASE.'user/profile">'.$user['uname'].'</a></li>';
                }
                else{
                    echo '<a class="nav-link" href="'.BASE.'">Home</a></li>';
                    echo '<a class="nav-link" href="'.BASE.'user/login">Login</a></li>';
                    echo '<a class="nav-link" href="'.BASE.'user/register">Register</a></li>';
                }
        ?>
        <a class="nav-link" href="#">Contacto</a>
      </nav>
    
  </header>