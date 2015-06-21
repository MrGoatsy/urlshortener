<?php
    //Check if the url is safe.
    function urlCheck($string){
        $safeString = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
        
        return $safeString;
    }
    
    //Generate a random string    
    function randString($length = 10) {
        $i = 0;
        $string = "";
        
        while($i <= $length){
            $rand = ((mt_rand(0,9) & 1)? range('A', 'Z') : range('a', 'z'));
            
            $string .= $rand[mt_rand(0, 25)];
            $i++;
        }
        return $string;
    }
?>