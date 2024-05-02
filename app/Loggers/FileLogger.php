<?php

namespace App\Loggers;

use App\Contracts\LoggerInterface;
use Illuminate\Support\Facades\Storage;

class FileLogger implements LoggerInterface
{
    protected $type;

    public function __construct()
    {
        $this->type = 'file';
    }

    /**
     * @param string $message
     * @return void
     */
    public function send(string $message): void
    {
        $this->logToFile($message);

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
    private function logToFile(string $message)
    {
        Storage::append('logs.txt', $message);
        echo "$message was logged to the file\n";
    }
}
