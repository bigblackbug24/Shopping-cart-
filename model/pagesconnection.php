<?php
include 'model.php';
class pages extends Model
{
	 private $stmt;
	 private $dbHandler;
	public function __construct()
	 {
		 $this->dbHandler = parent ::__construct();
	 }
	  
	  public function contactus($val)
	  {
		  $stmt=$this->dbHandler->prepare("INSERT INTO contactus (name,email,phone_no,message) VALUES(:wname,:wemail,:wphone_no,:wmessage)");
		  //$stmt->bindparam(':wid',$val['id'],PDO::PARAM_INT);
		  $stmt->bindparam(':wname',$val['name'],PDO::PARAM_STR);
		  $stmt->bindparam(':wemail',$val['email'],PDO::PARAM_STR);
		  $stmt->bindparam(':wphone_no',$val['number'],PDO::PARAM_INT);
		  $stmt->bindparam(':wmessage',$val['message'],PDO::PARAM_STR);
	  $check=$stmt->execute();
	  if($check)
	  {
		  return true;
	  }
	  else
	  {
		  return false;
	  }
}
        public function detail($val)
		{
			$stmt=$this->dbHandler->prepare("select * FROM contactus WHERE ID =:wid");
			$stmt->bindparam(':wid',$val,PDO::PARAM_INT);
			$stmt->execute();
			$output=$stmt->fetchAll(PDO::FETCH_ASSOC);
			return $output;
			
		}
		
		
		
		public function listview()
		{
			$per_page = $this->getConfig('limit');
			if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
			$start_from = ($page-1) * $per_page;

			$stmt=$this->dbHandler->prepare("select * from contactus limit $start_from, $per_page");
			$stmt->execute();
			$output=$stmt->fetchAll(PDO::FETCH_ASSOC);
			return $output;
			
			
			
		}
		
		public function countAllPages(){
			$stmt=$this->dbHandler->prepare("select count(*) as count from contactus");
			$stmt->execute();
			$output=$stmt->fetch(PDO::FETCH_ASSOC);
			return $output['count'];
		}
}
?>