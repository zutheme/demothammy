<?php

class file {

	private $id_file;

	private $url_file;

	private $namefile;
	private $typefile;
	private $error;

	private $sql;

	public function __construct(){

	}

	public function __destruct(){

	}

	public function set_id_file($id_file){

		$this->id_file = $id_file;

	}

	public function get_id_file(){

		return $this->id_file;

	}

	public function set_url_file($url_file){

		$this->url_file = $url_file;

	}

	public function get_url_file(){

		return $this->url_file;

	}	

	public function set_namefile($namefile){

		$this->namefile = $namefile;

	}

	public function get_namefile(){

		return $this->namefile;

	}
	public function set_typefile($typefile){

		$this->typefile = $typefile;

	}

	public function get_typefile(){

		return $this->typefile;

	}
	public function uploadfile(){

		global $wpdb;

		$tb_file = $wpdb->prefix . 'file';   

        $sql = "insert into $tb_file(url_file ,namefile,typefile)";

        $sql .=" values('{$this->url_file}','{$this->namefile}','{$this->typefile}')";

        $wpdb->query($sql);

        $this->id_file = $wpdb->insert_id;

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