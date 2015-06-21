<?php
    $string = "http://www.google.com/asd/?p=asd'";
    
    // Remove all illegal characters from a url
    $string = filter_var($string, FILTER_SANITIZE_URL);
    
    // Validate url
    if(filter_var($string, FILTER_VALIDATE_URL)){
        echo("$string is a valid URL");
    }
    else{
        echo("$string is not a valid URL");
    }
?>