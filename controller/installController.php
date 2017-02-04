<?php
include('./model/installModel.php');
class installController extends Controller {
	
	private $settings;
	function __construct(){
		
		
	}
	
	
	public function index()
	{
		if(isset($_POST['submit'])){
			$dirname = basename(dirname(dirname(dirname(__FILE__))));
			
			$url = 'http://';
			$url .=$_SERVER['SERVER_NAME']=='localhost' ? $_SERVER['SERVER_NAME'].'/'.$dirname : $_SERV‌​ER['SERVER_NAME']; 
			
			$path_to_file = 'sample-config.php';
			$file_contents = file_get_contents($path_to_file);
			//replace DATABASE name
			$file_contents = str_replace("{DATABASENAME}",$_POST['db_name'],$file_contents);
			$file_contents = str_replace("{DBHOST}",$_POST['db_host'],$file_contents);
			$file_contents = str_replace("{USER}",$_POST['db_user'],$file_contents);
			$file_contents = str_replace("{PASS}",$_POST['db_password'],$file_contents);
			$file_contents = str_replace("{SITE_URL}",$url.'/Admin/',$file_contents);
			$file_contents = str_replace("{FRONTEND_URL}",$url.'/',$file_contents);
			file_put_contents($path_to_file,$file_contents);
			rename("./sample-config.php","config.php");
			//front end file settings
			
			$path_to_file = './../sample-config.php';
			$file_contents = file_get_contents($path_to_file);
			$file_contents = str_replace("{DATABASENAME}",$_POST['db_name'],$file_contents);
			$file_contents = str_replace("{DBHOST}",$_POST['db_host'],$file_contents);
			$file_contents = str_replace("{USER}",$_POST['db_user'],$file_contents);
			$file_contents = str_replace("{PASS}",$_POST['db_password'],$file_contents);
			$file_contents = str_replace("{SITE_URL}",$url.'/',$file_contents);
			file_put_contents($path_to_file,$file_contents);
			rename("./../sample-config.php","./../config.php");
			if(file_exists('config.php')){
				include_once('config.php');
				$this->settings=new installModel;
				$this->settings->setupDatabase();
			}
			
			header("location: ".SITE_URL.'install/step2');
		}	
			
		$output = $this->outPut('install/install',array('title'=>'Install Cart','pageTitle'=>'Configure Database'));
		return $output;
		
 	}
	
	public function step2(){
		if(isset($_POST['submit'])){
			if(file_exists('config.php')){
				include_once('config.php');
				$this->settings=new installModel;
				$this->settings->registerUser($_POST);
				$this->settings->saveSettings($_POST);
				
			}
			header("location: ".SITE_URL.'user/login');	
		}
		
		$output = $this->outPut('install/step2',array('title'=>'step 2','pageTitle'=>'Step 2'));
		return $output;
	}
	
	
}


?>