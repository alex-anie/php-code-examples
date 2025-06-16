<?php 

    require "db.class.php";

    // $sql = "INSERT INTO users(username, password, email) VALUES (?, ?, ?)";  // create data
    // $sql = "UPDATE users SET username = ? WHERE email = ?";  update data
    // $sql = "DELETE FROM users WHERE username = ?";  // delete data
    // $sql = "SELECT * FROM users WHERE username = ?"; // select one
    $sql = "SELECT * FROM users"; // 
    
    // $binding_values = ["George"];

    // Db::query($sql, $binding_values);
    $data = Db::select($sql);

    highlight_string("<?php ". var_export($data, true) . ";?>");



