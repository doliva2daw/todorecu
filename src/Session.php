<?php

    namespace App;

    final class Session {
        protected $id;
        public function __construct() {
    
            $status = session_status();
    
            if($status == PHP_SESSION_DISABLED) {
                throw new \LogicException('Sessions are disabled.');
            }
                if($status == PHP_SESSION_NONE) {
                session_start();
                $this->id=session_id();
            }
        }
    
        /**
         * Gets a session value associated with the specified key.
         *
         * @param string $key
         *
         * @return mixed|null Returns the value on success. NULL if the key doesn't exist.
         */
        public function get($key) {
            if(array_key_exists($key, $_SESSION)) {
                return $_SESSION[$key];
            }
            return null;
        }
    
        /**
         * Set a new session elements or update an existing one.
         *
         * @param string $key
         * @param mixed  $value
         */
        public function set($key, $value) {
            $_SESSION[$key] = $value;
        }
        public function unset($key){
            if ($this->exists($key)){
                unset($_SESSION[$key]);
            }
        }
    
        /**
         * Deletes a session element.
         *
         * @param string $key
         *
         * @return bool
         */
        public function delete($key) {
            if(array_key_exists($key, $_SESSION)) {
                unset($_SESSION[$key]);
                return true;
            }
            return false;
        }
    
        /**
         * Determines if a session key exists.
         *
         * @param string $key
         *
         * @return bool
         */
        public function exists($key) {
            return array_key_exists($key, $_SESSION);
        }

        public function destroy(){
            session_destroy();
        }
    
    }