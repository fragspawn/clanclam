function validateAnInput(inputValue) {
    if(inputValue.value == '' || inputValue.checkValidity() == false) {
        return false;
    } else {
        return true;
    }
}
