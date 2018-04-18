<?php

require 'Lexer.php';
require 'Parser.php';

$code = 'if (1) {}';
$LEXER = new Lexer($code);
$PARSER = new Parser();

$LEXER->check_rules($code);
$PARSER->parsing();

