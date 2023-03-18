<?php
require_once "models/user_model.php";
require_once "models/product_model.php";
require_once "userCrud.php";
require_once "productCrud.php";

class ModelFactory{
  private $crud;
  public $pageModel;

  public function __construct($crud){
    $this->crud = $crud;
  }

  public function createModel($name){
    switch ($name){
      case "user":
        $this->crud = $this->createCrud($name);
        $this->pageModel = new UserModel($this->pageModel, $this->crud);
        break;
      case "product":
        $this->pageModel = new ProductModel($this->crud);
        break;
      default:
        $this->pageModel = new PageModel($this->crud);
    }
    return $this->pageModel;
  }

  public function createCrud($name){
    switch ($name){
      case "user":
        $this->crud = new UserCrud($this->crud);
        break;
      case "product":
        $this->crud = new ProductCrud($this->crud);
        break;
    }
    return $this->crud;
  }
} 


?>