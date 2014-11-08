<?php

class MysqliTest extends PHPUnit_Framework_TestCase
{
    private function getEnvConfig()
    {
        $config = [
            'hostname' => @$_ENV['PHPUNIT_TEST_HOSTNAME'],
            'database' => @$_ENV['PHPUNIT_TEST_DATABASE'],
            'username' => @$_ENV['PHPUNIT_TEST_USERNAME'],
            'password' => @$_ENV['PHPUNIT_TEST_PASSWORD'],
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
