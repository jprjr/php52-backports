--TEST--
Reflection Bug #29268 (__autoload() not called with reflectionProperty->getClass())
--SKIPIF--
<?php extension_loaded('reflection') or die('skip'); ?>
--FILE--
<?php
function __autoload($classname) {
	echo "__autoload($classname)\n";
	eval("class $classname {}");
}

class B{
	public function doit(A $a){
	}
}

$ref = new reflectionMethod('B','doit');
$parameters = $ref->getParameters();	
foreach($parameters as $parameter)
{
	$class = $parameter->getClass();
	echo $class->name."\n";
}
echo "ok\n";
?>
--EXPECT--
__autoload(A)
A
ok
