<?php
/**
 *  函数模板库
 */

/**
 * [cut_str 文字截断]
 * @param  [string] $src_str    [原始文字]
 * @param  [int] $cut_length    [截取长度]
 * @return [string]             [剪切的文字]
 */
function cut_str($src_str = "", $cut_length = 0, $post_id = 0){
    $return_str = '';
    $i = 0;
    $n = 0;
    $str_length = strlen($src_str);
    while (($n < $cut_length) && ($i <= $str_length)){
        $tmp_str = substr($src_str, $i, 1);
        $ascnum = ord($tmp_str);
        if ($ascnum >= 224){
            $return_str = $return_str.substr($src_str, $i, 3);
            $i = $i + 3;
            $n = $n + 2;
        } elseif ($ascnum >= 192){
            $return_str = $return_str.substr($src_str, $i,2);
            $i = $i + 2;
            $n = $n + 2;
        } elseif ($ascnum >= 65 && $ascnum <= 90){
            $return_str = $return_str.substr($src_str, $i, 1);
            $i = $i + 1;
            $n = $n + 2;
        } else {
            $return_str = $return_str.substr($src_str, $i, 1);
            $i = $i + 1;
            $n = $n + 1;
        }
    }
    $return_str = strip_tags($return_str, "<p><br><h1><h2><h3><h4><h5><h6><em><ul><li><img><pre>");
    if ($i<$str_length){
        $return_str = $return_str . '<a class="readmore" href="'.$post_id.'"><br>阅读全文...</a><br>';
    }
    return $return_str;
}

function str_replace_once($needle, $replace, $haystack) { 
// Looks for the first occurence of $needle in $haystack 
// and replaces it with $replace. 
    $pos = strpos($haystack, $needle); 
    if ($pos === false) { 
        return $haystack; 
    } 
    return substr_replace($haystack, $replace, $pos, strlen($needle)); 
} 




