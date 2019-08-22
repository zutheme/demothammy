<?php
class customer{
	private $id_customer;
	private $firstname;
	private $lastname;
	private $email;
	private $num_phone;
	private $address;
	private $time_reg;
	private $error;
	private $sql;
	public function __construct(){
	}
	public function __destruct(){
	}
	
	public function Id_customer($idcustomer){
		$this->id_customer = $idcustomer;
	}
	public function _Id_customer(){
		return $this->id_customer;
	}
	public function Firstname($firstname){
		$this->firstname = $firstname;
	}
	public function _Firstname(){
		return $this->firstname;
	}
	public function Lastname($lastname){
		$this->lastname = $lastname;
	}
	public function _Lastname(){
		return $this->lastname;
	}
	public function Email($email){
		$this->email = $email;
	}
	public function _Email(){
		return $this->email;
	}
	public function Num_phone($num_phone){
		$this->num_phone = $num_phone;
	}
	public function _Num_phone(){
		return $this->num_phone;
	}
	public function Address($address){
		$this->address = $address;
	}
	public function _Address(){
		return $this->address;
	}
	public function Time_reg($time_reg){
		$this->time_reg = $$time_reg;
	}
	public function _Time_reg(){
		return $this->time_reg;
	}
	public function Error($error){
		$this->error = $error;
	}
	public function _Error(){
		return $this->error;
	}
	public function _sql(){
		return $this->sql;
	}
	public function exist_customer_by_email(){
		global $wpdb;
		$tb_customer = $wpdb->prefix . 'customer';
		$sql = "SELECT id FROM $tb_customer WHERE email='$this->email' LIMIT 1";	
		$results = array();
		$results = $wpdb->get_results($sql,object);
		foreach ( $results as $item ) {
			$this->id_customer = $item->id;
		}
        //show error
        if($wpdb->last_error !== ''){
	        $str   = htmlspecialchars( $wpdb->last_result, ENT_QUOTES );
	        $query = htmlspecialchars( $wpdb->last_query, ENT_QUOTES );
	        $error ="WordPress database error:[$str]<code>$query</code>";        
    	}
    	$this->error = $error;
    	$wpdb->flush();
	}
	public function exist_customer_by_phone(){
		global $wpdb;
		$tb_customer = $wpdb->prefix . 'customer';
		$sql = "SELECT id FROM $tb_customer WHERE num_phone='{$this->num_phone}' LIMIT 1";	
		$results = array();
		$results = $wpdb->get_results($sql,object);
		foreach ( $results as $item ) {
			$this->id_customer = $item->id;
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
	//query = "CALL 'sp_job_list'('{$id}', '{$job_title}', '{$qualify}');";
	public function exist_idcustomer_email_or_phone(){
		$this->exist_customer_by_phone();
		if(empty($this->id_customer)){
			$this->exist_customer_by_email();
		}
	}
	public function add_customer(){
		global $wpdb;
		$tb_customer = $wpdb->prefix . 'customer';
	           $wpdb->insert( 
	               $tb_customer, 
	               array( 
	               	 'firstname' => $this->firstname,
	               	 'lastname' => $this->lastname,
	                 'email' => $this->email,
	                 'num_phone' => $this->num_phone,
	                 'address' => $this->address
	                 ) 
	             );
	            $this->id_customer = $wpdb->insert_id;	
        //show error
        if($wpdb->last_error !== ''){
	        $str   = htmlspecialchars( $wpdb->last_result, ENT_QUOTES );
	        $query = htmlspecialchars( $wpdb->last_query, ENT_QUOTES );
	        $error ="WordPress database error:[$str]<code>$query</code>";        
    	}
    	$this->error = $error;
    	$wpdb->flush();
	}
	public function update(){
		global $wpdb;
		$tb_customer = $wpdb->prefix . 'customer';   
        $sql = "UPDATE $tb_customer ";
        $sql .= "SET firstname='{$this->firstname}',lastname='{$this->lastname}',";
        $sql .= "email='{$this->email}',address='{$this->address}'";
        $sql .=" WHERE id='{$this->id_customer}'";
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
	public function delete(){
		global $wpdb;
		$tb_customer = $wpdb->prefix . 'customer';   
        $sql = "DELETE FROM $tb_customer WHERE id='{$this->id_customer}'";
        $wpdb->query($sql);
        //show error
        if($wpdb->last_error !== ''){
	        $str   = htmlspecialchars( $wpdb->last_result, ENT_QUOTES );
	        $query = htmlspecialchars( $wpdb->last_query, ENT_QUOTES );
	        $error ="WordPress database error:[$str]<code>$query</code>";        
    	}
    	$this->test=$sql;
    	$this->error = $error;
    	$wpdb->flush();
	}
	
	
	public function sendmessage($message){
		global $wpdb;
		$tb_consultant = $wpdb->prefix . 'customer_consultant';
           $wpdb->insert( 
               $tb_consultant, 
               array( 
               	 'idcustomer' => $this->id_customer,
               	 'message' => $message
                 ) 
             );
	       $this->test = $this->num_phone;    
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