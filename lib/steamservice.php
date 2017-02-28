<?php

function get_user_info_from_steam($steam_id) {
    $res = file_get_contents("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=36645A199F6F88593FED376EF94613C8&steamids=" . $steam_id);
    $res_array = json_decode($res, true);
    return $res_array;
}

function get_clan_info_from_steam($clan_id) {
    $res = file_get_contents("http://steamcommunity.com/gid/" . $clan_id . "/memberslistxml/?xml=1");
}
?>
