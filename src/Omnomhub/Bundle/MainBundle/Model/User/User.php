<?php

namespace Omnomhub\Bundle\MainBundle\Model\User;

class User
{
	protected $id;
	protected $email;
	protected $displayname;
	protected $gravatarEmail;
	protected $password;
	protected $client;

	public function __construct($client)
	{
		$this->client = $client;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setDisplayname($displayname)
	{
		$this->displayname = $displayname;
	}

	public function getDisplayname()
	{
		return $this->displayname;
	}

	public function setGravatarEmail($gravatarEmail)
	{
		$this->gravatarEmail = $gravatarEmail;
	}

	public function getGravatarEmail()
	{
		return $this->gravatarEmail;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getPassword()
	{
		return $this->password;
	}

}
