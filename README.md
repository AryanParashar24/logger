Hacktoberfest23: PR for raising issue and help to the problem faced while contributing to the 🚨Improve Appwrite Logging with New Relic Adapter #4209

## Continuing the issue 
🚨 Improve Appwrite Logging with New Relic Adapter #4209 

### 👟 Reproduction steps

After making up all the files and entering all the API endpoints, secret keys, logHosts and all the access tokens form different platforms, once we get to design the tests as well when it comes to testing em all from the terminal command line with the command:

`vendor/bin/phpunit`

we get 4 errors as specified in the terminal as:

````
PHPUnit 9.6.13 by Sebastian Bergmann and contributors.

...EE.E....E                                                      12 / 12 (100%)

Time: 00:00.013, Memory: 6.00 MB

There were 4 errors:

1) LoggerTest::testAdapters
Exception: The '' DSN must contain a scheme, a host, a user and a path component.

/home/aryan2407/Hacktoberfest23/Appwrite/logger/src/Logger/Adapter/Sentry.php:49
/home/aryan2407/Hacktoberfest23/Appwrite/logger/tests/LoggerTest.php:159

2) NewRelicTest::testPush
Error: Typed property Utopia\Logger\Log::$message must not be accessed before initialization

/home/aryan2407/Hacktoberfest23/Appwrite/logger/src/Logger/Log.php:165
/home/aryan2407/Hacktoberfest23/Appwrite/logger/src/Logger/Adapter/NewRelic.php:30
/home/aryan2407/Hacktoberfest23/Appwrite/logger/src/Logger/Adapter/NewRelic.php:77
/home/aryan2407/Hacktoberfest23/Appwrite/logger/tests/e2e/Adapter/NewRelicTest.php:12

3) NewRelicTest::testSupportedEnvironments
Error: Undefined constant Utopia\Logger\Logger::ENVIRONMENT_STAGING

/home/aryan2407/Hacktoberfest23/Appwrite/logger/src/Logger/Adapter/NewRelic.php:65
/home/aryan2407/Hacktoberfest23/Appwrite/logger/tests/e2e/Adapter/NewRelicTest.php:33

4) NewRelicTest::testAdapters
Exception: The '' DSN must contain a scheme, a host, a user and a path component.

/home/aryan2407/Hacktoberfest23/Appwrite/logger/src/Logger/Adapter/Sentry.php:49
/home/aryan2407/Hacktoberfest23/Appwrite/logger/tests/LoggerTest.php:159

ERRORS!
Tests: 12, Assertions: 79, Errors: 4.
````



### 👍 Expected behavior

It should have Runed successfully after fixing all the problems in the code base or atleast should have changed the situations a bit,

### 👎 Actual Behavior

The output being given by the terminal didn't changed & continued to point out the same errors..

### 🎲 Appwrite version

Appwrite Cloud

### 💻 Operating system

Linux

### 🧱 Your Environment

_No response_

### 👀 Have you spent some time to check if this issue has been raised before?

- [X] I checked and didn't find similar issue

### 🏢 Have you read the Code of Conduct?

- [X] I have read the [Code of Conduct](https://github.com/appwrite/.github/blob/main/CODE_OF_CONDUCT.md)

