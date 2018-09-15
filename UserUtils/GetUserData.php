<?php



    //user


     function getValueFromUserDataType($from_userdatatype, $to_userdatatype, $data, $conn){
         if ($to_userdatatype == UserDataType::$EMAIL) {
             echo "User requests e-mail from " . $from_userdatatype;
         }

        $result = $conn->query("SELECT $to_userdatatype FROM Users WHERE '$from_userdatatype'='$data'");
        while ($row = $result->fetch_assoc()){
            return $row[$to_userdatatype];
        }
    }
