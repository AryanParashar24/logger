<?php

namespace Utopia\Logger\Adapter;

use Utopia\Logger\Adapter;
use Utopia\Logger\Log;
use Utopia\Logger\Logger;

class NewRelic extends Adapter
{
    protected $apiKey = 'NRAK-0JUJGE6VL2WQE0SY25QX3GE0BLJ';
    protected $apiSecret = 'AB8OBxwdPBURERsxPAQLH1dbMBQHGQYGXw==';

    const ENVIRONMENT_STAGING = 'staging';
    const ENVIRONMENT_PRODUCTION = 'production';

    public static function getName(): string
    {
        return "NewRelicAdapter";
    }

    public function push(Log $log): int
    {
        $url = 'https://log-api.newrelic.com/log/v1'; // New Relic log API endpoint

        $postData = [
            'apiKey' => $this->apiKey,
            'log' => [
                'timestamp' => time(), // Current timestamp
                'message' => $log->getMessage(),
                // Add more log attributes as required by New Relic API
            ]
        ];

        $ch = curl_init($url);

        // Set the necessary curl options
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'X-License-Key: ' . $this->apiSecret // Updated API Secret
        ]);

        // Execute the cURL request
        $response = curl_exec($ch);

        // Get the HTTP response code
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Close the cURL session
        curl_close($ch);

        return $httpCode;
    }

    public function getSupportedTypes(): array
    {
        return [Log::TYPE_DEBUG, Log::TYPE_ERROR, Log::TYPE_INFO];
    }

    public function getSupportedEnvironments(): array
    {
        return [Logger::ENVIRONMENT_STAGING, Logger::ENVIRONMENT_PRODUCTION];
    }

    public function getSupportedBreadcrumbTypes(): array
    {
        return [Log::TYPE_WARNING, Log::TYPE_INFO];
    }
}


$adapter = new NewRelic('NRAK-0JUJGE6VL2WQE0SY25QX3GE0BLJ', 'AB8OBxwdPBURERsxPAQLH1dbMBQHGQYGXw==');
$log = new Log(Log::TYPE_DEBUG, 'This is a debug message');
$adapter->push($log);
