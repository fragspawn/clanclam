<?php
    // Main Controller Page - All requests go through here:
    include './lib/database.php';
    include './lib/auth.php';
    include './lib/validate.php';
    include './lib/steamservice.php';
    include './vue/ui.php';

    check_session();
    // Dynamic Content Goes here  
    if(isset($_GET['pageid'])) {
        if($_GET['pageid'] == 'gamesPlayed') {
            if(isset($_POST['steamID'])) {
                show_games_played($_POST['steamID']); 
            } elseif(isset($_GET['steamID'])) {
                show_games_played($_GET['steamID']); 
            } else {
                throw_error_message('Steam ID Not entered');
            }
        }
        if($_GET['pageid'] == 'loginPage') {
            echo 'loginPage';            
        }
        if($_GET['pageid'] == 'logoutPage') {
            echo 'logoutPage';            
        }
    } elseif(true) {
        echo "ElseIF";
    } else {
        echo "catch all";
    }
?>
