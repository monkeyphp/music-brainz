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
    
    /**
     * Browse the MusicBrainz api
     * 
     * @param string $resource
     * @param string $mbid
     * @param array $options
     * 
     * @return \MusicBrainz\Entity
     * @throws Exception
     */
    public function browse($resource, $mbid, $options = array())
    {
        try {
            $connector = $this->getConnectorFactory()->getConnector($resource);
            return $connector->browse($mbid, $options);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
    
    /**
     * Lookup a resource
     * 
     * @param string $resource
     * @param string $mbid
     * @param array  $options
     * 
     * @return \MusicBrainz\Entity
     * @throws Exception
     */
    public function lookup($resource, $mbid, $options = array())
    {
        try {
            $connector = $this->getConnectorFactory()->getConnector($resource);
            return $connector->lookup($mbid, $options);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Search a resource
     * 
     * @param string $resource
     * @param string $query
     * @param array  $options
     * 
     * @return \MusicBrainz\Entity
     * @throws Exception
     */
    public function search($resource, $query, $options = array())
    {
        try {
            $connector = $this->getConnectorFactory()->getConnector($resource);
            return $connector->search($query, $options);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
