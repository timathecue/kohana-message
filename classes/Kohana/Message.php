<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Message {

	const SUCCESS = 'success';
	const INFO    = 'info';
	const ERROR   = 'error';

	/**
	 * Message::set(Message::SUCCESS, 'Well done!');
	 * 
	 * @param string $type
	 * @param string/array $message
	 */
	public static function set($type, $message)
	{
		Session::instance()->set(Kohana::$config->load('message.session_key'), (object) array('type' => $type, 'message' => $message));
	}

	/**
	 * @return object
	 */
	public static function get()
	{
		return Session::instance()->get(Kohana::$config->load('message.session_key'));
	}

	/**
	 * @return void
	 */
	public static function clear()
	{
		Session::instance()->delete(Kohana::$config->load('message.session_key'));
	}

	/**
	 * echo Message::display('view/basic');
	 * 
	 * @param string/View $view
	 * @param bool $clear
	 * @return string
	 */
	public static function display($view = NULL, $clear = TRUE)
	{
		if (($message = Message::get()) === NULL)
		{
			return '';
		}

		if ($clear)
		{
			Message::clear();
		}

		if ($view === NULL)
		{
			$view = Kohana::$config->load('message.default_view');
		}

		if ( ! $view instanceof Kohana_View)
		{
			$view = View::factory($view);
		}

		return $view->set('message', $message)->render();
	}
	
	/**
	 * Message::render('view/basic');
	 * 
	 * @param string/View $view
	 * @param bool $clear
	 * @return string
	 */
	public static function render($view = NULL, $clear = TRUE)
	{
		echo Message::display($view, $clear);
	}
	
	public static function success($message) 
	{
		Message::set(Message::SUCCESS, $message);
	}
	
	public static function info($message) 
	{
		Message::set(Message::INFO, $message);
	}

	public static function error($message) 
	{
		Message::set(Message::ERROR, $message);
	}

}