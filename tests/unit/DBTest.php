<?php

use Ohanzee\DB;
use Ohanzee\Database;

class DBTest extends PHPUnit_Framework_TestCase
{
    public function providerFactoryQuery()
    {
        return [
            'insert' => [Database::INSERT, 'INSERT'],
            'select' => [Database::SELECT, 'SELECT'],
            'update' => [Database::UPDATE, 'UPDATE'],
            'delete' => [Database::SELECT, 'DELETE'],
        ];
    }

    /**
     * @dataProvider providerFactoryQuery
     */
    public function testFactoryQuery($type, $sql)
    {
        $query = DB::query($type, $sql);
        $this->assertInstanceOf('Ohanzee\Database\Query', $query);
    }

    public function testSelectQuery()
    {
        $query = DB::select();
        $this->assertInstanceOf('Ohanzee\Database\Query\Builder\Select', $query);

        $query = DB::select_array();
        $this->assertInstanceOf('Ohanzee\Database\Query\Builder\Select', $query);
    }

    public function testInsertQuery()
    {
        $query = DB::insert();
        $this->assertInstanceOf('Ohanzee\Database\Query\Builder\Insert', $query);
    }

    public function testUpdateQuery()
    {
        $query = DB::update();
        $this->assertInstanceOf('Ohanzee\Database\Query\Builder\Update', $query);
    }

    public function testDeleteQuery()
    {
        $query = DB::delete();
        $this->assertInstanceOf('Ohanzee\Database\Query\Builder\Delete', $query);
    }

    public function testExpression()
    {
        $expr = DB::expr('1=1');
        $this->assertInstanceOf('Ohanzee\Database\Expression', $expr);
    }
}
