<?php
 
if (!function_exists('readable_amount')) {
    /**
     * Returns a human readable amount
     *
     * @param string $bytes
     * String amount that to be converted
     *
     * @return string a string in human readable format
     *
     * */
    function readable_amount($value)
    {
        if($value == ''){
            return '';
        }
    
    
        $strip = str_replace(',','',$value);
        $strip = str_replace(' ','',$strip);
        
        $real = number_format($strip, 2, '.', ',');
    
        return $real;


    }
}


if (!function_exists('padding_lid')) {
    /**
     * Returns a 0 padded string
     *
     * @param string $bytes
     * String amount that to be converted
     *
     * @return string a string in human readable format
     *
     * */
    function padding_lid($id)
    {
        return 'LID-' . str_pad($id, 5, '0', STR_PAD_LEFT);
    }
}