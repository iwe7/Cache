<?php

/**
 * This file is part of the perrosygatos proyect.
 *
 * Description of CacheTest
 *
 * @author : Daniel González Cerviño <daniel.gonzalez@freelancemadrid.es>
 * @file : CacheTest.php , UTF-8
 * @date : Sep 4, 2012 , 3:49:01 PM
 */

namespace Desarrolla2\Cache\Adapter\Test;

use Desarrolla2\Cache\Adapter\Test\AbstractCacheTest;
use Desarrolla2\Cache\Cache;
use Desarrolla2\Cache\Adapter\Apc;

class ApcCacheTest extends AbstractCacheTest
{

    /**
     * setup
     */
    public function setUp()
    {
        if (!extension_loaded('apc') || !ini_get('apc.enable_cli')) {
            $this->markTestSkipped(
                    'The APC extension is not available.'
            );
        }
        $this->cache = new Cache(new Apc());
    }

    /**
     * @return array
     */
    public function dataProviderForOptionsException()
    {
        return array(
            array('ttl', 0, '\Desarrolla2\Cache\Exception\ApcCacheException'),
            array('file', 100, '\Desarrolla2\Cache\Exception\ApcCacheException'),
        );
    }

}
