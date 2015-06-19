<?php
    function randstring($length = 10) {
        $i = 0;
        
        while($i <= $length){
            $rand = ((mt_rand(0,9) & 1)? range('A', 'Z') : range('a', 'z'));
            
            echo $rand[mt_rand(0, 25)];
            $i++;
        }
    }
?>