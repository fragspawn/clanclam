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

function get_user_info_from_steam() {
    $res = file_get_contents("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=36645A199F6F88593FED376EF94613C8&steamids=76561198058035034");
    echo var_dump(json_decode($res));
}
?>
