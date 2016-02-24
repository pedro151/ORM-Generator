<?php

namespace TestClasses\AdapterConfig;


class ZendFrameworkOneTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     */
    protected function setUp ()
    {
        parent::setUp (); // TODO: Change the autogenerated stub
    }

    protected static function getMethod ( $name )
    {
        $class = new \ReflectionClass( '\Classes\AdapterConfig\ZendFrameworkOne' );
        $method = $class->getMethod ( $name );
        $method->setAccessible ( true );

        return $method;
    }

    /**
     * IsValid  populado deve retornar True
     */
    public function testIsValidTrue ()
    {

        $config = array (
            'driver'   => 'pdo_pgsql',
            'host'     => 'localhost',
            'dbname'   => 'database',
            'username' => 'postgres',
            'password' => '123'
        );
        $obj = new \Classes\AdapterConfig\None( $config );

        $valid = self::getMethod ( 'isValid' );
        $resp = $valid->invoke ( $obj );
        $this->assertTrue ( $resp, " IsValid  populado deve retornar True" );
    }

    /**
     * Testa a Exception do construtor caso falte parametro
     */
    public function testException ()
    {
        $this->setExpectedException (
            'Classes\AdapterConfig\Exception',
            'As configurações a seguir são obrigatorias: driver, dbname, username, password'
        );

        $obj = $this->getMockBuilder ( '\Classes\AdapterConfig\ZendFrameworkOne' )
            ->setConstructorArgs ( array ( array () ) )
            ->setMethods ( array ( 'getParams' ) )
            ->getMock ();

        $obj->expects ( $this->any () )
            ->method ( 'getParams' )
            ->will ( $this->returnValue ( array () ) );
    }
}
