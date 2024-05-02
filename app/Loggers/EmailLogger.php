<?php

namespace App\Loggers;

use App\Contracts\LoggerInterface;

class EmailLogger implements LoggerInterface
{
    protected $email;
    protected $type;

    /**
     * @param string $email
     */
    public function __construct(string $email)
    {
        $this->email = $email;
        $this->type = 'email';
    }

    /**
     * @param string $message
     * @return void
     */
    public function send(string $message): void
    {
        $this->sendEmail($message);

    }

    /**
     * @param string $message
     * @param string $loggerType
     * @return void
     */
    public function sendByLogger(string $message, string $loggerType): void
    {
        $this->send($message);

    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return void
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param string $message
     * @return void
     */
    private function sendEmail(string $message)
    {
        echo "$message was sent via email\n";
    }
}
