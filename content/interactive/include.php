<?php
/**	op-module-git:/content/interactive/index.php
 *
 * @created    2025-11-04
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
do{
	echo "Please enter your name: ";
	$name = trim(fgets(STDIN));
}while( strlen($name) === 0 );

//	...
do{
	echo "Please enter your age: ";
	$age = trim(fgets(STDIN));
}while( OP()->isInt($age) === false );

//	...
echo "\nHello, {$name} your age is {$age}\n";
