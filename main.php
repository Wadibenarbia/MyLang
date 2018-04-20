<?php

include "./class/Verification.php";
include "./class/Argument.php";
include "./class/Lexer.php";
include "./class/Parser.php";
include "./Ressource/Token.php";
$Argument =  new Argument($argv, $argc);
$Verification =  new Verification($Argument->lunch());
$Verification->is_ready();
$Verification->is_read();
$Verification->my_extension();
if($Verification->error() == true){
    $Lexer = new Lexer($rules);
    $test = $Lexer->check_rules($Verification->file());
    $Parser = new Parser($test, $tab_func);
    $Parser->parsing();
}


