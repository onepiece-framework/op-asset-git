<?php
/**	op-asset-git:/submodule/add.php
 *
 * @created    2024-06-02
 * @version    1.0
 * @package    op-asset-git
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

//	Usage
$usage = 'php git.php asset/git/submodule/add.php type=unit name=unit_name branch=' . date('Y') . PHP_EOL;

//	...
if(!function_exists('OP') ){
	echo "Usage: {$usage}";
	exit(__LINE__);
}

//	...
$types = [
	'',
	'unit',
	'module',
	'layout',
];

//	...
if(!$type = OP()->Request('type') ){
	//	...
	echo "List of types: \n";
	foreach($types as $number => $type){
		if(!$type){
			echo "\n";
			continue;
		}
		echo "{$number}: {$type}\n";
	}
	//	...
	do{
		echo "\nPlease select a type number: ";
		$number = trim(fgets(STDIN));
	}while(!$type = $types[$number] ?? null );
}

//	...
if(!$name = OP()->Request('name') ){
	//	...
	do{
		echo "\nPlease enter the {$type} name: ";

	}while(!$name = trim(fgets(STDIN)) );
}

//	...
if(!$branch = OP()->Request('branch') ){
	//	...
	echo "\nYou can specify the branch name (Not specify is empty return): ";
	$branch = trim(fgets(STDIN));
}

//	...
if(!$force = OP()->Request('force') ){
	//	...
	echo "\nYou can specify the force clone (Not specify is empty return): ";
	$force = trim(fgets(STDIN)) ? '--force': null;
}

/**	Leave for git diff.
//	...
foreach( ['type','name'] as $key ){
	//	...
	if( empty( OP()->Request($key) ) ){
		echo "\"{$key}\" was empty: {$usage}";
		exit(__LINE__);
	}
}
*/

/*
//	...
$request = OP()->Request();
$type    = $request['type'];
$name    = $request['name'];
$branch  = $request['branch'] ?? null;
$force   = $request['force']  ?  '--force' : null;
*/
$url     = "https://github.com/onepiece-framework/op-{$type}-{$name}.git";
$path    = "asset/{$type}/{$name}";
$branch  = $branch ? "-b {$branch}": '';
$comand  = "git submodule add {$force} {$branch} {$url} {$path}";

//	...
echo "\nWould you like to run the following command?\n\n";
echo "{$comand}\n\n";
echo "Enter Y to run: ";
if( 'y' !== strtolower(trim(fgets(STDIN))) ){
	return false;
}

/* @var $output array */
/* @var $status int   */
exec($comand, $output, $status);
if( $status ?? null ){
	return false;
}

//	...
if( file_exists($path = "./{$path}/Init.php") ){
	$comand = "php {$path}";
	echo "\nDo you want to run: {$comand}\n";
	echo "Enter Y or N: ";
	if( 'y' !== strtolower(trim(fgets(STDIN))) ){
		return false;
	}
	exec($comand, $output, $status);
}

//	...
return true;
