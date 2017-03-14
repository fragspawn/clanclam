function validateAnInput(inputValue) {
    if(inputValue == '' || inputValue.checkValidity() == false) {
        return false;
    } else {
        return true;
    }
}
