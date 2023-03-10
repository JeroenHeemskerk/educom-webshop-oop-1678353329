<?php
include_once "html_doc.php";

class BasicDoc extends HtmlDoc{
  protected $data;

  public function __construct($myData)
  {
    $this->data = $myData;
  }

  private function showTitle(){
    echo '<title>'. $this->data['menu'][$this->data['page']].'</title>';
  }
  private function showCSSLinks(){
    echo '<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">';
    echo '<!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>';
    echo '<!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>';
    echo '<!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>';
  }
  private function showHeader(){
    echo '<header></header>';
  }
  private function showMenu($data){
    echo '<nav class="navbar navbar-expand-md bg-primary navbar-dark">';
    echo '<a class="navbar-brand" href="index.php">Navbar</a>';
    echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">';
    echo '<span class="navbar-toggler-icon"></span>';
    echo '</button>';
    echo '<div class="collapse navbar-collapse" id="collapsibleNavbar">';
    echo '<ul class="navbar-nav">';
    foreach($data['menu'] as $link => $label){
      $this->showMenuItem($link, $label);
    }
    echo '</ul>';
    echo '</div>';
    echo '</nav>';
  }
  private function showMenuItem($link, $label){
    echo "<li class='nav-item'>";
    echo "<a class='nav-link' href='../educom-webshop-oop/index.php?page=$link'>$label</a>";
    echo "</li>";
  }
  private function showContentStart(){
    echo '<div class="container-sm pb-4 border" style="max-width: 800px;">';
  }
  protected function showContent(){

  }
  private function showContentEnd(){
    echo '</div>';
  }
  private function showFooter(){
    echo '<footer = class="container-fluid bg-dark fixed-bottom">';
    echo '<p class="text-white my-0" style="text-align:right;">&#169; 2023 Daan Braas</p>';
    echo '</footer>';
  }

  protected function showHeadContent(){
    $this->showTitle();
    $this->showCSSLinks();
  }

  protected function showBodyContent(){
    $this->showHeader();
    $this->showMenu($this->data);
    $this->showContentStart();
    $this->showContent();
    $this->showContentEnd();
    $this->showFooter();

  }
}

?>