<?php
    class Products_Model extends Model{
        public function __construct()
        {
            parent::__construct();
        }

        public function showProducts(){
            $sth = $this->db->prepare("SELECT * FROM products");
            // $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute();
            $data = $sth->fetchAll();
            $count = $sth->rowCount();
            for ($i=0; $i <= $count-1; $i++) { 
                $numbering = $i + 1;
                echo $numbering.". ";
                echo $data[$i]["product_name"];
                echo "<br>";
            }
        }
    }