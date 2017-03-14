<?php

// Generic UI functions

function print_menu() {
    echo '<nav class="navbar navbar-inverse navbar-fixed-top">';
    if($_SESSION['user'] == 'admin') {
        echo '<a class="navbar-brand">ADMIN: logout</a>';
        echo '<ul class="nav navbar-nav">';
        echo '<li><a href="./index.php?pageid=logoutPage">logout</a></li>';
        echo '</ul>';
    }
    if($_SESSION['user'] == 'memeber') {
        echo '<a class="navbar-brand">USER: logout</a>';
        echo '<ul class="nav navbar-nav">';
        echo '<li><a href="./index.php?pageid=logoutPage">logout</a></li>';
        echo '</ul>';
    }
    if($_SESSION['user'] == 'anon') {
        echo '<a class="navbar-brand">ANON:</a>';
        echo '<ul class="nav navbar-nav">';
        echo '<li><a href="./index.php?pageid=loginPage">login</a></li>';
        echo '</ul>';
    }
    echo '<form method="POST" action="./index.php?pageid=steamIDSearch" class="navbar-form navbar-right" novalidate onSubmit="return validateAnInput(steamID);">
            <div class="form-group">
              <input type="number" name="steamID" id="steamID" width="17" pattern="[0-9]{17}" maxlength="17" size="17" min="10000000000000000" max="99999999999999999" placeholder="STEAMID" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Search</button>
          </form>
';
    echo '</nav>';
}

function show_steam_user_info($steamID) {
    $res = get_user_info_from_steam($steamID);
    if($res == false) {
        throw_error_message('Steam ID Not Found');
    } else {
        echo '<div class="col-md-6">
        <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
                </div>';
    }
}

function throw_error_message($msg) {
    echo '<div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
             ' . $msg . ' 
              </div>';
}
