<?php

// Generic UI functions

// if false, data did not validate, otherwise cleaned input is returned
function validate_input($input_data, $input_type) {
    $output_data = trim($input_data);
    $output_data = stripslashes($output_data);
    $output_data = htmlspecialchars($output_data);
    if($input_type == 'text') {
        // not sure what to do here;        
    }
    if($input_type == 'number') {
        if(!is_numeric($output_data)) {
            return false;
        }        
    }
    return $output_data;
} 

function print_header() {
?>
<html>
<head>
</head>
<body>
<?php
} 

function print_menu() {
    if($_SESSION['user'] == 'admin') {
        echo 'ADMIN: logout';
    }
    if($_SESSION['user'] == 'memeber') {
        echo 'MEMBER: logout';
    }
    if($_SESSION['user'] == 'anon') {
        echo 'ANON: login';
    }
}

function print_footer() {
    echo '<br>SESSION: ';
    print_r($_SESSION);
    echo '<br>GET: ';
    print_r($_GET);
    echo '<br>POST: ';
    print_r($_POST);
?>
</html>
<?php
} 

function steam_id_form() {
?>
<form>
    <input type="text" name="steamID" id="steamID" onChange="submitSteamID()">
</form>
<?php
}
?>
