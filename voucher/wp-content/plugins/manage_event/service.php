<?php
class service{
	private $idsevice;
	private $name;
	private $description;
	private $error;
	private $sql;
	public function __construct(){
	}
	public function __destruct(){
	}
	
	public function idservice($idservice){
		$this->idservice = $idservice;
	}
	public function _idservice(){
		return $this->idservice;
	}
	public function name($name){
		$this->name = $name;
	}
	public function _name(){
		return $this->name;
	}
	public function description($description){
		$this->description = $description;
	}
	public function _description(){
		return $this->description;
	}
	// public function getnamebyid(){
	// 	global $wpdb;
	// 	$tb_join_event = $wpdb->prefix . 'join_event';
 //        $sql = "SELECT id_join from". 
 //        		"(SELECT idcutomer FROM $tb_join_event". 
 //        		 " WHERE id_event='{$id_event}') as cus_join".
	// 			 " where cus_join.idcustomer='{$idcustomer}'";	
	// 	$results = array();
	// 	$results = $wpdb->get_results($sql,object);
	// 	if(!empty($results)){
	// 		foreach ( $results as $item ) {
	// 			if(!empty($item->id_join)){
	// 				return true;
	// 			}
	// 		}
	// 	}          
 //        //show error
 //        if($wpdb->last_error !== ''){
	//         $str   = htmlspecialchars( $wpdb->last_result, ENT_QUOTES );
	//         $query = htmlspecialchars( $wpdb->last_query, ENT_QUOTES );
	//         $error ="WordPress database error:[$str]<code>$query</code>";        
 //    	}
 //    	$this->sql = $sql;
 //    	$this->error = $error;
 //    	$wpdb->flush();
 //    	return false;
	// }
	public function _Error(){
		return $this->error;
	}
	public function _sql(){
		return $this->sql;
	}
	
	
}