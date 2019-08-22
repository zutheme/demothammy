<?php

class receive {

	private $idreceive;

	private $datereceive;

	private $comment;

	private $error;

	private $sql;

	public function __construct(){

	}

	public function __destruct(){

	}

	public function set_idreceive($idreceive){

		$this->idreceive = $idreceive;

	}

	public function get_idreceive(){

		return $this->idreceive;

	}

	public function set_datereceive($datereceive){

		$this->datereceive = $datereceive;

	}

	public function get_datereceive(){

		return $this->datereceive;

	}

	public function receive_file($file,$iduser,$idpost){

		global $wpdb;

		$idfile = $file->get_id_file();

		$tb_receive = $wpdb->prefix . 'user_receive';   

        $sql = "insert into $tb_receive(idpost ,idfile, iduser, comment)";

        $sql .=" values('{$idpost}','{$idfile}','{$iduser}','{$this->comment}')";

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

	public function receive_list($iduser,$idpost){

		global $wpdb;

		$tb_receive = $wpdb->prefix . 'user_receive';   

        $sql = "SELECT f.url_file,f.namefile,f.typefile FROM";

        $sql .=" (SELECT tb.idfile FROM (SELECT idfile,iduser FROM"; 

        $sql .=" wp_user_receive WHERE idpost = '{$idpost}') AS tb  WHERE tb.iduser ='{$iduser}')"; 

        $sql .=" AS lf JOIN wp_file AS f ON lf.idfile = f.id_file";

        $results = $wpdb->get_results($sql,object);     

        $list = array();

		if($results){

			foreach ( $results as $item ) {

				$l_item = array();

				$l_item['url'] = $item->url_file;

				$l_item['name'] = $item->namefile;

				$l_item['type'] = $item->typefile;

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

	public function set_comment($comment){

		$this->comment = $comment;

	}

	public function get_comment(){

		return $this->comment;

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