<?php

namespace Chatwork;

/**
 * FuelPHP ChatWork package
 *
 * @author    Mamoru Otsuka http://madroom-project.blogspot.jp/
 * @copyright 2013 Mamoru Otsuka
 * @license   MIT License http://www.opensource.org/licenses/mit-license.php
 */
class Chatwork
{
	/**
	 * API endpoint
	 *
	 * @var string
	 */
	public static $endpoint = 'https://api.chatwork.com/v1';

	/**
	 * Initialize
	 */
	public static function _init()
	{
		\Config::load('chatwork', true);
	}

	/**
	 * HTTP requests
	 *
	 * @param  string $method
	 * @param  array $args
	 * @return \Fuel\Core\Response
	 * @throws \BadMethodCallException
	 */
	public static function __callStatic($method, array $args = array())
	{
		if (in_array($method, array('get', 'post', 'put', 'delete')))
		{
			array_unshift($args, $method);
			return call_user_func_array('static::call', $args);
		}

		throw new \BadMethodCallException('Invalid method.');
	}

	/**
	 * Call API
	 *
	 * @param  string $method
	 * @param  string $uri
	 * @param  array $params
	 * @return \Fuel\Core\Response
	 */
	protected static function call($method, $uri, array $params = array())
	{
		$curl = \Request::forge(static::$endpoint.$uri, 'curl');

		$curl->set_mime_type('json')
			->set_method($method)
			->set_params($params)
			->set_header('X-ChatWorkToken', \Config::get('chatwork.api_token'));

		try
		{
			$curl->execute();
		}
		catch (\Exception $e)
		{
			// do nothing.
		}

		return $curl->response();
	}
}
