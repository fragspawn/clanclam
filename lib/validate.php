<?php
// if false, data did not validate, otherwise cleaned input is returned
function validate_input($input_data, $input_type) {
    $output_data = trim($input_data);
    $output_data = stripslashes($output_data);
    $output_data = htmlspecialchars($output_data);
    if($input_type == 'text') {
        // not sure what to do here;        
    }
    if($input_type == 'number') {
        if(!is_numeric($output_data)) {
            return false;
        }
    }
    return $output_data;
}
?>
