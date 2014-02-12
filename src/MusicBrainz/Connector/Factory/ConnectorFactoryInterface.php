<?php
/**
 * ConnectorFactoryInterface.php
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

/**
 * ConnectorFactoryInterface
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Connector\Factory
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
interface ConnectorFactoryInterface
{
    /**
     * Return an instance of AreaConnectorInterface
     *
     * @return AreaConnectorInterface
     */
    public function getAreaConnector();

    /**
     * Return an instance of ArtistConnectorInterface
     *
     * @return ArtistConnectorInterface
     */
    public function getArtistConnector();

    /**
     * Return an instance of LabelConnectorInterface
     *
     * @return LabelConnectorInterface
     */
    public function getLabelConnector();

    /**
     * Return an instance of RecordingConnectorInterface
     *
     * @return RecordingConnectorInterface
     */
    public function getRecordingConnector();

    /**
     * Return an instance of ReleaseConnectorInterface
     *
     * @return ReleaseConnectorInterface
     */
    public function getReleaseConnector();

    /**
     * Return an instance of ReleaseGroupConnectorInterface
     *
     * @return ReleaseGroupConnectorInterface
     */
    public function getReleaseGroupConnector();

    /**
     * Return an instance of WorkConnectorInterface
     *
     * @return WorkConnectorInterface
     */
    public function getWorkConnector();

    /**
     * Return an instance of UrlConnectorInterface
     *
     * @return UrlConnectorInterface
     */
    public function getUrlConnector();
}
