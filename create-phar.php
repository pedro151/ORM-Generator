<?php
define ( 'PREFIX', 'orm-generator' );
define ( 'PHAR_FILE', PREFIX . '.phar' );
define ( 'PHAR_OUTPUT', 'bin' . DIRECTORY_SEPARATOR . PHAR_FILE );
define ( 'DEFAULT_STUB', 'phar-generate.php' );
define ( 'BUILD_DIR', realpath ( __DIR__ . '/build' ) );
define ( 'INCLUDE_EXTENSION', '/\.php$/' );

try
{
    if ( file_exists ( PHAR_OUTPUT ) )
    {
        unlink ( PHAR_OUTPUT );
    }

    /****************************************
     * phar file creation
     ****************************************/
    $tarphar = new Phar( PHAR_OUTPUT );
    $phar = $tarphar->convertToExecutable ( Phar::PHAR );
    $phar->startBuffering ();
    $phar->buildFromDirectory ( BUILD_DIR, INCLUDE_EXTENSION );
    $stub = $phar->createDefaultStub ( DEFAULT_STUB );
    $phar->setStub ( "#!/usr/bin/php\n" . $stub );
    $phar->stopBuffering ();


}
catch ( Exception $e )
{
    echo $e;
}