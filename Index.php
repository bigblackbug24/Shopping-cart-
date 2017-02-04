<?php
session_start();
if(file_exists('./config.php')){
	include ('./config.php');
}
/**
 * @package  Email Validation API
 * @author   Muhammad Basit Munir <basit.munir@nxb.com.pk>
 *
 */

/**
 * Generic class autoloader.
 * 
 * @param string $class_name
 */
function autoLoadClass($class_name) {    //classes autoload 
//	echo ">>>>>>>".$class_name;                 
    $directories = array(    
        'controller/',
		//'model/'
    );
	
    foreach ($directories as $directory) {
         $filename = $directory . $class_name . '.php';    //in this line .php???
        if (is_file($filename)) {
            require($filename);
            break;
        }
    }
}

/**
 * Register autoloader functions.
 */
spl_autoload_register('autoLoadClass');

/**
 * Parse the incoming request.
 */


$request = isset($_SERVER['PATH_INFO']) && !empty($_SERVER['PATH_INFO']) ?  explode('/', trim($_SERVER['PATH_INFO'], '/')) : array("Login","index");
//$request frst index contains class name controller class name
//second parameter is its action name mean controller function.

if(!empty($request)){           //this condition for if request is not exist in url
	
    $controller_name = ucfirst($request[0]) . 'Controller';   // .controllar work ???
	if (class_exists($controller_name)) { // also calls the autoload function to chek if class exists or not.
        $controller = new $controller_name;
        $action_name = isset($request[1]) ? strtolower($request[1]) : 'index' ;
//		$parameters = $request;
		//logic to remove/unset class,action parameters.
		$parameters=array();
		
		for($i=2; $i < count($request) ; $i++)
		{
			//$array=$parameters; // these are parameters need to pass in call user function array function.
			$parameters[] = $request[$i];
		}
	
        $response = call_user_func_array(array($controller, $action_name), $parameters); // call required function.
		$variable= extract($response);
		
	} else {
                    
		
		$template = '404';
		$title = 'Page not Found';
//		$response== 0 ? "file existing" :  "file missing";
	}
	
} else{
	$template = '404';
	$title = 'Page not Found';
}

if($request[0] != 'install'){
	require_once('/views/layout.php');
} else {
	require_once('/views/install_layout.php');
}

?>
