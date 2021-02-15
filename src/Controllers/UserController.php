<?php
    namespace App\Controllers;

        use App\Request;
        use App\Session;
        use App\Controller;

    final class UserController extends Controller{

        public function __construct(Request $request,Session $session){
            parent::__construct($request,$session);
        }

        public function login(){
            $db=$this->getDB();
            $data=$db->selectAll('users');
            // uso de funciones declaradas en el modelo 
            // y definidas en la clase abstracta
            // $stmt=$this->query($db,"SELECT * FROM users ",null);
            $user=$this->session->get('user');
            $dataview=[ 'title'=>'My Bloger','user'=>$user,
                         'data'=>$data];
            $this->render($dataview,"login");

        }

        function log(){
            echo $_POST['email'];
            echo $_POST['passw'];
             if (isset($_POST['email'])&&!empty($_POST['email'])
             &&isset($_POST['passw'])&&!empty($_POST['passw'])){
                 $email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
                 $pass=filter_input(INPUT_POST,'passw',FILTER_SANITIZE_STRING);
            
                 $user=$this->auth($email,$pass);

                if($user){
                     $this->session->set('user',$user);
                     //si usuari valid
                     if(isset($_POST['remember-me'])&&($_POST['remember-me']=='on'||$_POST['remember-me']=='1' )&& !isset($_COOKIE['remember'])){
                         $hour = time()+3600 *24 * 30;
                         $path=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
                         var_dump($path);
                         //die;
                         setcookie('username', $user['username'], $hour,$path);
                         setcookie('email', $user['email'], $hour,$path);
                         setcookie('active', 1, $hour,$path);          
                     }
                     header('Location:'.BASE.'task/dashboard');
                 }
                 else{
                     header('Location:'.BASE.'user/login');
                 }
             }
            
             
         }

        private function auth($email,$pass){
            
            try{   
                $db=$this->getDB();
                $consulta='SELECT uname FROM users WHERE email="'.$email.'" && passw="'.$pass.'" LIMIT 1';
                $stmt=$db->prepare($consulta);
                $stmt->execute();
                $count=$stmt->rowCount();
                $row=$stmt->fetchAll(\PDO::FETCH_ASSOC);  

                if($count==1){       
                    $user=$row[0];
                    return $user;
                }else{
                    return false;
                }
            }catch(\PDOException $e){
                return false;
            }
        }

        function dashboard(){  
            $user=$this->session->get('user');
            //$data=$this->getDB()->selectWhereWithJoin('posts','users',['posts.id','posts.title'],'editor','id',['users.username',$user['username']]);
            //$this->render(['user'=>$user,'data'=>$data],'dashboard');
            //header('Location:'.BASE.'dashboard/index');
            $db=$this->getDB();
            $posts=$db->selectAll('post');
            $this->render(['user'=>$user,'data'=>$posts],'dashboard');
        }

        /*public function profile(){
            $user=$this->session->get('user');
            $this->render(['user'=>$user],'profile');          

        }*/

        function logout(){
            $user=$this->session->destroy();
            header('Location:'.BASE);
        }

        public function register(){
            $db=$this->getDB();
            $data=$db->selectAll('users');
            $user=$this->session->get('user');
            $dataview=[ 'title'=>'My Bloger','user'=>$user,
                         'data'=>$data];

            $this->render($dataview,'register');
        }

        public function reg(){
           
            if(isset($_POST['email'])&&!empty($_POST['email'])&&
                isset($_POST['username'])&&!empty($_POST['username'])&&
                isset($_POST['passw'])&&!empty($_POST['passw']))
            {
                
                $email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
                $passwd=filter_input(INPUT_POST,'passw',FILTER_SANITIZE_STRING);
                $passwd2=filter_input(INPUT_POST,'passwd',FILTER_SANITIZE_STRING);
                $username=filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);
                
                if ($passwd===$passwd2){
                    
                    //$passwd=password_hash($passwd,PASSWORD_BCRYPT,['cost'=>4]);
                    $data=[

                        'uname'=>$username,
                        'passw'=>$passwd,
                        'email'=>$email,
                        'role'=>1
                    ];
                    
                    // insert en db
                    if ($this->getDB()->insert('users',$data)){
                        header('Location:'.BASE);
                    }
                
                }
            }else{
                header('Location:'.BASE.'user/register');
            }
        }
        
    }