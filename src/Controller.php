<?php

    namespace App;
    use App\View;
    use App\Model;
    use App\DB;
    use App\Session;

    abstract class Controller implements View,Model{
        protected $request;
        protected $session;

        function __construct($request, $session){
            $this->request=$request;
            $this->session=$session;
        }

        function csrfCheck(){
            
            if ($this->request->getMethod() === 'POST') {
                if (!array_key_exists('csrf-token', $_POST)) {
                    throw new Exception();
                  //  echo '<p>ERROR: The CSRF Token was not found in POST payload.</p>';
                } elseif ($_POST['csrf-token'] !== $this->session->get('csrf-token')) {
                    throw new Exception();
                    //echo '<p>ERROR: The CSRF Token is not valid.</p>';
                } else {
                    return true;
                   //echo '<p>OK: The CSRF Token is valid. Will continue with email validation...</p>';
                }
            }
            
        }

        function error($string){
            $this->render(['error'=>$string],'error');
        }
        
        function render(?array $dataview=null,?string $template=null){
            if($dataview){
                extract($dataview,EXTR_OVERWRITE);
            }
            if ($template!=null){
                include 'templates/'.$template.'.tpl.php';
            }else{
                include 'templates/'.$this->request->getController().'.tpl.php';
            }
        }

        function getDB(){
            return DB::singleton();
        }
    }