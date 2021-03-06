--TEST--
Test ereg() function : basic functionality  (without $regs)
--FILE--
<?php
/* Prototype  : proto int ereg(string pattern, string string [, array registers])
 * Description: Regular expression match 
 * Source code: ext/standard/reg.c
 * Alias to functions: 
 */

/*
 * Test a number of simple, valid matches with ereg, without specifying $regs
 */

echo "*** Testing ereg() : basic functionality ***\n";

include(dirname(__FILE__) . '/regular_expressions.inc');

foreach ($expressions as $re) {
	list($pattern,$string) = $re;
	echo "--> Pattern: '$pattern'; string: '$string'\n";
	var_dump(ereg($pattern, $string));
}

echo "Done";
?>
--EXPECTF--
*** Testing ereg() : basic functionality ***
--> Pattern: '..(a|b|c)(a|b|c)..'; string: '--- ab ---'
int(1)
--> Pattern: '()'; string: ''
int(1)
--> Pattern: '()'; string: 'abcdef'
int(1)
--> Pattern: '[x]|[^x]'; string: 'abcdef'
int(1)
--> Pattern: '(a{1})(a{1,}) (b{1,3}) (c+) (d?ddd|e)'; string: '--- aaa bbb ccc ddd ---'
int(1)
--> Pattern: '\\\`\^\.\[\$\(\)\|\*\+\?\{\''; string: '\`^.[$()|*+?{''
int(1)
--> Pattern: '\a'; string: 'a'
int(1)
--> Pattern: '[0-9][^0-9]'; string: '2a'
int(1)
--> Pattern: '^[[:alnum:]]{62,62}$'; string: '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
int(1)
--> Pattern: '^[[:digit:]]{5}'; string: '0123456789'
int(1)
--> Pattern: '[[:digit:]]{5}$'; string: '0123456789'
int(1)
--> Pattern: '[[:blank:]]{1,10}'; string: '
 	'
int(1)
--> Pattern: '[[:print:]]{3}'; string: ' a '
int(1)
Done