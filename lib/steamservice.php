<?php

function get_user_info_from_steam($steam_id) {
    $res = file_get_contents("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=36645A199F6F88593FED376EF94613C8&steamids=" . $steam_id);
    $res_array = json_decode($res, true);
    if(empty($res_array['response']['players'])) {
        return false;
    } else {
        return $res_array['response']['players'];
    }
}

function get_users_info_from_steam($steam_ids) {
    $steam_comma_ids = '';
    foreach($steam_ids as $steam_id) {
        $steam_comma_ids .= $steam_id . ',';
    }
    $steam_comma_ids = substr($steam_comma_ids, 0, -1);

    $res = file_get_contents("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=36645A199F6F88593FED376EF94613C8&steamids=" . $steam_comma_ids);
    $res_array = json_decode($res, true);
    if(empty($res_array['response']['players'])) {
        return false;
    } else {
        return $res_array['response']['players'];
    }
}

function get_clan_info_from_steam($clan_id) {
    $res = simplexml_load_file("http://steamcommunity.com/gid/" . $clan_id . "/memberslistxml/?xml=1") or die("died");
    if(empty($res->groupDetails)) {
        return false;
    } else {
        return $res;
    }
}

function get_games_played($steam_id) {
    $res = file_get_contents("http://api.steampowered.com/IPlayerService/GetRecentlyPlayedGames/v0001/?key=36645A199F6F88593FED376EF94613C8&steamid=" .$steam_id . "&format=json");
    $res_array = json_decode($res, true);
    if(empty($res_array['response'])) {
        return false;
    } else {
        return $res_array['response'];
    }
}
?>
