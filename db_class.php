<?php 

    class DB
	{
        private $host = 'localhost';
        private $username = 'groupe10_groupeal';
        private $pass = 'Alpages@2017';
        private $database = 'groupe10_ga';
        private $db;
		
			public function __construct($host=null, $username=null, $pass=null, $database=null)
			{
				if($host != null)
				{
					$this->host = $host;
					$this->username = $username;
					$this->pass = $pass;
					$this->database = $database;
				}
				$this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8', ''.$this->username.'', ''.$this->pass.'');
				$this->db->exec('SET CHARACTER SET utf8'); 
			}
			public function query($sql, $data = array())
			{
            $req = $this->db->prepare($sql);
            $req->execute($data);
            return $req->fetchAll(PDO::FETCH_OBJ);
			mysql_query("SET NAMES 'utf8';");
			mysql_query("SET CHARACTER SET 'utf8';");
			}
		}
?>