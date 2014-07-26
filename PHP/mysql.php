<?php

class mysql {

	private static $host = "10.46.20.84";
	private static $name = "tumo1204120010";
	private static $pass = "9q6s7zkkc88rnrrp";
	private static $database = "narek.galstyan1996";

/*
	private static $host = "localhost";
	private static $name = "root";
	private static $pass = "";
	private static $database = "robot";
*/
   public static function connect() {


       if (!mysql_connect(self::$host,self::$name,self::$pass)) {

    exit('unable to connect'.$this->host );
   
        };


    if (!mysql_select_db(self::$database)) {
             exit('unable to connect'.self::$database ." database");
             
             
  }
  return true;

     }


    public static function disconnect(){
    	mysql_close();
    	
    	
    }


};
?>