<?php

use Utopia\Logger\Adapter\NewRelic;
use Utopia\Logger\Log;
use Utopia\Logger\Logger;

class NewRelicTest extends LoggerTest
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->adapter = new NewRelic();
        $this->expected = 200; // Expected status code for successful log creation
    }

    public function testPush(): void
    {
        $log = new Log(Log::TYPE_DEBUG, 'This is a debug message');
        $response = $this->adapter->push($log);
        $this->assertEquals($this->expected, $response);
    }

    public function testSupportedTypes(): void
    {
        $supportedTypes = $this->adapter->getSupportedTypes();
        $this->assertContains(Log::TYPE_DEBUG, $supportedTypes);
        $this->assertContains(Log::TYPE_ERROR, $supportedTypes);
        $this->assertContains(Log::TYPE_INFO, $supportedTypes);
    }

    public function testSupportedEnvironments(): void
    {
        $supportedEnvironments = $this->adapter->getSupportedEnvironments();
        $this->assertContains('staging', Logger::ENVIRONMENT_STAGING, $supportedEnvironments);
        $this->assertContains('production', Logger::ENVIRONMENT_PRODUCTION, $supportedEnvironments);
    }

    public function testSupportedBreadcrumbTypes(): void
    {
        $supportedBreadcrumbTypes = $this->adapter->getSupportedBreadcrumbTypes();
        $this->assertContains(Log::TYPE_WARNING, $supportedBreadcrumbTypes);
        $this->assertContains(Log::TYPE_INFO, $supportedBreadcrumbTypes);
    }
}
