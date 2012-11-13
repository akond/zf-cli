<?php




class Application_Controller_Cli extends Zend_Controller_Action
{

	private $stdin;




	function preDispatch ()
	{
		$this->flush ();
	}


	function init ()
	{
		$this->_helper->ViewRenderer->setNoRender ();
		$this->adjustErrorHandler ();
	}


	protected function adjustErrorHandler ()
	{
		$error_handler = $this->getFrontController ()
			->getPlugin ('Zend_Controller_Plugin_ErrorHandler');

		if ($error_handler)
		{
			$error_handler->setErrorHandlerController ('error');
		}
	}


	public function writeLine ($string, $new_line = true)
	{
		echo $string;
		echo $new_line ? PHP_EOL : '';
	}


	public function confirmYes ($message)
	{
		echo $message, ' [y/N] ';
		$answer = $this->readLine ('N');

		return $answer == 'y';
	}


	public function readLine ($default = '')
	{
		$this->flush ();

		if (empty ($this->stdin))
		{
			$this->stdin = fopen ('php://stdin', 'r');
		}

		$line = fgets ($this->stdin);
		$line = trim ($line, "\n");

		if ('' == $line)
		{
			$line = $default;
		}

		return $line;
	}


	function flush ()
	{
		while (ob_get_level())
		{
			ob_end_flush ();
		}
	}
}
