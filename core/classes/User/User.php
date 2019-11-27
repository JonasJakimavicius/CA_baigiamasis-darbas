<?php

namespace Core\User;

Class User
{

    /**
     * User constructor.
     * Jei sukurdami user objekta nepaduodam jam parametro,
     * tai visas $this->data propercio reiksmes nustato i null
     * Jei paduodam - iskviecia setData metoda
     * @param array $data
     */
    public function __construct($data = null)
    {
        if (!$data) {
            $this->data = [
                'name' => null,
                'surname' => null,
                'email' => null,
                'password' => null,
                'phone_number' => null,
            ];
        } else {
            $this->setData($data);
        }
    }


    /**
     * Nustato user'iui password'a
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->data['password'] = $password;
    }

    /**
     * Grazina user'io password'a
     * @return string
     */
    public function getPassword()
    {
        return $this->data['password'];
    }

    /**
     * Nustato email i $this->data
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->data['email'] = $email;
    }

    /**
     * Grazina user'io email
     * @return string
     */
    public function getEmail()
    {
        return $this->data['email'];
    }


    /**
     * Nustato name i $this->data
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->data['name'] = $name;
    }

    /**
     * Grazina userio name
     * @return string
     */
    public function getName()
    {
        return $this->data['name'];
    }

    /**
     * Nustato surname i $this->data
     * @param string $surname
     */
    public function setSurname(string $surname)
    {
        $this->data['surname'] = $surname;
    }


    /**
     * Grazina userio surname
     * @return string
     */
    public function getSurname()
    {
        return $this->data['surname'];
    }

    public function setId($id)
    {
        $this->data['id'] = $id;
    }

    public function getId()
    {
        return $this->data['id'];
    }

    public function setPhone($phone)
    {
        $this->data['phone_number'] = $phone;
    }

    public function getPhone()
    {
        return $this->data['phone_number'];
    }

    /**
     * Pagal paduotas $data reiksmes nusetina $this->data reiksmes
     * Jei reiksme nepaduota, nustato null
     * @param array $data
     */

    public function setData(array $data)
    {

        $this->setName($data['name'] ?? '');
        $this->setSurname($data['surname'] ?? '');
        $this->setEmail($data['email'] ?? '');
        $this->setPassword($data['password'] ?? '');
        $this->setPhone($data['phone_number'] ?? '');
    }

    /**
     * Grazina array su user'iui nustatytomis reiksmemis
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

}
