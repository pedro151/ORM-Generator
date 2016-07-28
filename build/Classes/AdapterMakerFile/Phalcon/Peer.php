<?php

namespace Classes\AdapterMakerFile\Phalcon;

use Classes\AdapterMakerFile\AbstractAdapter;

/**
 * @author Pedro Alarcao <phacl151@gmail.com>
 * @link   https://github.com/pedro151/orm-generator
 */
class Peer extends AbstractAdapter
{
    /**
     * @var void
     */
    public    $pastName      = 'Peer';
    protected $parentClass   = "AbstractPeer";
    protected $parentFileTpl = "peer_abstract.php";
    protected $fileTpl       = "peer.php";
    protected $overwrite     = true;

    public function parseRelation ( \Classes\MakerFile $makerFile, \Classes\Db\DbTable $dbTable )
    {
        return array ();
    }
}