<?php

class My_Exceptions extends CI_Exceptions
{
	public function show_error($heading, $message, $template = 'error_general', $status_code = 500)
	{
		set_status_header($status_code);

		$message = implode(" / ", (!is_array($message)) ? array($message) : $message);

		throw new CiError($message);
	}

}

class CiError extends Exception
{

}
