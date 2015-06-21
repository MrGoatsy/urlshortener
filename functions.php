<?php
    //Make URL friendly
    function makeFriendly($string){
        $string = strtolower(trim($string));
        $string = str_replace("'", '', $string);
        $string = preg_replace('#[ ]+#', '_', $string);
        $string = preg_replace('#[^0-9a-z\-]+#', '_', $string);
        $string = preg_replace('#_{2,}#', '_', $string);
        $string = preg_replace('#_-_#', '-', $string);
        return preg_replace('#(^_+|_+$)#D', '', $string);
    }
    
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