<?php




class IndexController extends Application_Controller_Cli
{


	/**
	 *	Just run
	 *  php cli.php
	 */
	public function indexAction ()
	{
		echo "It is I.\n";
	}


	/**
	 * php cli.php info
	 */
	public function infoAction ()
	{
		echo <<<info
Usage:
	php cli.php index info
		This information.


info;

	}


	public function errorAction ()
	{
		throw new Exception ("Some error.");
	}
}
