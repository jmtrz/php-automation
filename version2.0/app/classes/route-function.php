<?php
//   require_once '/php-automation/app/classes/server.php';

  class Controller{

      protected $result;

      public static function CreateView($viewName){
        //   require_once $_SERVER['DOCUMENT_ROOT'].'/php-automation/app/view/'.$viewName.'.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'/php-automation/version2.0/app/controllers/'.$viewName.'.php';
      }

      public static function UserCreateView($viewName){
        //   require_once $_SERVER['DOCUMENT_ROOT'].'/php-automation/app/view/'.$viewName.'.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'/php-automation/version2.0/app/user/'.$viewName.'.php';
      }
  }

?>