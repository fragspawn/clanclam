function validateAnInput(inputValue) {
    if(inputValue.value == '' || inputValue.checkValidity() == false) {
        return false;
    } else {
        return true;
    }
}

function showGames(steamID) { 
    $('#gamesplayed').load('./games.php?pageid=gamesPlayed&steamID=' + steamID);
}
