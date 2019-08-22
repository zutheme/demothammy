<?php
class send {
	private $idsend;
	private $datesend;
	private $comment;
	private $error;
	private $sql;
	public function __construct(){
	}
	public function __destruct(){
	}
	public function set_idsend($idsend){
		$this->idsend = $idsend;
	}
	public function get_idsend(){
		return $this->idsend;
	}
	public function set_datesend($datesend){
		$this->datesend = $datesend;
	}
	public function get_datesend(){
		return $this->datesend;
	}
	public function set_comment($comment){
		$this->comment = $comment;
	}
	public function get_comment(){
		return $this->comment;
	}
	public function sendto($file,$iduser,$idpost,$toiduser){
		global $wpdb;
		$idfile = $file->get_id_file();
		$tb_send = $wpdb->prefix . 'user_send';   
        $sql = "insert into $tb_send(iduser,toiduser,idfile,idpost, comment)";
        $sql .=" values('{$iduser}','{$toiduser}','{$idfile}','{$idpost}','{$this->comment}')";
        $wpdb->query($sql);
        //show error
        $this->sql = $sql;
        $error='';
        if($wpdb->last_error !== ''){
	        $str   = $wpdb->last_result;
	        $query =$wpdb->last_query;
	        $error ="WordPress database error:[$str]<code>$query</code>";        
    	}
    	$this->error = $error; 
    	$wpdb->flush();
	}
	public function list_send($idpost){
		global $wpdb;
		$tb_send = $wpdb->prefix . 'user_send';   
	    $sql = "SELECT p.url_avatar,p.first_name,sender.comment,sender.datesend,f.namefile,f.url_file,pro.first_name as toname,pro.url_avatar as toavatar FROM (SELECT * FROM wp_user_send  WHERE idpost = '{$idpost}') AS sender LEFT JOIN wp_user_profile AS upro ON sender.iduser = upro.id_user 
			LEFT JOIN wp_profile AS p ON upro.id_profile = p.id_profile LEFT JOIN wp_file AS f ON f.id_file = sender.idfile LEFT JOIN wp_user_profile AS up ON sender.toiduser = up.id_user LEFT JOIN wp_profile AS pro ON up.id_profile = pro.id_profile";
		/*CALL findidfile(5);*/
        $results = $wpdb->get_results($sql,object);     
        $list = array();
		if($results){
			foreach ( $results as $item ) {
				$l_item = array();
				$l_item['url_avatar'] = $item->url_avatar;
				$l_item['first_name'] = $item->first_name;
				$l_item['comment'] = $item->comment;
				$l_item['datesend'] = $item->datesend;
				$l_item['namefile'] = $item->namefile;
				$l_item['url_file'] = $item->url_file;
				$l_item['toname'] = $item->toname;
				$l_item['toavatar'] = $item->toavatar;
				$list[] = $l_item;
			}
			return $list;
		}		
        $this->sql = $sql;
        $error='';
        if($wpdb->last_error !== ''){
	        $str   = $wpdb->last_result;
	        $query = $wpdb->last_query;
	        $error ="WordPress database error:[$str]<code>$query</code>";        
    	}
    	$this->error = $error; 
	}
	public function set_error($error){
		$this->error = $error;
	}
	public function get_error(){
		return $this->error;
	}
	public function set_sql($sql){
		$this->sql = $sql;
	}
	public function get_sql(){
		return $this->sql;
	}
	
}