<?php

function check_session() {
    session_start();
    if(!isset($_SESSION['user'])) {
        $_SESSION['user'] = 'anon';
    }
}

function add_steam_id_to_session($steamID, $steamRealName) {
    $_SESSION['user'] = $steamID;
    $_SESSION['user_name'] = $steamRealName;
}
?>
