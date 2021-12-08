<?php
class agents {
    
    public $conn;

    function __construct()
    {
        $this->conn = new mysqli("localhost","systemer_a2","T7rFtTMEyi","systemer_a2");
    }

    public function getAgents()
    {
        $sql = "SELECT * FROM agents";
        $result = $this->conn->query($sql);
        $data = [];
        $data = $result->fetch_all(MYSQLI_ASSOC);        
        return $data;
    }
    
    public function getAgentsChartX()
    {
        $sql = "SELECT name FROM agents WHERE status=1 order by amount_employees desc limit 3";
        $result = $this->conn->query($sql);
        $data = [];
        $data = $result->fetch_all(MYSQLI_ASSOC);  
        
        foreach ($data as $row) {
            $output[] = $row["name"];
        }
        
        return json_encode($output);
    }
    public function getAgentsChartY()
    {
        $sql = "SELECT amount_employees FROM agents WHERE status=1 order by amount_employees desc limit 3";
        $result = $this->conn->query($sql);
        $data = [];
        $data = $result->fetch_all(MYSQLI_ASSOC);  
        
        foreach ($data as $row) {
            $output[] = $row["amount_employees"];
        }
        
        return json_encode($output);
    }
    
}


      