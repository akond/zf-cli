<?php




class BootstrapCli extends Zend_Application_Bootstrap_Bootstrap
{


	protected function _initRouter ()
	{
		$this->bootstrap ('frontcontroller');

		$this->getResource ('frontcontroller')
			->setRouter (new Application_Router_Cli ())
			->setRequest (new Zend_Controller_Request_Simple ());
	}


	protected function _initError ()
	{
		$frontcontroller = $this->getResource ('frontcontroller');

		$error = new Zend_Controller_Plugin_ErrorHandler ();
		$error->setErrorHandlerController ('error');

		$frontcontroller->registerPlugin ($error, 100);

		return $error;
	}
}

