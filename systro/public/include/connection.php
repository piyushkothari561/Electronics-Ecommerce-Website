<?php
            $servername='v.je';
            $username='v.je';
            $password='v.je';
            $database ='systro';
            try {
                
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }
            catch(PDOException $e)
            {
                header("Location: ../error.php?database=notconnected");
            }
?>
