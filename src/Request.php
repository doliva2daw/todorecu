<?php

    namespace App;

    class Request{
        private  $controller;
        private  $action;
        private $method;
        private  $params;

        protected $arrURI;
        
        function __construct(){
            $requestString=\htmlentities($_SERVER['REQUEST_URI']);
            //adaptar el sistema root a domini o carpeta
            $reqStr=$this->get_diff($requestString,ROOT);  
            //extract URI
            $this->arrURI=explode('/',$reqStr);
           
            $this->extractURI();
        }

        private function get_diff($a, $b){
            $c=substr($a,strlen($b));
            return $c;  
        }

        private function extractURI():void{     
            $length=count($this->arrURI);
            //estudi de casos possibles
            switch($length){
                case 1: //only controller
                    if($this->arrURI[0]==""){
                        $this->setController('index');
                    }else{
                        $this->setController($this->arrURI[0]);
                    }
                    $this->setAction('index');
                    break;
                case 2: //controller & action
                    $this->setController($this->arrURI[0]);
                    if($this->arrURI[1]==""){
                        $this->setAction('index');
                    }else{
                        $this->setAction($this->arrURI[1]);
                    }
                break;
                default: // cont. & act & params
                    $this->setController($this->arrURI[0]);
                    $this->setAction($this->arrURI[1]);
                    $this->Params();
                break;
            }
            $this->setMethod(\htmlentities($_SERVER['REQUEST_METHOD']));

        }
        
        private function Params():void{
            if($this->arrURI!=null){
                $arr_length=count($this->arrURI);
                if($arr_length > 2){
                    //quitar contr, y accion
                    array_shift($this->arrURI);
                    array_shift($this->arrURI);
                    $arr_length=count($this->arrURI);
                    if($arr_length % 2 == 0){
                        for($i=0;$i<$arr_length;$i++){  
                            if($i%2 == 0){
                                $arr_k[]=$this->arrURI[$i];
                            }else{
                                $arr_v[]=$this->arrURI[$i];
                            }
                        }
                        $array_res=array_combine($arr_k,$arr_v);
                        $this->setParams($array_res);
                    }

                }

            }
        }

        public function getController(){
            return $this->controller;
        }
        public function setController($controller){
            $this->controller=$controller;
        }
        public function getAction(){
            return $this->action;
        }
        public function setAction($action){
            $this->action=$action;
        }
        public function getMethod(){
            return $this->method;
        }
        public function setMethod($method){
            $this->method=$method;
        }
        public function getParams(){
            return $this->params;
        }
        public function setParams($array){
            $this->params=$array;
        }
    }