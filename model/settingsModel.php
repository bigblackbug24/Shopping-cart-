<?php
include('model.php');
class settingsModel extends Model
{
	private $conn;
	private $stmt;
	private $dbHandler;

	public function __construct(){
		$this->dbHandler = parent::__construct();//new PDO('mysql:host='.DBHOST.';dbname='.DATABASENAME, USER, PASS);	
	}
	
	public function getSettings($field=''){
		$chunk ='';
		if($field != ''){
			$chunk  = "where field='".$field."'";
		}
		
		$stmt=$this->dbHandler->prepare("select * from settings ".$chunk);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	}
	
	public function updateSettings($formData){
		foreach($formData as $key=>$value){
			$stmt=$this->dbHandler->prepare("update settings set value = :wvalue where field=:wfield");
			$stmt->bindParam(':wvalue', $value, PDO::PARAM_STR);
			$stmt->bindParam(':wfield', $key, PDO::PARAM_STR);
			$stmt->execute();
		}
	}
	
	public function getOption($key)
	{
		$stmt=$this->dbHandler->prepare("select value from settings where field='".$key."'");
		$stmt->execute();
		$output=$stmt->fetch(PDO::FETCH_ASSOC);
		return $output['value'];
	}
	
	public function getGateways(){
		$per_page = $this->getConfig('limit');
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $per_page;
		
		$stmt=$this->dbHandler->prepare("select * from payment_gateways limit $start_from, $per_page");
		$stmt->execute();
		$output=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $output;
	}
	
	public function getGateway($id){
		$stmt=$this->dbHandler->prepare("select * from payment_gateways where gateway_id=:wid");
		$stmt->bindParam(':wid', $id, PDO::PARAM_INT);
		$stmt->execute();
		$output=$stmt->fetch(PDO::FETCH_ASSOC);
		return $output;
	}
	
	public function updateGateWay($formData){
//		var_dump($formData);
		$stmt=$this->dbHandler->prepare("update payment_gateways set method_name = :wmethod_name,settings=:wsettings where gateway_id=:wgateway_id");
		$stmt->bindParam(':wmethod_name', $formData['method_name'], PDO::PARAM_STR);
		$stmt->bindParam(':wsettings', json_encode($formData['settings']), PDO::PARAM_STR);
		$stmt->bindParam(':wgateway_id', $formData['gateway_id'], PDO::PARAM_STR);
		$stmt->execute();
		return true;
	}
	
	public function getPages(){
		$per_page = $this->getConfig('limit');
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $per_page;
		
		$stmt=$this->dbHandler->prepare("select * from pages limit $start_from, $per_page");
		$stmt->execute();
		$output = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $output;
	}
	
	public function countAllPages(){
		$stmt=$this->dbHandler->prepare("select count(*) as count from pages");
		$stmt->execute();
		$output = $stmt->fetch(PDO::FETCH_ASSOC);
		return $output['count'];
	}
	
	public function getPage($pageId){
		$stmt=$this->dbHandler->prepare("select * from pages where page_id=:wpage_id");
		$stmt->bindParam(':wpage_id', $pageId, PDO::PARAM_INT);
		$stmt->execute();
		$output = $stmt->fetch(PDO::FETCH_ASSOC);
		return $output;
	}
	
	public function deletePage($pageId){
		$stmt=$this->dbHandler->prepare("delete from pages where page_id=:wpage_id");
		$stmt->bindParam(':wpage_id', $pageId, PDO::PARAM_INT);
		$stmt->execute();
		return true;
	}
	
	public function savePage($formData){
		$stmt=$this->dbHandler->prepare("insert into pages (page_name, page_title,page_url, page_content) values(:wpage_name, :wpage_title, :wpage_url, :wpage_content)");
		
		$stmt->bindParam(':wpage_name', $formData['page_name'], PDO::PARAM_STR);
		$stmt->bindParam(':wpage_title', $formData['page_title'], PDO::PARAM_STR);
		$stmt->bindParam(':wpage_url', $formData['page_url'], PDO::PARAM_STR);
		$stmt->bindParam(':wpage_content', $formData['page_content'], PDO::PARAM_STR);
		$stmt->execute();
		return true;
	}
	
	public function updatePage($formData){
		$stmt=$this->dbHandler->prepare("update pages set page_name = :wpage_name, page_title=:wpage_title, page_url=:wpage_url, page_content=:wpage_content where page_id=:wpage_id");
		
		$stmt->bindParam(':wpage_name', $formData['page_name'], PDO::PARAM_STR);
		$stmt->bindParam(':wpage_title', $formData['page_title'], PDO::PARAM_STR);
		$stmt->bindParam(':wpage_url', $formData['page_url'], PDO::PARAM_STR);
		$stmt->bindParam(':wpage_content', $formData['page_content'], PDO::PARAM_STR);
		$stmt->bindParam(':wpage_id', $formData['page_id'], PDO::PARAM_INT);
		$stmt->execute();
		return true;
	}
	
	/**/
	
	public function getMenus(){
		$per_page = $this->getConfig('limit');
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $per_page;
		
		$stmt = $this->dbHandler->prepare("select * from menus limit $start_from, $per_page");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function addMenu($formData){
		$stmt=$this->dbHandler->prepare("insert into menus (menu_name, menu_slug, menu_links) values(:wmenu_name, :wmenu_slug, :wmenu_links)");
		
		$stmt->bindParam(':wmenu_name', $formData['menu_name'], PDO::PARAM_STR);
		$stmt->bindParam(':wmenu_slug', $formData['menu_slug'], PDO::PARAM_STR);
		$stmt->bindParam(':wmenu_links', json_encode($formData['menu_links']), PDO::PARAM_STR);
		$stmt->execute();
		return true;
	}
	
	public function getMenuItems($table){
		$query = "select";
		if($table == 'pages'){
			$query .= " page_name as title, page_url as link";
		} else if ($table == 'catagaries'){
			$query .= " Cname as title, CONCAT('".FRONTEND_URL."category/',Cid) as link";
		}
		$query .= " from $table";
		//echo $query;
		$stmt = $this->dbHandler->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function deleteMenu($menuId){
		$stmt= $this->dbHandler->prepare("delete from menus where menu_id=:wmenu_id");
		$stmt->bindParam(':wmenu_id',$menuId, PDO::PARAM_STR);
		$stmt->execute();
		return true;
	}
}
	
	

  
?>