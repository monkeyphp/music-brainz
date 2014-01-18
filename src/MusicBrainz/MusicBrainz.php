<?php
/**
 * MusicBrainz.php
 * 
 * @category MusicBrainz
 * @package  MusicBrainz
 * @author   David White [monkeyphp] <david@monkeyphp.com>
 * 
 * Copyright (C) 2014  David White
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see [http://www.gnu.org/licenses/].
 */
namespace MusicBrainz;

use MusicBrainz\Connector\Factory\ConnectorFactory;
use MusicBrainz\Connector\Factory\ConnectorFactoryInterface;

/**
 * MusicBrainz
 *
 * @category MusicBrainz
 * @package  MusicBrainz
 * @author   David White [monkeyphp] <david@monkeyphp.com>
 */
class MusicBrainz implements MusicBrainzInterface
{
    /**
     * Instance of ConnectorFactoryInterface
     * 
     * @var ConnectorFactoryInterface
     */
    protected $connectorFactory;
    
    /**
     * Return an instance of ConnectorFactory
     * 
     * @return ConnectorFactory
     */
    public function getConnectorFactory()
    {
        if (! isset($this->connectorFactory)) {
            $this->connectorFactory = new ConnectorFactory();
        }
        return $this->connectorFactory;
    }
    
    public function browse($options = array())
    {
        
    }

    public function lookup($options = array())
    {
        
    }

    public function search($options = array())
    {
        
    }
}
