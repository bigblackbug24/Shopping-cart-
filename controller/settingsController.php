<?php
include('./model/settingsModel.php');
class SettingsController extends Controller {
	
	private $settings;
	function __construct(){
		$this->settings=new settingsModel;
		
	}
	
	
	public function index()
	{
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			if(isset($_POST['sub'])){
				unset($_POST['sub']);
				$_POST['logo'] = $this->uploadFile();
				$this->settings->updateSettings($_POST);
				header("location: ".SITE_URL."settings");
			}
			$settings = $this->settings->getSettings();
			$output = $this->outPut('settings/index',array('title'=>'Site Settings','pageTitle'=>'Site Settings','configs'=>$settings));
			return $output;
		} else {
		
			header("location:".SITE_URL.'User/login' );
		
	  	}
 	} 
	
	public function pages(){
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			$pages = $this->settings->getPages('theme');
			$pagination = $this->paginate($this->getUrl('settings/pages'), $this->settings->countAllPages());
			$output = $this->outPut('settings/pages',array('title'=>'Manage Pages','pageTitle'=>'Manage Pages','pages'=>$pages,'addLink'=>$this->getUrl('settings/add_page'),'AddText'=>'add Pages','pagination'=>$pagination));
			return $output;
		} else {
		
			header("location:".SITE_URL.'User/login' );
		
	  	}
	}
	
	public function add_page(){
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			if(isset($_POST['sub'])){
				$this->settings->savePage($_POST);
				header("location:".SITE_URL.'settings/pages' );
			}
			$output = $this->outPut('settings/pageForm',array('title'=>'Add New Page','pageTitle'=>'Add New Page'));
			return $output;
		} else {
		
			header("location:".SITE_URL.'User/login' );
		
	  	}
	}
	
	public function edit_page($pageId){
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			if(isset($_POST['sub'])){
				$this->settings->updatePage($_POST);
				header("location:".SITE_URL.'settings/pages' );
			}
			$page = $this->settings->getPage($pageId);
			$output = $this->outPut('settings/pageForm',array('title'=>'Edit Page','pageTitle'=>'Edit Page','page'=>$page));
			return $output;
		} else {
		
			header("location:".SITE_URL.'User/login' );
		
	  	}
	}
	
	public function delete_page($pageId){
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			$this->settings->deletePage($pageId);
			header("location:".SITE_URL.'settings/pages' );
		} else {
		
			header("location:".SITE_URL.'User/login' );
		
	  	}
	}
	
	
	public function theme(){
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			if(isset($_POST['sub'])){
				unset($_POST['sub']);
				$this->settings->updateSettings($_POST);
				header("location: ".SITE_URL."settings/theme");
			}
			$path = UPLOAD_PATH.'/views';
			$filePath = FRONTEND_URL.'views';
			
			$results = scandir($path);
			$themes =array();
			foreach ($results as $result) {
				if ($result === '.' or $result === '..') continue;
			
				if (is_dir($path . '/' . $result)) {

					$themes[]=array('name'=>$result,'path'=>$filePath.'/'.$result);//code to use if directory
				}
			}
			$activeTheme = $this->settings->getOption('theme');
			$output = $this->outPut('settings/themes',array('title'=>'Available Themes','pageTitle'=>'Available Themes','themes'=>$themes,'activeTheme'=>$activeTheme));
			return $output;
		} else {
		
			header("location:".SITE_URL.'User/login' );
		
	  	}
	}
	
	public function payment(){
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			if(isset($_POST['sub'])){
				unset($_POST['sub']);
				$this->settings->updateSettings($_POST);
				header("location: ".SITE_URL."settings/payment");
			}
			$gateways=$this->settings->getGateways();
			$output = $this->outPut('settings/payment',array('title'=>'Payment GateWays','pageTitle'=>'Payment Gateways','gateways'=>$gateways));
			return $output;
		} else {
		
			header("location:".SITE_URL.'User/login' );
		
	  	}
	}
	
	public function edit_gateway($id){
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			if(isset($_POST['sub'])){
				unset($_POST['sub']);
				$this->settings->updateGateWay($_POST);
				header("location: ".SITE_URL."settings/payment");
			}
			$gateway=$this->settings->getGateway($id);
			$output = $this->outPut('settings/gatewayForm',array('title'=>'Edit Payment GateWays','pageTitle'=>'Edit Payment Gateways','gateway'=>$gateway));
			return $output;
		} else {
		
			header("location:".SITE_URL.'User/login' );
		
	  	}
	}
	
	public function menus(){
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			$menus = $this->settings->getMenus();
			$output = $this->outPut('settings/manageMenus',array('pageTitle'=>'Manage Menus','menus'=>$menus,'addLink'=>$this->getUrl('settings/add_menu'),'AddText'=>'Add menu'));
			return $output;
		} else {
		
			header("location:".SITE_URL.'User/login' );
		
	  	}
 
	}
	
	public function add_menu(){
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			if(isset($_POST['sub'])){
				$this->settings->addMenu($_POST);
				header("location:".SITE_URL.'settings/menus');
			}
			$output = $this->outPut('settings/menusForm',array('title'=>'Add Menus','pageTitle'=>'Add Menus','addLink'=>$this->getUrl('settings/add_menu'),'AddText'=>'Add Menu'));
			return $output;
		} else {
		
			header("location:".SITE_URL.'User/login' );
		
	  	}
	}
	
	public function edit_menu($menuId){
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			if(isset($_POST['sub'])){
				$this->settings->updateMenu($menuId);
				header("location:".SITE_URL.'settings/menus' );
			}
			$output = $this->outPut('settings/menusForm',array('title'=>'Add Menus','pageTitle'=>'Add Menus','addLink'=>$this->getUrl('settings/add_menu')));
			return $output;		
			} else {
		
			header("location:".SITE_URL.'User/login' );
		
	  	}
	}
	
	public function delete_menu($menuId){
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			$this->settings->deleteMenu($menuId);
			header("location:".SITE_URL.'settings/menus' );
		} else {
		
			header("location:".SITE_URL.'User/login' );
		
	  	}
	}
	public function getMenusItems($type){
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			$table="";
			$class="";
			if($type=='categories'){
				$table = "catagaries";
				$class="category_menu";
			} else if($type == 'custom'){
				$menu= $this->reArrangMenu(array(0=>$_POST),'custom');
				echo $menu;
				exit;
			} else {
				$table = 'pages';
				$class="page_menu";
			}
			$menu = $this->settings->getMenuItems($table);
			$menu = $this->reArrangMenu($menu, $class);
			echo $menu;
		} else {
		
			echo "You Must Login!";
		
	  	}
		exit;
	}
	public function uploadFile()
	{
		$_fname=$_FILES['file']['name'];
		$_ftemp=$_FILES['file']['tmp_name'];
		$store=UPLOAD_PATH."/upload/".$_fname;
		$filename = FRONTEND_URL."upload/".$_fname;
		move_uploaded_file($_ftemp,$store);	 
		return $filename;
	}
	
	protected function reArrangMenu($menuRows, $type){
		$menu = '';
		if($menuRows){
			foreach($menuRows as $row){
				$data = $row;
				$menu .= '<p class="'. $type .'"><a href="'.$row['link'].'">'.$row['title'].'</a><input type="hidden" name="menu_links[]" value=\''.json_encode($row).'\' /><img src="'.SITE_URL.'img/icons/user_delete.png" class="remove_menu" alt="remove" /></p>';
			}
		}
		return $menu;
	}
	
	
}


?>