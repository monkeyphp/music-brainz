<?php
/**
 * ConnectoryFactory.php
 * 
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Connector\Factory
 * @author     David White [monkeyphp] <david@monkeyphp.com>
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
namespace MusicBrainz\Connector\Factory;

use MusicBrainz\Connector\ArtistConnectorInterface;

/**
 * ConnectorFactory
 * 
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Connector\Factory
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class ConnectorFactory implements ConnectorFactoryInterface
{
    /**
     * Instance of ArtistConnectorInterface
     * 
     * @var ArtistConnectorInterface
     */
    protected $artistConnector;
    
    /**
     * Return an instance of ArtistConnectorInterface
     * 
     * @return ArtistConnectorInterface
     */
    public function getArtistConnector()
    {
        if (! isset($this->artistConnector)) {
            $this->artistConnector = new ArtistConnector();
        }
        return $this->artistConnector;
    }
}