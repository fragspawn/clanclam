<?php
    // Main Controller Page - All requests go through here:

    include './lib/database.php';
    include './lib/auth.php';
    include './vue/ui.php';

    check_session();
    print_header();
    print_menu();
    print_footer();

?>
