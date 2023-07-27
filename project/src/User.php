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
    public string $email;
    /**
     * @var Mailer
     */
    protected Mailer $mailer;
     protected int $count = 0;
    /**
     * @param Mailer $mailer
     */
    public function setMailer(Mailer $mailer): void
    {
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

    public function notify($message): bool
    {
        return $this->mailer->sendMessage($this->email, $message);
    }

    public function getGreeting()
    {
        return "Hello!";
    }

    public function getFarewell()
    {
        return "Bye!";
    }


    public function increment()
    {
        $this->count++;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}