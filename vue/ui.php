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
    if(is_numeric($_SESSION['user'])) {
        echo '<a class="navbar-brand">USER: ' . htmlentities($_SESSION['user_name']) . '</a>';
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
              <input type="number" name="steamID" id="steamID" width="17" pattern="[0-9]{17}" maxlength="17" size="17" min="10000000000000000" max="99999999999999999" placeholder="STEAMID" class="form-control" value="76561197974169039">
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
        add_steam_id_to_session($steamID, $res[0]['personaname']);
        add_steam_info_to_database($res[0]);
        echo '
        <div class="col-md-4">
            <h3><a href="#" onClick="showGames(\'' . $steamID .  '\')">' . htmlentities($res[0]['personaname']) . '</a></h3>';
            echo '<img src="' . $res[0]['avatar'] . '">';
            echo '<h4>Last Login:' . date('d/m/Y H:i:s', $res[0]['lastlogoff']) . '</h4>';
        echo '</div>';
        echo '<div class="col-md-4">';
        $clan_details = get_clan_info_from_steam($res[0]['primaryclanid']);
        echo '<h3><img src="' . $clan_details->groupDetails->avatarIcon . '">';
        echo $clan_details->groupDetails->groupName . '</h3>';
        if($clan_details == false) {
            throw_error_message('No Clan Info Found');
        } else {
            foreach($clan_details->members->steamID64 as $steamID) {
                $steamIDarray[] = $steamID;
            }

            $all_clan_users = get_users_info_from_steam($steamIDarray);

            foreach($all_clan_users as $clan_user) {
                echo '<img src="' . $clan_user['avatar'] . '">';
                echo '<h3><a href="#" onClick="showGames(\'' . $clan_user['steamid'] . '\')")>' . htmlentities($clan_user['personaname']) . '</a></h3>';
                    if(isset($clan_user['primaryclanid'])) {
                        if($clan_user['primaryclanid'] != $res[0]['primaryclanid']) {
                            echo '<a href="./index.php?pageid=steamIDSearch&steamID=' . $clan_user['steamid'] . '">ALT CLAN</a>';
                        }
                    } else {
                        echo '<a href="#">NO CLAN</a>';
                    }

                    echo '<h4>Last Login:' . date('d/m/Y H:i:s', $clan_user['lastlogoff']) . '</h4>';
            }

        }
        echo '</div>';
        echo '
        <div class="col-md-4" id="gamesplayed">
            <h3>Games Played</h3>
        </div>';
    }
}

function show_games_played($steamID) {
    $res = get_games_played($steamID);
    if($res) { 
        echo '<h2>Games Played</h2>';
        for($loop=0;$loop<$res['total_count'];$loop++) {
            echo '<div>';
            echo '<img src="http://media.steampowered.com/steamcommunity/public/images/apps/' . $res['games'][$loop]['img_logo_url'] . '.jpg">';
            echo $res['games'][$loop]['name'];
            $hours = floor($res['games'][$loop]['playtime_forever'] / 60);
            $minutes = $res['games'][$loop]['playtime_forever'] % 60;
            echo ' ' . $hours . 'h ' . $minutes . 'm '; 
            echo '</div>';
        }
    }
}

function throw_error_message($msg) {
    echo '<div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
             ' . $msg . ' 
              </div>';
}
