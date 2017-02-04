<?php
include_once('model.php');
class Product extends Model
{
	private $conn;
	private $stmt;
	private $dbHandler;
	
	public function __construct(){
		$this->dbHandler = parent::__construct();//new PDO('mysql:host='.DBHOST.';dbname='.DATABASENAME, USER, PASS);	
	}
	
	public function add($mass)
	{

		$cat= '';
		//var_dump($mass);
	//	insert into mytable (email,password) values (123123,1231231);
		$stmt=$this->dbHandler->prepare("INSERT INTO product (category_id,Pname,Pprice,Pqty,Psize,Pcolor,Pdescription,Pspecification,Pdiscount,Ppublished,Pimage,Pavailable) VALUES(:wcategory_id,:wPname,:wPprice,:wPqty,:wPsize,:wPcolor,:wPdescription,:wPspecification,:wPdiscount,:wPpublished,:wPimage,:wPavailable)");//no need to add signle code when we are binding parameters.
    	//$stmt->bindParam(':wpid', $mass['id'], PDO::PARAM_STR);
		$stmt->bindParam(':wcategory_id', $cat, PDO::PARAM_INT);
		$stmt->bindParam(':wPname', $mass['name'], PDO::PARAM_STR);
		$stmt->bindparam(':wPprice',$mass['price'],PDO::PARAM_INT);
		$stmt->bindParam(':wPqty', $mass['qty'], PDO::PARAM_INT);
		$stmt->bindParam(':wPsize', $mass['size'], PDO::PARAM_STR);
		$stmt->bindParam(':wPcolor', $mass['color'], PDO::PARAM_STR);
		$stmt->bindParam(':wPdescription', $mass['description'], PDO::PARAM_STR);
		$stmt->bindparam(':wPspecification', $mass['specification'],PDO::PARAM_STR);
		$stmt->bindParam(':wPdiscount', $mass['discount'], PDO::PARAM_STR);
		$stmt->bindParam(':wPpublished', $mass['published'], PDO::PARAM_STR);
		$stmt->bindparam(':wPimage',$mass['file'],PDO::PARAM_STR);
		$stmt->bindparam(':wPavailable',$mass['availabe'],PDO::PARAM_STR);
		
	$check=$stmt->execute();
		//exit('there');
//print_r(		$stmt->errorInfo ());
		//var_dump($stmt->rowCount());
	
//exit;
		if($check)
		{
			return true;
		}
		else
		{
		return	false;
		}
	
	}
	
	public function update($formData)
	
	{
		$cat=1;
		//see update query syntax ist it is wrong.
		$stmt=$this->dbHandler->prepare("UPDATE product SET category_id=:wcategory_id, Pname=:wPname, Pprice=:wPprice, Pqty=:wPqty, Psize=:wPsize, Pcolor=:wPcolor, Pdescription=:wPdecription,Pspecification=:wPspecification,Pdiscount=:wPdiscount, Ppublished=:wPpublished,Pimage=:wPiamge,Pavailable=:wPavailable 
		WHERE Pid=:wPid");
		$stmt->bindParam(':wcategory_id', $cat, PDO::PARAM_INT);
		$stmt->bindparam(':wPname',$formData['name'],PDO::PARAM_STR);
		$stmt->bindparam(':wPprice',$formData['price'],PDO::PARAM_INT);
		$stmt->bindparam(':wPqty',$formData['qty'],PDO::PARAM_INT);
		$stmt->bindparam(':wPsize',$formData['size'],PDO::PARAM_STR);
		$stmt->bindparam(':wPcolor',$formData['color'],PDO::PARAM_STR);
		$stmt->bindparam(':wPdecription',$formData['description'],PDO::PARAM_STR);
		$stmt->bindparam(':wPspecification', $formdata['specification'],PDO::PARAM_STR);
		$stmt->bindparam(':wPdiscount',$formData['discount'],PDO::PARAM_STR);
        $stmt->bindparam(':wPpublished',$formData['published'],PDO::PARAM_STR); 
		$stmt->bindparam(':wPimage',$formdata['file'],PDO::PARAM_STR);
		$stmt->bindparam(':wPavailable',$formData['availabe'],PDO::PARAM_STR);
		$stmt->bindparam(':wPid',$formDatas,PDO::PARAM_INT);
		$check=$stmt->execute();
//print_r($stmt->errorInfo());
	//	exit;
		if($check)
		{
			return true;
		}
		else
			{
			return	false;
			}
	}
	
	public function getProduct($Pid){

		$stmt= $this->dbHandler->prepare("select * from product where Pid = :wPid");
		$stmt->bindParam(":wPid",$Pid, PDO::PARAM_INT);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	}
	
	public function delete($id)
	{
			//see deelete query syntax.
		$stmt=$this->dbHandler->prepare("DELETE FROM product WHERE Pid=:wPid");
		$stmt->bindParam(":wPid",$id, PDO::PARAM_INT);
		//$stmt->execute();	
		// $stmt->execute();
			
		if($stmt->execute())
		{
			return true;
		}
		else
		{
		return	false;
		}
	}
	
	public function fetchproduct()
	{
		$per_page = $this->getConfig('limit');
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $per_page;
		
		$stmt=$this->dbHandler->prepare("SELECT * FROM product limit $start_from, $per_page ");
		$stmt->execute();	
		$output=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $output;
			 

	} 
	
	public function countAllProducts($mass = ''){
		$chunk ='';
		if($mass!=''){
			$chunk = "where Pname LIKE'%".$mass['search']."%'";
		}
		$stmt=$this->dbHandler->prepare("select count(*) as count from product ".$chunk."");
		$stmt->execute();
		$output=$stmt->fetch(PDO::FETCH_ASSOC);
		return $output['count'];
	}

	public function search($mass)
	{
		$per_page = $this->getConfig('limit');
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $per_page;
		
		$stmt=$this->dbHandler->prepare("select * from product where Pname LIKE'%".$mass['search']."%' limit $start_from, $per_page");
		$stmt->execute();
		$output=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $output;
	}
}
  
?>