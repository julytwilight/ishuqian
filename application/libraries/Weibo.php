<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Weibo
 * @author Seven
 */


include APPPATH."libraries/weibo/saetv2.ex.class.php";

class Weibo
{
	# weibo config
	public $akey = '3120994132';
	public $skey = '6507333a8c1c432eab40723e9bef204c';
	public $callback_url = 'http://ishuqian.test/callback/weibo/';

	public function get_url()
	{
		$o = new SaeTOAuthV2( $this->akey , $this->skey );
		return $o->getAuthorizeURL( $this->callback_url );
	}

	public function get_access_token($type, $keys)
	{
		$o = new SaeTOAuthV2( $this->akey , $this->skey );
		try {
			$token = $o->getAccessToken( $type, $keys ) ;
		} catch (OAuthException $e) {
			die('验证失败');
		}
		return $token;
	}

	public function get_userinfo($access_token, $uid)
	{
		$c = new SaeTClientV2( $this->akey , $this->skey , $access_token );
		return $c->show_user_by_id($uid);
	}
}