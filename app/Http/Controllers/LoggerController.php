<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loggers\LoggerFactory;
use Illuminate\Support\Facades\Config;

/**
 * LoggerController
 * @package App\Http\Controllers
 *
 * @group Logger
 */
class LoggerController extends Controller
{
    /**
     * Sends a log message to the default logger
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function log(Request $request): \Illuminate\Http\JsonResponse
    {
        $message = $request->input('message');
        $defaultLoggerType = Config::get('logging.default');
        $logger = LoggerFactory::createLogger($defaultLoggerType, Config::get('logging'));
        $logger->send($message);

        return response()->json(['message' => 'Logged successfully']);
    }

    /**
     * Sends a log message to the special logger
     *
     * @param string $type
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function logTo(string $type, Request $request): \Illuminate\Http\JsonResponse
    {
        $message = $request->input('message');
        $logger = LoggerFactory::createLogger($type, Config::get('logging'));
        $logger->send($message);

        return response()->json(['message' => "Logged to $type successfully"]);
    }

    /**
     * Sends a log message to the all loggers
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function logToAll(Request $request): \Illuminate\Http\JsonResponse
    {
        $message = $request->input('message');
        $loggingConfig = Config::get('logging');
        foreach ($loggingConfig as $type => $config) {
            $logger = LoggerFactory::createLogger($type, $loggingConfig);
            $logger->send($message);
        }

        return response()->json(['message' => 'Logged to all channels successfully']);
    }


}
