<?php




class Application_Router_Cli extends Zend_Controller_Router_Abstract
{


	public function route (Zend_Controller_Request_Abstract $dispatcher)
	{
		$getopt = new Zend_Console_Getopt (array ());
		$arguments = $getopt->getRemainingArgs ();

		$controller = 'index';
		$action = 'index';

		if ($arguments)
		{
			$controller = array_shift ($arguments);

			if ($arguments)
			{
				$action = array_shift ($arguments);
				$pattern_valid_action = '~^\w+[\-\w\d]+$~';
				if (false == preg_match ($pattern_valid_action, $action))
				{
					echo "Invalid action $action.\n", exit ();
				}
			}
		}

		$dispatcher->setControllerName ($controller)
			->setActionName ($action);

		return $dispatcher;
	}


	public function assemble ($userParams, $name = null, $reset = false, $encode = true)
	{
		echo "Not implemented\n", exit ();
	}
}
