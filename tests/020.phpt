--TEST--
uopz_get_exit_status
--EXTENSIONS--
uopz
--INI--
uopz.disable=0
uopz.exit=0
opcache.enable_cli=0
xdebug.enable=0
--FILE--
<?php
exit(10);

var_dump(uopz_get_exit_status());

$status = 20;
$ref    = &$status;

exit($ref);

var_dump(uopz_get_exit_status());

uopz_allow_exit(true);

exit(0);

echo "not here\n";
?>
--EXPECT--
int(10)
int(20)
