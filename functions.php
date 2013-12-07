<?php
ob_start();
class config{


	protected function con()
	{

		$b = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
		return $b;
	}
	public function paste($paste,$ip){

		if(!empty($paste)){
			
			$b = $this->con();
			$date=getdate();
			$dte = $date["year"]. "-" . $date["mday"].'-'.$date["mon"] ;	
			$ex = $b->prepare("INSERT INTO pastes(`date`,`paste`,`ip`) VALUES(?,?,?)");
			@$ex->execute(array($dte,$paste,$ip));
			$id = $b->lastInsertId();
			return $id;

		}


	}public function view($id){

		$b = $this->con();
		$ex = $b->prepare("SELECT `date`,`paste` FROM pastes WHERE `id` = ?");
		@$ex->execute(array($id));
		$rows = $ex->fetchAll(PDO::FETCH_ASSOC);
		#print_r($rows);
		$res = array('date' => $rows[0]['date'],'paste' => $rows[0]['paste']);
		return $res;
	}


}









?>
