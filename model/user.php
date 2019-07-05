<?php
class User
{
    private $email;
    private $firstname;
    private $lastname;
    public function __construct($email, $firstname,$lastname) {
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }
    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    /**
     * Get the value of firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }
    /**
     * Set the value of firstname
     *
     * @return  self
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }
    /**
     * Get the value of lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }
    /**
     * Set the value of lastname
     *
     * @return  self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }
}
?>