<?php
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $dbname = "connectie";
    $dbport = 3306;
    
    try {
        $con = new PDO('mysql:host='.$servername.';port='.$dbport.';dbname='.$dbname, $username, $password);  
        $con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $con->exec("SET CHARACTER SET utf8");
        
        $sql = "INSERT INTO connectie (naam, email)
        VALUES ('".$_POST["naam"]."','".$_POST["email"]."')";
        if ($con->query($sql)) {
        echo "<script type= 'text/javascript'>alert('Successfully');</script>";
        }
        else{
        echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
}
    }   
    catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
}
