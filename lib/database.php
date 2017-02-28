<?php
// TODO try/catch on fail Location Redirect to 'Site Down' message when debugging finished...

// connect to the database with user/pass return the db_object
function database_connect() {
    $dbh = new PDO('mysql:host=localhost;dbname=clanclam', 'root', ''); 
    return $dbh;
}

// Insert data into the database
// Assume array is key/value par, where key = colunm name
function insert_data($table_name, $data_array) {
    $conn = database_connect();
    $stmt = $conn->prepare("INSERT INTO"); 
    $stmt->execute(); 
    return $conn->lastInsertId();
}

// do a query on the database
function select_data($sql_string) {
    $conn = database_connect();
    $stmt = $conn->prepare($sql_string); 
    $stmt->execute(); 
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    return $result;
}

?>
