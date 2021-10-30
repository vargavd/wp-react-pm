<?php

// DEBUG
function vd1($var) {
    echo "\n<pre style=\"background: #FFFF99; font-size: 14px; color: black;\">\n";
    var_dump($var);
    echo "\n</pre>\n";
}
function vd2($var1, $var2) {
    echo "\n<pre style=\"background: #FFFF99; font-size: 14px; color: black;\">\n";
    var_dump($var1);
    var_dump($var2);
    echo "\n</pre>\n";
}
function vd3($var1, $var2, $var3) {
    echo "\n<pre style=\"background: #FFFF99; font-size: 14px; color: black;\">\n";
    var_dump($var1);
    var_dump($var2);
    var_dump($var3);
    echo "\n</pre>\n";
}
function pr1($var) {
    echo "\n<pre style=\"background: #FFFF99; font-size: 14px; color: black;\">\n";
    print_r($var);
    echo "\n</pre>\n";
    
}
function pr2($var1, $var2) {
    echo "\n<pre style=\"background: #FFFF99; font-size: 14px; color: black;\">\n";
    print_r($var1);
    echo "\n";
    print_r($var2);
    echo "\n</pre>\n";
}
function pr3($var1, $var2, $var3) {
    echo "\n<pre style=\"background: #FFFF99; font-size: 14px; color: black;\">\n";
    print_r($var1);
    echo "\n";
    print_r($var2);
    echo "\n";
    print_r($var3);
    echo "\n</pre>\n";
}
function pr4($var1, $var2, $var3, $var4) {
    echo "\n<pre style=\"background: #FFFF99; font-size: 14px; color: black;\">\n";
    print_r($var1);
    echo "\n";
    print_r($var2);
    echo "\n";
    print_r($var3);
    echo "\n";
    print_r($var4);
    echo "\n</pre>\n";
}
