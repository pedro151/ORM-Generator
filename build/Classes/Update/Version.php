<?php
namespace Classes\Update;

use Classes\Update\Content\GitHub;

require_once 'Content/GitHub.php';
require_once 'ProtocolFileContent.php';

class Version
{
    private static $_currentVersion = "1.4.0";

    private static $lastVersion;

    public function getVersion ()
    {
        return static::$_currentVersion;
    }

    public function HasNewVersion ()
    {
        $this->lastVersion = GitHub::getInstance ()->getLastVersion ();

        return $this->lastVersion > static::$_currentVersion;
    }

    public function checkHasNewVersion ()
    {
        if ( $this->HasNewVersion () )
        {
            return "\033[0;31mThere is a new version {$this->lastVersion} available\033[0m \n";
        }
    }

}