<?php
    // Main Controller Page - All requests go through here:
    include './lib/steamservice.php';

// steam_ID helza_belza = 76561198058035034
//    $steam_info = get_user_info_from_steam('76561198058035034');
// steam_ID frae_spawn  = 76561197974169039
$steam_info = get_user_info_from_steam('76561197974169039');
    if($steam_info == false) {
        echo 'dead';
        die();
    }

    if(empty($steam_info[0])) {
        echo 'empty';
        die();
    }

//PRINT 1st PLAYER DATA 
    foreach($steam_info[0] as $key => $value) {
        echo $key . ' ' . $value . ',';
    }

// GET CLAN INFO IN XML
    if(isset($steam_info[0]['primaryclanid'])) {
        $clan_xml = get_clan_info_from_steam($steam_info[0]['primaryclanid']);
        print_r($clan_xml);
        die();

        echo $steam_info[0]['personaname'];
        echo '<img src="' . $steam_info[0]['avatar'] . '"/>';
    } else {
        echo 'no clan';
        die();
    }

    //var_dump($clan_xml->members);
    foreach($clan_xml->members->steamID64 as $steamID) {
        $steam_clan_info = get_user_info_from_steam($steamID);
        if(isset($steam_clan_info[0]['primaryclanid'])) {
            echo $steam_clan_info[0]['personaname'] . ' ';
            if($steam_info[0]['primaryclanid'] != $steam_clan_info[0]['primaryclanid']) {
                echo '*';
            }
        }
    } 

?>
