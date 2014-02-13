<?php
/**
 * ArtistConnector.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Connector
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
namespace MusicBrainz\Connector;

/**
 * ArtistConnector
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Connector
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class ArtistConnector extends AbstractConnector
{


    protected $includes = array(
        ConnectorInterface::INC_ARTISTS,
        ConnectorInterface::INC_RECORDINGS,
        ConnectorInterface::INC_RELEASES,
        ConnectorInterface::INC_RELEASE_GROUPS,
        ConnectorInterface::INC_WORKS,
        ConnectorInterface::INC_VARIOUS_ARTISTS,
        ConnectorInterface::INC_ALIASES,
        ConnectorInterface::INC_ANNOTATION,
        ConnectorInterface::INC_TAGS,
        ConnectorInterface::INC_RATINGS,
        ConnectorInterface::INC_USER_TAGS,
        ConnectorInterface::INC_USER_RATINGS,
        ConnectorInterface::INC_REL_LABEL,
        ConnectorInterface::INC_REL_RECORDING,
        ConnectorInterface::INC_REL_RELEASE,
        ConnectorInterface::INC_REL_RELEASE_GROUPS,
        ConnectorInterface::INC_REL_URL,
        ConnectorInterface::INC_REL_WORK,
    );

    /**
     * The name of the resource that this Connector handles
     *
     * @var string
     */
    protected $resource = ConnectorInterface::RESOURCE_ARTIST;

    /**
     * The classname for search results
     *
     * @var string
     */
    protected $searchStrategyClassname = 'MusicBrainz\Hydrator\Strategy\ArtistSearchStrategy';

    /**
     * The classname for lookup results
     *
     * @var string
     */
    protected $lookupStrategyClassname = 'MusicBrainz\Hydrator\Strategy\ArtistLookupStrategy';
}
