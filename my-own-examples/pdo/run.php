<?php

    require 'Database.php';
    $db = new Database();

    /*
    #insert into a database

    $sql = "INSERT INTO test1(name, age) VALUES(:name, :age)";
    $params = [
        ':name' => 'Victor',
        ':age' => '23'
    ];

    $db->query($sql, $params);

    */

    //===============================================================
    /* 

    #Update the database
    $result = $db->query("UPDATE test1 SET name = :name WHERE id = :id", [
        ':id' => '1',
        ':name' => 'Teddy'
    ]);

    #fetch the updated data

    $updated = $db->fetch("SELECT * FROM test1 WHERE id = :id", [
        ':id' => '1'
    ]);

    echo "The updated name is: " .   $updated['name'];

    */

    // ================================================================

    /*
    # Delete from a database
    $db->query("DELETE FROM test1 WHERE id = :id", [
        ':id' => '3'
    ]);

    */
    
    // ========================================================================
    /*
    #Fetch a single Database

    $persons = $db->fetch("SELECT * FROM test1 WHERE name = :name", [
        ':name' => 'Alex',
    ]);
    */

    // ==========================================================================
    /*
    #Fetch all data from the database
    $persons = $db->fetchAll("SELECT * FROM test1");

   foreach($persons as $person){
        echo "My name is : " . $person['name']. "and am :" . $person['age'] . "years old <br />";
   }

*/