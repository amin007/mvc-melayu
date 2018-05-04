<?php
namespace Aplikasi\Kitab; //echo __NAMESPACE__;
class RahsiaHash
{
#=============================================================================================
	/**
	 * @param string $algo The algorithm (md5, sha1, whirlpool, etc)
	 * @param string $data The data to encode
	 * @param string $salt The salt (This should be the same throughout the system probably)
	 * @return string The hashed/salted data
	 */
	public static function create($algo, $data, $salt)
	{
		$context = hash_init($algo, HASH_HMAC, $salt);
		hash_update($context, $data);

		return hash_final($context);
	}
#---------------------------------------------------------------------------------------------
	public static function rahsia($algo, $data)
	{
		$context = hash_init($algo);
		hash_update($context, $data);

		return hash_final($context);
	}
#---------------------------------------------------------------------------------------------
	public static function cincang($data, $numAlgo = 12, $arrOptions = array())
	{
		if (function_exists('password_hash')) 
		{# php >= 5.5
			$cincang = password_hash($data, $numAlgo, $arrOptions);
		}
		else
		{
			$garam = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
			$garam = base64_encode($garam);
			$garam = str_replace('+', '.', $garam);
			$cincang = crypt($data, '$2y$10$' . $garam . '$');
		}

		return $cincang;
	}
#---------------------------------------------------------------------------------------------
	public static function sahkan($data, $cincang)
	{
		if (function_exists('password_verify'))
		{# php >= 5.5
			$pisau = password_verify($data, $cincang);
		}
		else
		{
			$lumat = crypt($data, $cincang);
			$pisau = $cincang == $lumat;
		}

		return $pisau;
	}
#=============================================================================================
}