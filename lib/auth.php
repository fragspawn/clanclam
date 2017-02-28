<?php

function check_session() {
    session_start();
    if(!isset($_SESSION['user'])) {
        $_SESSION['user'] = 'anon';
    }
}

?>
