<?php

class MysqliTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        Dotenv::load(realpath(__DIR__ . '/../../'));
    }

    private function getEnvConfig()
    {
        $config = [
            'hostname' => getenv('PHPUNIT_TEST_HOSTNAME'),
            'database' => getenv('PHPUNIT_TEST_DATABASE'),
            'username' => getenv('PHPUNIT_TEST_USERNAME'),
            'password' => getenv('PHPUNIT_TEST_PASSWORD'),
        ];

        return array_filter($config);
    }

    public function providerConfig()
    {
        return [
            [
                'test', [
                    'charset'    => 'utf8',
                    'connection' => $this->getEnvConfig() + [
                        'hostname' => 'localhost',
                        'database' => 'ohanzee',
                        'username' => 'ohanzee',
                        'password' => false,
                    ],
                ]
            ],
        ];
    }

    /**
     * @dataProvider providerConfig
     */
    public function testCanConnect($name, $config)
    {
        $db = new Database_MySQLi($name, $config);

        $this->assertEquals(true, $db->connect());
    }
}
