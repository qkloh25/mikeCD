<?php
    require "includes/condb.php";
    if(isset($_POST['query'])){
        $inptText = $_POST['query'];
        $query = "SELECT CONCAT(customer.first_name,' ', customer.last_name) AS name, address.phone FROM customer INNER JOIN address ON address.address_id = customer.address_id WHERE CONCAT(first_name,' ',last_name) LIKE'%$inptText%' OR address.phone LIKE '%$inptText%' OR customer.email LIKE '%$inptText%'";
        $result = $conn->query($query);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo " <a href = '#' class = 'list-group-item list-group-item-action boreder-1' >".ucwords(strtolower($row['name']))."</a>";
            }
        }else{
            echo " <a href = '#' class = 'list-group-item list-group-item-action boreder-1'>No record</a>";
        }

    }