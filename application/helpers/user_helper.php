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
if ( ! function_exists('set_session'))
{
	function set_session($user_id='', $email='', $username='')
	{
		$this->session->set_userdata(array(
			'userid' => $user_id,
			'email' => $email,
			'username' => $username,
		));
	}
}

if ( ! function_exists('set_cookie') )
{
	function set_cookie($user_id, $cookie_auth)
	{
		setcookie("ishuqian_user_id", $user_id, time() + 3600 * 24 * 30, '/');
		setcookie("ishuqian_cookie_auth", $cookie_auth, time() + 3600 * 24 * 30, '/');
	}
}

if ( ! function_exists('encryp_pass') )
{
	function encryp_pass($pass)
	{
		return md5(md5($pass.'cactus-studio'));
	}
}
// ------------------------------------------------------------------------

/* End of file bookmarks_helper.php */
/* Location: ./system/heleprs/bookmarks_helper.php */