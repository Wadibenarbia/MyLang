<?php

include "./class/Verification.php";
include "./class/Argument.php";
include "./class/Lexer.php";
include "./class/Parser.php";
include "./Ressource/Token.php";
$code = 'if (1){if (2){print Helloworld;}}';
$Argument =  new Argument($argv, $argc);
$Verification =  new Verification($Argument->lunch());
$Verification->is_ready();
$Verification->is_read();
$Verification->my_extension();
$Verification->error();
$Lexer = new Lexer($rules);
$test = $Lexer->check_rules($code);
$Parser = new Parser($test);
$Parser->parsing();
// var_dump($this->parser);
