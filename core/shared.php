<?php

/** Check if environment is development and display errors **/

function setReporting() {
    if (DEVELOPMENT_ENVIRONMENT == true) {
            error_reporting(E_ALL);
            ini_set('display_errors','On');
    } else {
            error_reporting(E_ALL);
            ini_set('display_errors','Off');
            ini_set('log_errors', 'On');
    }
}

/** Check for Magic Quotes and remove them **/

function stripSlashesDeep($value) {
	$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
	return $value;
}

function removeMagicQuotes() {
    if ( get_magic_quotes_gpc() ) {
            $_GET    = stripSlashesDeep($_GET   );
            $_POST   = stripSlashesDeep($_POST  );
            $_COOKIE = stripSlashesDeep($_COOKIE);
    }
}

/** Check register globals and remove them **/

function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}

/** Main Call Function **/

function callHook() {
    
    $router = new Router;
    
    // add routes
    
        // custom routes here
    
    

        // standard route
        $router->addRoute("/alphanum:controller/alphanum:action/alphanum:param");
        
        // homepage
        $router->addRoute("/", array('controller' => 'pages', 'action' => 'homepage'));
        
        $urlArr = explode('?', $_SERVER['REQUEST_URI']);
        $url = (strlen($urlArr[0]) > 1 && substr($urlArr[0], -1) == '/') ? substr($urlArr[0], 0, -1) : $urlArr[0];
        $route = $router->getRoute($url);
        
        if(!$route){
            
            // 404
            error_404('Route not found');
            
        }
        
        else{
            
            $controller = ucwords($route['controller']).'Controller';
            $inflector = new Inflect();
            $model = ucwords($inflector->singularize($route['controller']));
            $action = $route['action'];
            $controllerName = ucwords($route['controller']);
            
        }
        
        // fire up the controller
        if(class_exists($controller)){
            
            $dispatch = new $controller($model,$controllerName,$action);
            
            if ((int)method_exists($controller, $action)){
                call_user_func_array(array($dispatch,$action),array($route));
            }
            
            else{
                // 404
                error_404('No method in controller');
            }
            
        }
        
        else{
                // 404
                error_404('No class found. '.$controller);
        }
        
}

/** Autoload any classes that are required **/

function __autoload($className) {
	if (file_exists(ROOT . DS . 'core' . DS . strtolower($className) . '.class.php')) {
		require_once(ROOT . DS . 'core' . DS . strtolower($className) . '.class.php');
	} else if (file_exists(ROOT . DS . 'application' . DS . 'controller' . DS . $className . '.php')) {
		require_once(ROOT . DS . 'application' . DS . 'controller' . DS . $className . '.php');
	} else if (file_exists(ROOT . DS . 'application' . DS . 'model' . DS . $className . '.php')) {
		require_once(ROOT . DS . 'application' . DS . 'model' . DS . $className . '.php');
	} else {
		/* Error Generation Code Here */
            // 404
            error_404('No class file found');
	}
}

function loadWidget($widget, $params){
    
            $obj = $widget.'Widget';
            $$obj = new WidgetsController($widget, $params);
    
}

function error_404($error_message){
    
            // 404
            $dispatch = new PagesController('Page','Pages','error404');
            $dispatch->error404($error_message);
    
}

session_start();
ob_start("ob_gzhandler");

setReporting();
removeMagicQuotes();
unregisterGlobals();
callHook();
