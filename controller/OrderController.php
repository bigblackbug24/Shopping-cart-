<?php   
include('./model/orderconnection.php');
class OrderController extends Controller
{
	private $order;
	function __construct()
	{
		$this->order= new order;
		
		
		}
		public function orderlist()
		{
			if(isset($_SESSION['email']) && !empty($_SESSION['email']))
			{
				$order=$this->order->fetchallorders($_POST);
				$pagination = $this->paginate($this->getUrl('order/orderlist'), $this->order->countAllOrders());
				//var_dump($order);
				//exit();
				$output=$this->output('order/orderlist',array('ORDER'=>$order, 'pageTitle'=>'Manage Orders',
				'findLink'=> $this->getUrl('order/findorder').'','FindText'=>'find order', 'pagination'=>$pagination));
				return $output;
			}
			else
			{
				header("location:" .$this->getUrl('user/login'));
			}	
		}
		
		public function orderview($Oval)
		{
			if(isset($_SESSION['email']) && !empty($_SESSION['email']))
			{
				$ORDER=$this->order->order_view($Oval);
				
				//var_dump($ORDER);
				//exit();
				$output=$this->output('order/orderview',array('array'=>$ORDER, 'pageTitle'=>'Order Detail'));
				return $output;
			}
			else
			{
				header("location:" .$this->getUrl('user/login'));
			}	
		}
				
				
		public function searchorder()
		{
			if(isset($_SESSION['email']) && !empty($_SESSION['email']))
			{
				//$Order=0;
				if(isset($_GET['search']))
				{
				   $Order =$this->order->findorder($_GET);
				   $queryS = isset($_GET['search']) ? '?search='.$_GET['search'] : '';
				   $pagination = $this->paginate($this->getUrl('order/searchorder'.$queryS), $this->order->countAllOrders($_GET));
				}
				$output=$this->output('order/searchorder',array('Corder'=>$Order, 'pageTitle'=>'find Order', 'pagination'=>$pagination	));
				//var_dump($output);
				  // exit();
				return $output;
			}
			else
			{
				header("location:" .$this->getUrl('user/login'));
			}	
		}
			
			
		public function findorder()
		{
			if(isset($_SESSION['email']) && !empty($_SESSION['email']))
			{
				$output=$this->output('order/findorder',array('pageTitle'=>'Search Order'));
				return $output;
				
			}
			else
			{
				header("location:" .$this->getUrl('user/login'));
			}	
		}
	
	}



?>