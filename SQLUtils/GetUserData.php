<?php



    //user


     function getValueFromUserDataType($userdatatype, $val_userdatatype, $get_userdatatype, $conn){
        $result = $conn->query("SELECT * FROM Users");
        while ($row = $result->fetch_assoc()){
            if ($row[$userdatatype] == $val_userdatatype){
                return $row[$get_userdatatype];
            }
        }
    }
