<?php

class Foo
{
	public $var = '3.14159265359';
}

$baseMemory = memory_get_usage();

for ( $i = 0; $i <= 100000; $i++ )
{
	$a = new Foo;
	$a->self = $a;
	unset($a);	
	
	if ( $i % 500 === 0 )
	{
		echo sprintf( '%8d: ', $i ), memory_get_usage() - $baseMemory, "<br/>";
	}
}

?>