<?php
    require "includes/condb.php";
    if(isset($_POST['query'])){
        $inptText = $_POST['query'];
        $query = "SELECT CONCAT(first_name,' ',last_name) AS name FROM actor WHERE CONCAT(first_name,' ',last_name) LIKE'%$inptText%' LIMIT 5;";
        $result = $conn->query($query);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo " <a href = '#' class = 'list-group-item list-group-item-action boreder-1' >".ucwords(strtolower($row['name']))."</a>";
            }
        }else{
            echo " <a href = '#' class = 'list-group-item list-group-item-action boreder-1'>No record</a>";
        }

    }