<?php
/**
 * Created by PhpStorm.
 * User: remini
 * Date: 4.09.15
 * Time: 10:45
 */

class User {
    public $username;

    public $password;

    public $name;

    public $email;

    function __construct($username = null, $password = null, $name = null, $email = null) {
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->email = $email;
    }


    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }


}