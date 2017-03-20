function validateAnInput(inputValue) {
    if(inputValue.value == '' || inputValue.checkValidity() == false) {
        return false;
    } else {
        return true;
    }
}

function showGames(steamID) { 
    var url = './games.php?pageid=gamesPlayed&steamID=' + steamID; 
    console.log(url);
    $('#gamesplayed').load(url);
}
