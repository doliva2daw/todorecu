<?php

    namespace App;

    interface View{
        public function render(?array $dataview=null,?string $template=null);
       // public function json();
    }