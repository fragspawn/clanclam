<?php
// TODO try/catch on fail Location Redirect to 'Site Down' message when debugging finished...

// connect to the database with user/pass return the db_object
function database_connect() {
    $dbh = new PDO('mysql:host=localhost;dbname=clanclam', 'root', ''); 
    return $dbh;
}

// Insert data into the database
// Assume array is key/value par, where key = colunm name
function add_steam_info_to_database($data_array) {
    $conn = database_connect();
    // check to see if clan ID exists, if not insert
    $sql_select_user = "SELECT * FROM members WHERE mem_id = '" . $data_array['steamid'] . "';"; 
    $sql_select_clan = "SELECT * FROM clans WHERE clan_id = '" . $data_array['primaryclanid'] . "';"; 
    $insert_clan = "INSERT INTO clans (clan_id) VALUES ('" . $data_array['primaryclanid'] . "');"; 
    $insert_user = "INSERT INTO members (mem_id) VALUES ('" . $data_array['steamid'] . "');"; 
    // check to see if user ID exists, if not insert
    $stmt = $conn->prepare($sql); 
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
