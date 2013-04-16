<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Read url content
 *
 * @access	public
 * @param	string	url
 * @return	string
 */
if ( ! function_exists('get_http_contents'))
{
	function get_http_contents($url = Null)
	{
		$curl_handle=curl_init();
		curl_setopt($curl_handle, CURLOPT_URL, $url);
		curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl_handle, CURLOPT_USERAGENT, 'ishuqian');
		$contents = curl_exec($curl_handle);
		curl_close($curl_handle);
		return mb_convert_encoding($contents, 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');
	    //echo nl2br(htmlentities($contents));
	}
}

if ( ! function_exists('http_url') )
{
	function http_url($url = Null)
	{
		if ( strpos($url, 'http://') !== 0 )
			$url =  'http://' . $url;
		return $url;		
	}
}

// ------------------------------------------------------------------------

/* End of file bookmarks_helper.php */
/* Location: ./system/heleprs/bookmarks_helper.php */