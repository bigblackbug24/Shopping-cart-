<?php
include ('model.php');
class Categaries extends Model
{
	private $stmt;
	private $dbhandler;	
	function __construct()
	{
		$this->dbhandler= parent ::__construct();
		
		}
		public function add($Cvar)
		{
			
			$stmt=$this->dbhandler->prepare("INSERT INTO catagaries(Cname,Cdiscription) VALUES(:wCname,:wCdiscription)");
			$stmt->bindparam(':wCname',$Cvar['name'],PDO::PARAM_STR);
			$stmt->bindparam(':wCdiscription',$Cvar['description'],PDO::PARAM_STR);
			$var = $stmt->execute();
			//print_r($stmt->errorInfo() );
			//exit;
			if($var)
			{
				return true;
				
			}
			else
			{
			   return false;
		  	}
			
			}
	public function update($Cvar)
	{
	    $stmt=$this->dbhandler->prepare("UPDATE catagaries SET Cname=:wCname,Cdiscription=:wCdiscription WHERE Cid=:wCid");
	    $stmt->bindparam(':wCname',$Cvar['name'],PDO::PARAM_STR);
	    $stmt->bindparam(':wCdiscription',$Cvar['description'],PDO::PARAM_STR);
        $stmt->bindparam(':wCid',$Cvar['id'],PDO::PARAM_INT);
		$var = $stmt->execute();
		
		if($var)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	//delete spell are wrong 
	public function delete($var)
	{
		$stmt=$this->dbhandler->prepare("DELETE FROM catagaries WHERE Cid=:wCid");
		$stmt->bindparam(':wCid',$var,PDO::PARAM_INT);
		$check=$stmt->execute();
		if($check)
		{
		return  true;
		}
		else
			{
				return false;
			}
	}
	public function fetch()
	{
		$per_page = $this->getConfig('limit');
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $per_page;
		
		$stmt=$this->dbhandler->prepare("select * FROM catagaries limit $start_from,$per_page");
		$stmt->execute();
		$output=$stmt->fetchall(PDO::FETCH_ASSOC);
		return $output;
		
	}
	
	public function countCategories(){
		$stmt=$this->dbhandler->prepare("select count(*) as count FROM catagaries");
		$stmt->execute();
		$output=$stmt->fetch(PDO::FETCH_ASSOC);
		return $output['count'];
	}
	
	public function get($Cid)
	{
		$stmt=$this->dbhandler->prepare("select * from catagaries WHERE Cid=:wCid");
		$stmt->bindParam(":wCid",$Cid, PDO::PARAM_INT);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
		
		
		}
	}

?>