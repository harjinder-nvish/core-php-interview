<?php

include_once "config.php";

$db = new config();

class Database extends config{
    
    // insert into DB

    function insert($tableName, $post) {
        global $db;
        $fields = Array();
        $values = Array();
        foreach($post as $key => $value){
            array_push($fields,$key);
            array_push($values, is_array($value) ? "'". implode(',', $value) ."'" : "'".$value."'" );
        }

        $sql = 'INSERT INTO ' . $tableName . ' (' . join(',',$fields) . ') VALUES (' . join(',',$values) . ')';  
        
       

        if(mysqli_query($db->conn, $sql) or die(mysqli_error($db->conn))){
            return true;
        }
        return false;
    }

    
    public function update($tableName,$data){  
        global $db;
        $sql = "UPDATE students SET name='".$data['name']."',standard='".$data['standard']."',subject='".implode(',', $data['subject'])."',updated_on=now() WHERE id='".$data['student_id']."'";


        if(mysqli_query($db->conn, $sql) or die(mysqli_error($db->conn))){
            return true;
        }
          
    }

    public function selectAll($tableName){
		global $db;
		$sql= "SELECT * FROM `students_subjects` ORDER BY subject ASC";

		$query=mysqli_query($db->conn, $sql);
		$rows = array();

		while(($row = mysqli_fetch_assoc($query))) {
			$rows[] = $row['subject'];
		}
		return $rows;
	}


    
    public function select($tableName, $limit=10){
        $sql    = "SELECT * FROM {$tableName} LIMIT {$limit}";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return false;
    }

    public function selectById($tableName, $id){
        global $db;
        $sql    = "SELECT * FROM {$tableName} WHERE id= {$id}";
        $result = mysqli_query($db->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            return mysqli_fetch_assoc($result);
        }
        return false;
    }


    public function selectByWhere($table, $where=''){
		global $db;
		
        $sql    = "SELECT id,name,standard,subject,created_on,updated_on FROM {$table} WHERE 1=1 ".$where." ORDER BY name ASC ";
		
		$query  = mysqli_query($db->conn, $sql) or die(mysqli_error($db->conn));
		$rows   = array();

		while(($row = mysqli_fetch_assoc($query))) {
			$row['created_on']=date("M j, Y, g:i a",strtotime($row['created_on']));   
			$row['updated_on']= ($row['updated_on'] !='')?date("M j, Y, g:i a",strtotime($row['updated_on'])):'NA';   
			$rows[] = $row;
		}
		return $rows;
	}

    
    // num rows in table
    public function getRowCount($table, $whereQuery){
        global $db;
        // echo $whereQuery;
        // die;

        $sql = "SELECT count(*) as allcount from {$table} WHERE WHERE 1 {$whereQuery}";
        

        if ($result = mysqli_query($db->conn, $sql)) {
            // Return the number of rows in result set
            $rowcount = mysqli_num_rows( $result );
            return $rowcount;
        }
        return false;
    }


}

?>
