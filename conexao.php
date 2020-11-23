<?php
function createCon(){
        $servername = "localhost";
        $username = "root";
        $password = "242526";
        $dbname = "av1_3daw";

        // Create connection
        try {
            $conn = new mysqli($servername, $username, $password, $dbname);
        }catch(PDOException $erro){
            echo "Erro na conexão:" . $erro->getMessage();
        }

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
    function closeCon($conn){
        $conn->close();

    }

?>