<?php
class event{
	private $id_event;
	private $name_event;
	private $time_start;
	private $time_finish;
	private $error;
	public function __construct(){
	}
	public function __destruct(){
		//echo 'the"',__class__,'"destruct';
	}
	public function Id_event($id_event){
		$this->id_event = $id_event;
	}
	public function _Id_event(){
		return $this->id_event;
	}
	public function Name_event($name_event){
		$this->name_event = $name_event;
	}
	public function _Name_event(){
		return $this->name_event;
	}
	public function Time_start($time_start){
		$this->time_start = $time_start;
	}
	public function _Time_start(){
		return $this->time_start;
	}
	public function Time_finish($time_finish){
		$this->time_finish = $time_finish;
	}
	public function _Times_finish(){
		return $this->time_finish;
	}
	public function _Error(){
		return $this->error;
	}
	public function _Valid(){
		return $this->valid;
	}
	public function add_event(){
		global $wpdb;
		$tb_event = $wpdb->prefix . 'event';
	           $wpdb->insert( 
	               $tb_event, 
	               array( 
	               	 'name_event' => $this->name_event,
	               	 'time_start' => $this->time_start,
	                 'time_finish' => $this->time_finish                
	                 ) 
	             );
	            $this->id_event = $wpdb->insert_id;	
        //show error
        if($wpdb->last_error !== ''){
	        //$str   = htmlspecialchars( $wpdb->last_result, ENT_QUOTES );
	        $query = htmlspecialchars( $wpdb->last_query, ENT_QUOTES );
	        $error ="WordPress database error:[$str]<code>$query</code>";        
    	}
    	$this->error = $error;
    	$wpdb->flush();
	}
	public function remove_event(){
		global $wpdb;
		$tb_event = $wpdb->prefix . 'event';
	    $sql = "delete from {$tb_event} where id='{$this->id_event}'";
		$wpdb->query($sql);
        //show error
        if($wpdb->last_error !== ''){
	        $str   = htmlspecialchars( $wpdb->last_result, ENT_QUOTES );
	        $query = htmlspecialchars( $wpdb->last_query, ENT_QUOTES );
	        $error ="WordPress database error:[$str]<code>$query</code>";        
    	}
    	$this->error = $error;
    	$wpdb->flush();
	}
	public function curent_id_event(){
	    global $wpdb;
	       $tb_event = $wpdb->prefix . 'event';
	       $sql="SELECT * FROM $tb_event where time_start < NOW() and time_finish > NOW() LIMIT 1";
			$results = $wpdb->get_results($sql,object);
			foreach ( $results as $item ) {
				$this->id_event = $item->id;
				$this->time_start = $item->time_start;
				$this->time_finish = $item->time_finish;
			}
	        //show error
	        if($wpdb->last_error !== ''){
		        $str   = htmlspecialchars( $wpdb->last_result, ENT_QUOTES );
		        $query = htmlspecialchars( $wpdb->last_query, ENT_QUOTES );
		        $error ="WordPress database error:[$str]<code>$query</code>";        
	    	}
	    	$this->error = $error;
	    	//$this->test = $this->id_customer;
	    	$wpdb->flush();
	  }
	  public function valid_id_event(){
	    global $wpdb;
	       $tb_event = $wpdb->prefix . 'event';
	       $sql= "select ev.id from (SELECT id 
	        	  FROM $tb_event where time_start < NOW() and time_finish > NOW()) as ev
	        	  where ev.id='{$this->id_event}'";
	       	$results = array();
			$results = $wpdb->get_results($sql,object);
			foreach ( $results as $item ) {
				if(!empty($item->id)){
					return true;
				}
			}
	        //show error
	        if($wpdb->last_error !== ''){
		        $str   = htmlspecialchars( $wpdb->last_result, ENT_QUOTES );
		        $query = htmlspecialchars( $wpdb->last_query, ENT_QUOTES );
		        $error ="WordPress database error:[$str]<code>$query</code>";        
	    	}
	    	$this->error = $error;
	    	//$this->test = $this->id_customer;
	    	$wpdb->flush();
	    	return false;
		  }
}