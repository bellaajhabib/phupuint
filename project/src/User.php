<?php

/**
 * User
 *
 * A user of the system
 */
class User
{

    /**
     * First name
     * @var string
     */
    public $first_name;

    /**
     * Last name
     * @var string
     */
    public $surname;
    /**
     * @var string
     */
    public $mail;
/**
     * Mailer object
     * @var Mailer
     */
    protected $mailer;

    /**
     * Set the mailer dependency
     *
     * @param Mailer $mailer The Mailer object
     */
    public function setMailer(Mailer $mailer) {
        $this->mailer = $mailer;
    }
    /**
     * Get the user's full name from their first name and surname
     *
     * @return string The user's full name
     */
    public function getFullName()
    {
        return trim("$this->first_name $this->surname");
    }
      public function add(int $a, int $b): int
    {
        return $a + $b;
    }
    public function notifyMail($message){


       return $this->mailer->sendMessage($this->mail,$message);
    }
}
