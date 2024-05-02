<?php

namespace App\Loggers;

use App\Contracts\LoggerInterface;

class LoggerFactory
{

    /**
     * @param string $type
     * @param array $config
     * @return LoggerInterface
     * @throws \Exception
     */
    public static function createLogger(string $type, array $config): LoggerInterface
    {
        switch ($type) {
            case 'email':
                return new EmailLogger($config['email']);
            case 'database':
                return new DatabaseLogger();
            case 'file':
                return new FileLogger();
            default:
                throw new \Exception('Invalid logger type specified.');
        }
    }

}
