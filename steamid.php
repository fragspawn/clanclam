<?php
    // Main Controller Page - All requests go through here:

    include './lib/steamservice.php';

    // steam_ID frag_spawn  = 76561197974169039
    // steam_ID helza_belza = 76561198058035034
    
    $result = get_user_info_from_steam('76561197974169039');

    foreach($result['response']['players'][0] as $key=>$item) {
        echo $key . ' ' . $item . ',';
    }

    get_clan_info_from_steam($result['primaryclanid']);

?>
