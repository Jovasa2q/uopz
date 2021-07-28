--TEST--
call uopz_get_property in a class scope
--EXTENSIONS--
uopz
--INI--
uopz.disable=0
--FILE--
<?php
class Foo {
    private $name = 'hello';

    public function getName() {
        return $this->name;
    }
}

class UM {
    public function getProp($obj, $name) {
        uopz_get_property($obj, $name);
    }
}

$f = new Foo();

$um = New UM();
$um->getProp($f, 'name');

echo $f->getName();
?>
--EXPECT--
hello
