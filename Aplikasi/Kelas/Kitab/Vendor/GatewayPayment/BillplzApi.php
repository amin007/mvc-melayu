<?php
/*
 * Pencipta Asal : AriffAzmi di https://github.com/AriffAzmi
 * Ubahsuai oleh : Amin Ledang di https://github.com/amin007

 Cara hendak panggil class tersebut
#--------------------------------------------------------------------------------------------------
	#  untuk billplz
	define('BILLPLZ_API_KEY', 'hahaha=hihihi-huhuhu-hehehe+hohoho');
#--------------------------------------------------------------------------------------------------
	function godek2ApiBillplz($posmen)
	{
		# https://gist.github.com/AriffAzmi/40243dfd8b147851eaed59cd1980ab06
		# untuk bayar katanya
		$a = new \BillplzAPI(BILLPLZ_API_KEY);
		# set nilai utama
		$a->setVersion('v3');
		//$a->setCollectionID('collect_id');#rujuk dalam billplz
		#Post transaction status ke server
		$siapaCall = URL . 'index/billplzPanggilDaa';
		$a->setCallbackUrl($siapaCall);
		#billplz redirect setelah transaction berjaya/tidak berjaya dilakukan
		$berjayaCall = URL . 'index/berjayaDaa';
		$a->setRedirectUrl($berjayaCall);
		# masukkan nilai $posmen daa
		$a->setDescription();# masukkan keterangan
		$a->setName($posmen['nama']);
		$a->setAmount($posmen['nilai']);
		$a->setEmail($posmen['email']);
		$a->setMobile($posmen['handphone']);
		$a->setReference1Label('Item 1:');
		$a->setReference1($posmen['tajuk']);
		//$a->setReference2Label('Item 2:');
		//$a->setReference2();
		$bill = $a->payBill();
		$this->semakPembolehubah($bill,'bill');
		//header('Location: ' . $nakpergimana);
	}
#--------------------------------------------------------------------------------------------------
	function billplzPanggilDaa()
	{
		$data = $_REQUEST;
	}
#--------------------------------------------------------------------------------------------------
	public function semakPembolehubah($senarai,$jadual,$p='0')
	{
		echo '<pre>$' . $jadual . '=><br>';
		if($p == '0') print_r($senarai);
		if($p == '1') var_export($senarai);
		echo '</pre>';
		//$this->semakPembolehubah($ujian,'ujian',0);
		#http://php.net/manual/en/function.var-export.php
		#http://php.net/manual/en/function.print-r.php
	}
#--------------------------------------------------------------------------------------------------
 */
namespace Aplikasi\Kitab;//echo __NAMESPACE__;
class BillplzAPI
{
#==================================================================================================
	protected $secret_key;
	protected $version;
	protected $collectionID;
	protected $description;
	protected $email;
	protected $mobile;
	protected $name;
	protected $amount;
	protected $due_at;
	protected $reference_1_label;
	protected $reference_1;
	protected $reference_2_label;
	protected $reference_2;
	protected $callback_url;
	protected $redirect_url;
#--------------------------------------------------------------------------------------------------
	function __construct(String $secret_key)
	{
		# $secret_key adalah kod rahsia dari Billplz
		$this->setSecretKey($secret_key);

		return $this;
	}
#--------------------------------------------------------------------------------------------------
	/**
	  * @return mixed
	  */
	protected function getSecretKey()
	{
		# $secret_key adalah kod rahsia dari Billplz
		return $this->secret_key;
	}
#--------------------------------------------------------------------------------------------------
	/**
	  * @param mixed $secret_key
	  *
	  * @return self
	  */
	protected function setSecretKey(String $secret_key)
	{
		# $secret_key adalah kod rahsia dari Billplz
		$this->secret_key = $secret_key;

		return $this;
	}
#--------------------------------------------------------------------------------------------------
	/**
	  * @return mixed
	  */
	protected function getVersion() { return $this->version; }
#--------------------------------------------------------------------------------------------------
	/**
	  * @param mixed $version
	  *
	  * @return self
	  */
	protected function setVersion(String $version)
	{
		# $version adalah versi dari Billplz
		$this->version = $version;

		return $this;
	}
#--------------------------------------------------------------------------------------------------
	/**
	  * @return mixed
	  */
	protected function getCollectionID(){return $this->collectionID;}
#--------------------------------------------------------------------------------------------------
	/**
	  * @param mixed $collectionID
	  *
	  * @return self
	  */
	protected function setCollectionID(String $collectionID)
	{
		$this->collectionID = $collectionID;

		return $this;
	}
#--------------------------------------------------------------------------------------------------
	/**
	  * @return mixed
	  */
	protected function getDescription(){return $this->description;}
#--------------------------------------------------------------------------------------------------
	/**
	  * @param mixed $description
	  *
	  * @return self
	  */
	protected function setDescription(String $description)
	{
		$this->description = $description;

		return $this;
	}
#--------------------------------------------------------------------------------------------------
	/**
	  * @return mixed
	  */
	protected function getEmail(){return $this->email;}
#--------------------------------------------------------------------------------------------------
	/**
	  * @param mixed $email
	  *
	  * @return self
	  */
	protected function setEmail(String $email)
	{
		$this->email = $email;

		return $this;
	}
#--------------------------------------------------------------------------------------------------
	/**
	  * @return mixed
	  */
	protected function getName(){return $this->name;}
#--------------------------------------------------------------------------------------------------
	/**
	  * @param mixed $name
	  *
	  * @return self
	  */
	protected function setName(String $name)
	{
		$this->name = $name;

		return $this;
	}
#--------------------------------------------------------------------------------------------------
	/**
	  * @return mixed
	  */
	protected function getMobile(){return $this->mobile;}
#--------------------------------------------------------------------------------------------------
	/**
	  * @param mixed $mobile
	  *
	  * @return self
	  */
	protected function setMobile(String $mobile)
	{
		$this->mobile = $mobile;

		return $this;
	}
#--------------------------------------------------------------------------------------------------
	/**
	  * @return mixed
	  */
	protected function getAmount(){return $this->amount;}
#--------------------------------------------------------------------------------------------------
	/**
	  * @param mixed $amount
	  *
	  * @return self
	  */
	protected function setAmount(Integer $amount)
	{
		$this->amount = $amount;

		return $this;
	}
#--------------------------------------------------------------------------------------------------
	/**
	  * @return mixed
	  */
	protected function getDueAt(){return $this->due_at;}
#--------------------------------------------------------------------------------------------------
	/**
	  * @param mixed $due_at
	  *
	  * @return self
	  */
	protected function setDueAt(String $due_at)
	{
		$this->due_at = $due_at;

		return $this;
	}
#--------------------------------------------------------------------------------------------------
	/**
	  * @return mixed
	  */
	protected function getReference1Label(){return $this->reference_1_label;}
#--------------------------------------------------------------------------------------------------
	/**
	  * @param mixed $reference_1_label
	  *
	  * @return self
	  */
	protected function setReference1Label(String $reference_1_label)
	{
		$this->reference_1_label = $reference_1_label;

		return $this;
	}
#--------------------------------------------------------------------------------------------------
	/**
	  * @return mixed
	  */
	protected function getReference1(){return $this->reference_1;}
#--------------------------------------------------------------------------------------------------
	/**
	  * @param mixed $reference_1
	  *
	  * @return self
	  */
	protected function setReference1(String $reference_1)
	{
		$this->reference_1 = $reference_1;

		return $this;
	}
#--------------------------------------------------------------------------------------------------
	/**
	  * @return mixed
	  */
	protected function getReference2Label(){return $this->reference_2_label;}
#--------------------------------------------------------------------------------------------------
	/**
	  * @param mixed $reference_2_label
	  *
	  * @return self
	  */
	protected function setReference2Label(String $reference_2_label)
	{
		$this->reference_2_label = $reference_2_label;

		return $this;
	}
#--------------------------------------------------------------------------------------------------
	/**
	  * @return mixed
	  */
	protected function getReference2(){return $this->reference_2;}
#--------------------------------------------------------------------------------------------------
	/**
	  * @param mixed $reference_2
	  *
	  * @return self
	  */
	protected function setReference2(String $reference_2)
	{
		$this->reference_2 = $reference_2;

		return $this;
	}
#--------------------------------------------------------------------------------------------------
	/**
	  * @return mixed
	  */
	protected function getCallbackUrl(){return $this->callback_url;}
#--------------------------------------------------------------------------------------------------
	/**
	  * @param mixed $callback_url
	  *
	  * @return self
	  */
	protected function setCallbackUrl(String $callback_url)
	{
		$this->callback_url = $callback_url;

		return $this;
	}
#--------------------------------------------------------------------------------------------------
	/**
	  * @return mixed
	  */
	protected function getRedirectUrl(){return $this->redirect_url;}
#--------------------------------------------------------------------------------------------------
	/**
	  * @param mixed $redirect_url
	  *
	  * @return self
	  */
	protected function setRedirectUrl(String $redirect_url)
	{
		$this->redirect_url = $redirect_url;

		return $this;
	}
#--------------------------------------------------------------------------------------------------
###################################################################################################
# mula panggil fungsi billplz
	public function payBill()
	{
		try {
			$data = $this->makePaymentData();
			$ch = curl_init("https://www.billplz.com/api/" . $this->getVersion() . "/bills");
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_USERPWD, $this->getSecretKey().":");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
			$response = json_decode(curl_exec($ch));
			curl_close($ch);

			return $response;
		} catch (\Exception $e) {
			die($e->getMessage());
		}
	}
#--------------------------------------------------------------------------------------------------
	public function getBill(String $billID)
	{
		try {
			$ch = curl_init("https://www.billplz.com/api/" . $this->getVersion()
				. "/bills/" .$billID);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_USERPWD, $this->getSecretKey().":");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = json_decode(curl_exec($ch));
			curl_close($ch);

			return $response;
		} catch (\Exception $e) {
			die($e->getMessage());
		}
	}
#--------------------------------------------------------------------------------------------------
    public function deleteBill(String $billID)
    {
		try {
			$ch = curl_init("https://www.billplz.com/api/" . $this->getVersion()
				."/bills/" . $billID);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_USERPWD, $this->getSecretKey().":");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
			$response = json_decode(curl_exec($ch));
			curl_close($ch);

			return $response;
		} catch (\Exception $e) {
			die($e->getMessage());
		}
    }
#--------------------------------------------------------------------------------------------------
    public function makePaymentData()
    {
		$data = [];
		$data['collection_id'] = $this->getCollectionID();
		$data['description'] = $this->getDescription();
		$data['name'] = $this->getName();
		$data['email'] = $this->getEmail();
		$data['mobile'] = $this->getMobile();
		$data['amount'] = $this->getAmount();
		$data['callback_url'] = $this->getCallbackUrl();
		$data['redirect_url'] = $this->getRedirectUrl();

		# Set the bill due date
		if (strlen($this->getDueAt()) > 0) {
			$data['due_at'] = $this->getDueAt();
		}

		# Set the bill reference 1
		if (strlen($this->getReference1Label()) > 0
		&& strlen($this->getReference1()) > 0)
		{
			$data['reference_1_label'] = $this->getReference1Label();
			$data['reference_1'] = $this->getReference1();
		}

		# Set the bill reference 2
		if (strlen($this->getDueAt()) > 0)
		{
			$data['reference_2_label'] = $this->getReference2Label();
			$data['reference_2'] = $this->getReference2();
		}

		return $data;
    }
#--------------------------------------------------------------------------------------------------
#==================================================================================================
}