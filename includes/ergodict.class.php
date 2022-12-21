<?php
require_once('config.inc.php');

class ErgoDict
{
    private $conn;

    function __construct($db)
    {
        // Create connection
        $this->conn = new mysqli($db['server'], $db['user'], $db['password'], $db['db']);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function __destruct()
    {
        $this->conn->close();
    }

    function GetAll()
    {
        $sql = "SELECT t.id, t.topic FROM ed_topics t";
        $result = $this->conn->query($sql);
        $fullResult = [];

        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) 
            {
                array_push($fullResult, ['data' => $row, 'labels' => $this->getLabelsForTopic($row['id'])]);
            }
        }
        
        return $fullResult;
    }

    private function getLabelsForTopic($topic)
    {
        $sql = "SELECT UPPER(e.label) AS label FROM ed_labels_topics x INNER JOIN ed_labels e ON x.label=e.id WHERE x.topic=".$topic;
        $result = $this->conn->query($sql);
        $fullResult = [];

        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) 
            {
                $fullResult[] = $row;
            }
        }
        
        return $fullResult;
    }
}

?>