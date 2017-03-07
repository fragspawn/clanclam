<?php
    // Main Controller Page - All requests go through here:
    include './lib/steamservice.php';

// steam_ID helza_belza = 76561198058035034
//    $steam_info = get_user_info_from_steam('76561198058035034');
// steam_ID frae_spawn  = 76561197974169039
    $steam_info = get_user_info_from_steam('76561197974169039');

/* PRINT 1st PLAYER DATA 
    foreach($steam_info['response']['players'][0] as $key=>$item) {
        echo $key . ' ' . $item . ',';
    }
    echo $steam_info['response']['players'][0]['primaryclanid'];
*/

// GET CLAN INFO IN XML
    if(isset($steam_info['response']['players'][0]['primaryclanid'])) {
        $clan_xml = get_clan_info_from_steam($steam_info['response']['players'][0]['primaryclanid']);
    } else {
        echo 'no clan';
        die();
    }

    //var_dump($clan_xml->members);
    foreach($clan_xml->members->steamID64 as $steamID) {
        $steam_clan_info = get_user_info_from_steam($steamID);
        if(isset($steam_clan_info['response']['players'][0]['primaryclanid'])) {
            echo $steam_clan_info['response']['players'][0]['primaryclanid'];
            echo '<br>';
        }
    } 

?>
