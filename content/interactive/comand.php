<?php
/**	op-module-git:/content/interactive/comand.php
 *
 * @created    2025-11-24
 * @version    1.0
 * @package    op-module-git
 * @author     Tomoaki Nagahara
 * @copyright  Tomoaki Nagahara All rights reserved.
 */

/**	Declare strict type
 *
 */
declare(strict_types=1);

/**	Namespace
 *
 */
namespace OP;

//	...
$comands = [
	'',
	'update',
	'fetch',
	'pick',
	'pull',
	'submodule/add',
	'submodule/delete',
	'submodule/foreach',
	'submodule/remote/add',
];

//	...
echo "\nList of available commands:\n";
foreach( $comands as $number => $comand ){
	if(!$comand ){
		echo "\n";
		continue;
	}
	echo "{$number}: {$comand}\n";
}

//	...
do{
	echo "\nPlease select a command number: ";
	$number = trim(fgets(STDIN));
}while(!$comand = $comands[$number] ?? null );

//	...
echo "\n";

//	...
return $comand;
