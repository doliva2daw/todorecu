<?php
    // crea el esquema
    include 'config.php';
    require __DIR__.'/vendor/autoload.php';
    
    use App\App;
    App::init();

    define('DSN',$conf['driver'].':host='.$conf['dbhost'].';dbname='.$conf['dbname']);
    define('USR',$conf['dbuser']);
    define('PWD',$conf['dbpass']);

    $db=new \PDO(DSN,USR,PWD);
    
    $sql=file_get_contents('prouf1.sql');
    try{
        $db->exec($sql);
    }
    catch(PDOException $e)
    {
        die($e->getMessage());
    }
    