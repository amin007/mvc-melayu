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
	public static function cincang($data)
	{
		#https://www.php.net/manual/en/function.password-hash.php
		if (function_exists('password_hash'))
		{# php >= 5.5
			//$numAlgo = PASSWORD_DEFAULT;
			//$numAlgo = PASSWORD_ARGON2I; php7.2.0
			//$numAlgo = PASSWORD_ARGON2ID; php7.3.0
			$numAlgo = PASSWORD_BCRYPT;
			$options = array('cost' => 12);
			$cincang = password_hash($data, $numAlgo, $options);
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