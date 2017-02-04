<?php 
class Controller {
	protected $model;
	public function __construct(){
		$this->model=new Model;
	}
	
	public function outPut($template,$variables=array()){
		$variables['template'] = $template;
		return $variables;
	}
	
	public function getUrl($pathInfo){
		return SITE_URL.$pathInfo;
	}
	
	protected function paginate($url, $numOfRecords) {

		$this->model=new Model;
		$reload=strstr($url, "?") ? $url.'&amp;' : '?';
		
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		//$perPageRecord = $this->model->getConfig('limit');
		$tpages = $numOfRecords/$this->model->getConfig('limit');
		$tpages = (int)$tpages;
        $adjacents = 2;
        $prevlabel = "&lsaquo; Prev";
        $nextlabel = "Next &rsaquo;";
        $out = "<ul class='pagination'>";
        // previous
        if ($page == 1) {
            $out.= "<span>".$prevlabel."</span>\n";
        } elseif ($page == 2) {
            $out.="<li><a href=\"".$reload."\">".$prevlabel."</a>\n</li>";
        } else {
            $out.="<li><a href=\"".$reload."page=".($page - 1)."\">".$prevlabel."</a>\n</li>";
        }
        $pmin=($page>$adjacents)?($page - $adjacents):1;
        $pmax=($page<($tpages - $adjacents))?($page + $adjacents):$tpages;
        for ($i = $pmin; $i <= $pmax; $i++) {
            if ($i == $page) {
                $out.= "<li class=\"active\"><a href=''>".$i."</a></li>\n";
            } elseif ($i == 1) {
                $out.= "<li><a href=\"".$reload."\">".$i."</a>\n</li>";
            } else {
                $out.= "<li><a href=\"".$reload. "page=".$i."\">".$i. "</a>\n</li>";
            }
        }
        
        if ($page<($tpages - $adjacents)) {
            $out.= "<a style='font-size:11px' href=\"" . $reload."page=".$tpages."\">" .$tpages."</a>\n";
        }
        // next
        if ($page < $tpages) {
            $out.= "<li><a href=\"".$reload."page=".($page + 1)."\">".$nextlabel."</a>\n</li>";
        } else {
            $out.= "<span style='font-size:11px'>".$nextlabel."</span>\n";
        }
        $out.= "</ul>";
        return $out;
    }
	
}
?>