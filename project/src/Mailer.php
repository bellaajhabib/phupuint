<?php

/**
 * Mailer
 *
 * An example mailer class
 */
class Mailer
{

    /**
     * Send a message
     *
     * @param string $email  Recipient email address
     * @param string $message  Content of the message
     *
     * @throws InvalidArgumentException If $email is empty
     *
     * @return boolean
     */
    public static function  send(string $email, string $message)
    {
        if (empty($email)) {
            throw new InvalidArgumentException;
        }

        echo "Send '$message' to $email";

        return true;
    }
        public function sendMessage(string $email, string $message)
    {
        sleep(3);

        echo "Send '$message' to $email";

        return true;
    }

    public function add(int $a, int $b)
    {
        return $a + $b;
    }
}
