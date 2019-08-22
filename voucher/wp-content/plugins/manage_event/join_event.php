<?php
class join_event{
	private $id_join;
	private $date_join;
	private $number_lotto;
	private $gift;
	private $error;
	private $sql;
	public function __construct(){
	}
	public function __destruct(){
	}
	
	public function id_join($idjoin){
		$this->id_join = $idjoin;
	}
	public function _id_join(){
		return $this->id_join;
	}
	public function date_join($date_join){
		$this->date_join = $date_join;
	}
	public function _date_join(){
		return $this->date_join;
	}
	public function number_lotto($number_lotto){
		$this->number_lotto = $number_lotto;
	}
	public function _number_lotto(){
		return $this->number_lotto;
	}
	public function gift($gift){
		$this->gift = $gift;
	}
	public function _gift(){
		return $this->gift;
	}
	public function _Error(){
		return $this->error;
	}
	public function _sql(){
		return $this->sql;
	}
	
	public function exist_joined_event($customer,$event){
		global $wpdb;
		$idcustomer = $customer->_Id_customer(); 
		$id_event = $event->_Id_event();
		$tb_join_event = $wpdb->prefix . 'join_event';
		$sql = "SELECT cus_join.id_customer ";
		$sql .= "from(SELECT id_customer FROM wp_join_event WHERE id_event='{$id_event}') as cus_join ";
		$sql .= "where cus_join.id_customer='{$idcustomer}'";
		$results = array();
		$results = $wpdb->get_results($sql,object);
		if(!empty($results)){
			foreach ( $results as $item ) {
				if(!empty($item->id_customer)){
					return true;
				}
			}
		}          
        //show error
        if($wpdb->last_error !== ''){
	        $str   = htmlspecialchars( $wpdb->last_result, ENT_QUOTES );
	        $query = htmlspecialchars( $wpdb->last_query, ENT_QUOTES );
	        $error ="WordPress database error:[$str]<code>$query</code>";        
    	}
    	$this->sql = $sql;
    	$this->error = $error;
    	$wpdb->flush();
    	return false;
	}
	public function join_event($customer,$event,$service){
		global $wpdb;
		$idservice = $service->idservice;
		$idcustomer = $customer->_Id_customer(); 
		$id_event = $event->_Id_event();
		$tb_join_event = $wpdb->prefix . 'join_event';
           $wpdb->insert( 
               $tb_join_event, 
               array( 
               	 'id_customer' => $idcustomer,
               	 'id_event' => $id_event,
               	 'idservice' => $idservice,
               	 'number_lotto' =>$this->number_lotto,
               	 'gift' =>$this->gift
                 ) 
             );
	       $this->test = $wpdb->insert_id;    
        //show error
        if($wpdb->last_error !== ''){
	        $str   = htmlspecialchars( $wpdb->last_result, ENT_QUOTES );
	        $query = htmlspecialchars( $wpdb->last_query, ENT_QUOTES );
	        $error ="WordPress database error:[$str]<code>$query</code>";        
    	}
    	$this->error = $error;
    	$wpdb->flush();
	}
	
}