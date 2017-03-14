<?php
    // Main Controller Page - All requests go through here:
    include './lib/database.php';
    include './lib/auth.php';
    include './lib/validate.php';
    include './lib/steamservice.php';
    include './vue/ui.php';

    check_session();
    include './vue/header.php';
    print_menu();

    // headline
    echo '<div class="jumbotron">';
    echo '<h3>' . $_GET['pageid'] . '</h3>';
    echo '</div>';

    // body
    echo '  <div class="container">';
    echo '  <div class="row">';
    // Dynamic Content Goes here  
    if(isset($_GET['pageid'])) {
        if($_GET['pageid'] == 'steamIDSearch') {
            if(isset($_POST['steamID'])) {
                show_steam_user_info($_POST['steamID']); 
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

    // End Dynamic Content 
    echo '</div>';
    echo '</div>';
  
    include './vue/footer.php';
?>
