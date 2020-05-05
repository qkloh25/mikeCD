<?php
    require "includes/condb.php";
    if(isset($_POST['query'])){
        $inptText = $_POST['query'];
        $query = "SELECT title FROM film WHERE title LIKE'%$inptText%'";
        $result = $conn->query($query);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo " <a href = '#' class = 'list-group-item list-group-item-action boreder-1' >".ucwords(strtolower($row['title']))."</a>";
            }
        }else{
            echo " <a href = '#' class = 'list-group-item list-group-item-action boreder-1'>No record</a>";
        }

    }