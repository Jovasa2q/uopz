--TEST--
uopz_set_static with array
--EXTENSIONS--
uopz
--INI--
uopz.disable=0
--FILE--
<?php
class Foo {
	public static function bar () {
		static $baz = null;
		if (is_null ($baz)) { $baz = time (); }
		return $baz;
	}
}

var_dump(Foo::bar());
uopz_set_static ('Foo', 'bar', ['baz' => 1]);
var_dump(Foo::bar());
?>
--EXPECTF--
int(%d)
int(1)
