<?php
error_reporting(E_ERROR);
  function myAutoload($name){
    if (file_exists("../../classes/".$name.".php")) {
      require_once "../../classes/".$name.".php";
    }elseif (file_exists("../controllers/".$name.".php")) {
      require_once "../controllers/".$name.".php";
    }elseif (file_exists("../../admin/controllers/".$name.".php")) {
      require_once "../../admin/controllers/".$name.".php";
    }
    
  }
  spl_autoload_register('myAutoload');
