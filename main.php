<?php

include "./class/Verification.php";
include "./class/Argument.php";
include "./class/Lexer.php";
include "./class/Parser.php";
include "./Ressource/Token.php";
$code = '
function toto(){
    if(1){
    if(1 > 1){
        §test=1;
        PRINT TOTO;
    }}

}';
$Argument =  new Argument($argv, $argc);
$Verification =  new Verification($Argument->lunch());
$Verification->is_ready();
$Verification->is_read();
$Verification->my_extension();
$Verification->error();
$Lexer = new Lexer($rules);
$test = $Lexer->check_rules($code);
$Parser = new Parser($test, $tab_func);
$Parser->parsing();

