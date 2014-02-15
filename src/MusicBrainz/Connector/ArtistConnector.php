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

    protected $searchFields = array(
        'area',         // artist area
        'beginarea',    // artist begin area
        'endarea',      // artist end area
        'arid',         // MBID of the artist
        'artist',       // name of the artist
        'artistaccent',	// name of the artist with any accent characters retained
        'alias',        // the aliases/misspellings for the artist
        'begin',        // artist birth date/band founding date
        'comment',      // artist comment to differentiate similar artists
        'country',      // the two letter country code for the artist country or 'unknown'
        'end',          // artist death date/band dissolution date
        'ended',        // true if know ended even if do not know end date
        'gender',       // gender of the artist (“male”, “female”, “other”)
        'ipi',          // IPI code for the artist
        'sortname',     // artist sortname
        'tag',          // a tag applied to the artist
        'type',         // artist type (“person”, “group”, "other" or “unknown”)
    );

    /**
     * Array of includes
     *
     * @var array
     */
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
        ConnectorInterface::INC_RELS_LABEL,
        ConnectorInterface::INC_RELS_RECORDING,
        ConnectorInterface::INC_RELS_RELEASE,
        ConnectorInterface::INC_RELS_RELEASE_GROUPS,
        ConnectorInterface::INC_RELS_URL,
        ConnectorInterface::INC_RELS_WORK,
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
