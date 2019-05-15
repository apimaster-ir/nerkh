<?php

namespace APIMaster\Nerkh;

class Nerkh
{
	private static $api_key = NULL;

	private static $error = NULL;

	/**
	 * Get api key information
	 *
	 * @return bool|string
	 */
	static function info()
	{
		return self::request('nerkh/v1');
	}

	/**
	 * Get the price of all currencies
	 *
	 * @return bool|string
	 */
	static function list()
	{
		return self::request('nerkh/v1/list');
	}

	/**
	 * Get the price of single currency
	 *
	 * @param $slug
	 * @return bool|string
	 */
	static function single(string $slug)
	{
		return self::request("nerkh/v1/{$slug}/single");
	}

	/**
	 * Get api key information
	 *
	 * @return bool|string
	 */
	static function key()
	{
		return self::request('key');
	}

	/**
	 * @return string
	 */
	public static function getApiKey()
	{
		return self::$api_key;
	}

	/**
	 * @param string $api_key
	 */
	public static function setApiKey(string $api_key)
	{
		self::$api_key = $api_key;
	}

	/**
	 * @return null
	 */
	public static function getError()
	{
		return self::$error;
	}

	/**
	 * @param $endpoint
	 * @return bool|string
	 */
	private static function request(string $endpoint)
	{

		$curl = curl_init();

		$url = sprintf('http://api.apimaster.ir/%s/%s', self::$api_key, $endpoint);

		curl_setopt_array($curl, array(
			CURLOPT_URL            => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => "",
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 30,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => "GET",
			CURLOPT_POSTFIELDS     => "",
			CURLOPT_HTTPHEADER     => array(
				"Accept: application/json",
				"cache-control: no-cache",
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			self::$error = "cURL Error #:" . $err;
			return false;
		}

		return json_decode($response);
	}
}