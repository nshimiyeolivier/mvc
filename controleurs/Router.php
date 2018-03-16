<?php
class Router
{
  private $_ctrl;
  private $_view;

  public function routeReq()
  {
    try {
      //CHARGEMENT AUTOMATIQUE DES CLASSES
      spl_autoload_registe(function($class){
        require_once('models/'.$class.'.php');
      });

      $url = '';
      //LE CONTROLEUR EST INCLUS SELON L'ACTION DE L'UTILISATEUR
      if (isset($_GET['url'])){
        url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

        $controller = ucfirst(strtolower($url[0]));
        $controllerClass = "controller".$controller;
        $controllerFile =  "controller".controllerClass.".php";

        if (fil_exists($controllerFile)){
          require_once($controllerFile);
          $this->_ctrl = new $controllerClass($url);
        }else{
          throw new Exception ('Page introuvable');
        }else{
          require_once('controllers/ControllerAccueil.php');
          this->_ctrl = new ControllerAccueil($url);
        }
      }
      //GESTION DES ERREURS
    } catch (Exception $e) {
      errorMsg = $e -> getMessage();
      require_once('view/viewError.php');
    }

  }
}
 ?>
