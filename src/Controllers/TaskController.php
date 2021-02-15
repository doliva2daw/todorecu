<?php
    namespace App\Controllers;

        use App\Request;
        use App\Session;
        use App\Controller;

    final class TaskController extends Controller{
        public function dashboard(){
            $user=$this->session->get('user');
            $data=$this->getDB()->selectWhereWithJoin('tasks','users',['tasks.description','tasks.id'],'user','id',['users.uname',$user['uname']]);
            $dataview=[ 'title'=>'Todo','user'=>$user,'data'=>$data];
            //var_dump($user);
            $this->render($dataview,"dashboard");
        }

        public function completed(){
            $user=$this->session->get('user');
            $dataview=[ 'title'=>'Todo','user'=>$user];
            $this->render($dataview,"completed");
        }

        public function new(){
            $user=$this->session->get('user');
            $this->render(['user'=>$user],'newtask');
        }

        public function add(){
            //$title=filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING);
            $body=stripslashes(filter_input(INPUT_POST,'body'));
            $createdAt=date('Y-m-d H:i:s');
            //$tags=filter_input(INPUT_POST,'tags',FILTER_SANITIZE_STRING);
            
            $value=["id"];
            $editor=$this->session->get('user');
            $editor=$data=$this->getDB()->selectAll('users',$value);
            
            $db=$this->getDB();
           // $db->beginTransaction();
            try{
                
                $db->insert('tasks',
                [
                'description'=>$body,
                //'user'=>$editor[0],
                'user'=>"4",//no obtengo bien el id del usuario dentro de la session, solo recojo el username
                'due_date'=>$createdAt]);
                //'due_date'=>'2021-02-15 15:03:11']);
                $post=$db->lastInsertId();
               // var_dump($post);
                
                header('Location:'.BASE.'task/dashboard');
            }
            catch(\PDOException $e){
        
                header('Location:'.BASE.'task/new');
            }
        }

        public function finish(){
            $user=$this->session->get('user');
            $this->render(['user'=>$user],'completed');
        }
    }