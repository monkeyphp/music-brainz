<?php
/**
 * ConnectorInterface.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz
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
 * ConnectorInterface
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
interface ConnectorInterface
{
    /**
     * Note that the number of linked entities returned is always limited to 25,
     * if you need the remaining results, you will have to perform a
     * browse request.
     *
     * Linked entities are always ordered alphabetically by gid.
     *
     * @var int
     */
    const MAX_LINKED_ENTITIES = 25;

    /**
     * Resource artist
     *
     * @var string
     */
    const RESOURCE_ARTIST = 'artist';

    /**
     * Resource label
     *
     * @var string
     */
    const RESOURCE_LABEL = 'label';

    /**
     * Resource recording
     *
     * @var string
     */
    const RESOURCE_RECORDING = 'recording';

    /**
     * Resource release
     *
     * @var string
     */
    const RESOURCE_RELEASE = 'release';

    /**
     * Resource release group
     *
     * @var string
     */
    const RESOURCE_RELEASE_GROUP = 'release-group';

    /**
     * Resource work
     *
     * @var string
     */
    const RESOURCE_WORK = 'work';

    /**
     * Resource area
     *
     * @var string
     */
    const RESOURCE_AREA = 'area';

    /**
     * Resource url
     *
     * @var string
     */
    const RESOURCE_URL = 'url';

    /**
     * Resource resource
     *
     * @var string
     */
    const RESOURCE_RESOURCE = 'resource';

    /**
     * Resource rating
     *
     * @var string
     */
    const RESOURCE_RATING = 'rating';

    /**
     * Resource tag
     *
     * @var string
     */
    const RESOURCE_TAG = 'tag';

    /**
     * Resource collection
     *
     * @var string
     */
    const RESOURCE_COLLECTION = 'collection';

    /**
     * Resource discid
     *
     * @var string
     */
    const RESOURCE_DISCID = 'discid';

    /**
     * Resource isrc
     *
     * @var string
     */
    const RESOURCE_ISRC = 'isrc';

    /**
     * Resource iswc
     *
     * @var string
     */
    const RESOURCE_ISWC = 'iswc';

    /**
     * Format json
     *
     * @var string
     */
    const FORMAT_JSON = 'json';

    /**
     * Format xml
     *
     * @var string
     */
    const FORMAT_XML  = 'xml';

    /**
     * Include recordings
     *
     * @var string
     */
    const INC_RECORDINGS = 'recordings';

    /**
     * Include releases
     *
     * @var string
     */
    const INC_RELEASES = 'releases';

    /**
     * Include release groups
     *
     * @var string
     */
    const INC_RELEASE_GROUPS = 'release-groups';

    /**
     * Include the works
     *
     * @var string
     */
    const INC_WORKS = 'works';

    /**
     * Include the artists
     *
     * @var string
     */
    const INC_ARTISTS = 'artists';

    /**
     * Include labels
     *
     * @var string
     */
    const INC_LABELS = 'labels';

    /**
     * Include type
     *
     * @var string
     */
    const INC_TYPE = 'type';

    /**
     * Include status
     *
     * @var string
     */
    const INC_STATUS = 'status';

    /**
     * Include discids
     *
     * include discids for all media in the releases
     *
     * @var string
     */
    const INC_DISCIDS = 'discids';

    /**
     * Include media
     *
     * include media for all releases, this includes the # of
     * tracks on each medium and its format.
     *
     * @var string
     */
    const INC_MEDIA = 'media';

    /**
     * Include isrcs
     *
     * include isrcs for all recordings
     *
     * @var string
     */
    const INC_ISRCS = 'isrcs';

    /**
     * Include artist credits
     *
     * include artists credits for all releases and recordings
     *
     * @var string
     */
    const INC_ARTIST_CREDITS  = 'artist-credits';

    /**
     * Include various artists
     *
     * include only those releases where the artist appears on one of the
     * tracks, but not in the artist credit for the release itself
     * (this is only valid on a /ws/2/artist?inc=releases request).
     *
     * @var string
     */
    const INC_VARIOUS_ARTISTS = 'various-artists';

    /**
     * Include aliases
     *
     * include artist, label, area or work aliases; treat these as a set,
     * as they are not deliberately ordered
     *
     * @var string
     */
    const INC_ALIASES = 'aliases';

    /**
     * Include annotation
     *
     * @var string
     */
    const INC_ANNOTATION = 'annotation';

    /**
     * Include tags
     *
     * include tags and/or ratings for the entity (not valid on releases)
     *
     * @var string
     */
    const INC_TAGS = 'tags';

    /**
     * Include ratings
     *
     * @var string
     */
    const INC_RATINGS = 'ratings';

    /**
     * Include user tags
     *
     * Requests with user-tags or user-ratings require authentication.
     * You can authenticate using HTTP Digest, use the same username and
     * password used to access the main http://musicbrainz.org website.
     *
     * @var string
     */
    const INC_USER_TAGS = 'user-tags';

    /**
     * Include user ratings
     *
     * @var string
     */
    const INC_USER_RATINGS = 'user-ratings';

    /**
     * Include artist relationships
     *
     * @var string
     */
    const INC_RELS_ARTIST = 'artist-rels';

    /**
     * Include label relationships
     *
     * @var string
     */
    const INC_RELS_LABEL = 'label-rels';

    /**
     * Include recording relationships
     *
     * @var string
     */
    const INC_RELS_RECORDING = 'recording-rels';

    /**
     * Include release relationships
     *
     * @var string
     */
    const INC_RELS_RELEASE = 'release-rels';

    /**
     * Include release group relationships
     *
     * @var string
     */
    const INC_RELS_RELEASE_GROUPS = 'release-group-rels';

    /**
     * Include url relationships
     *
     * @var string
     */
    const INC_RELS_URL = 'url-rels';

    /**
     * Include work relationships
     *
     * @var string
     */
    const INC_RELS_WORK = 'work-rels';

    /**
     * Include record level relationships
     *
     * @var string
     */
    const INC_RELS_RECORD_LEVEL = 'recording-level-rels';

    /**
     * Include work relationships
     *
     * @var string
     */
    const INC_RELS_WORK_LEVEL = 'work-level-rels';

    /**
     * Search limit min
     *
     * The minimum number of records that can be returned in a search query
     *
     * @var int
     */
    const SEARCH_LIMIT_MIN = 1;

    /**
     * Search limit max
     *
     * The maximum number of records that can be returned in search query
     *
     * @var int
     */
    const SEARCH_LIMIT_MAX = 100;

    /**
     * Search limit default
     *
     * The default number of records to return in a search query
     *
     * @var int
     */
    const SEARCH_LIMIT_DEFAULT = 25;

    /**
     * The default offset value
     *
     * @var int
     */
    const SEARCH_OFFSET_DEFAULT = 0;

    /**
     * Separator used to separate the inc arguments
     *
     * To include more than one subquery in a single request, separate the
     * arguments to inc= with a + (plus sign), like inc=recordings+labels.
     *
     * @var string
     */
    const PARAM_INC_SEPARATOR = '+';

    /**
     * Param format
     *
     * @var string
     */
    const PARAM_FORMAT = 'fmt';

    /**
     * Param include
     *
     * @param string
     */
    const PARAM_INCLUDES = 'inc';

    /**
     * Param limit
     *
     * @param string
     */
    const PARAM_LIMIT = 'limit';

    /**
     * Param offset
     *
     * @var string
     */
    const PARAM_OFFSET = 'offset';

    /**
     * Param query
     *
     * @var string
     */
    const PARAM_QUERY = 'query';

    /**
     * Param status
     *
     * @var string
     */
    const PARAM_STATUS = 'status';

    /**
     * Param type
     *
     * @var string
     */
    const PARAM_TYPE = 'type';

    /**
     * Param table of contents
     *
     * @var string
     */
    const PARAM_TOC = 'toc';

    /**
     * Status official
     *
     * @var string
     */
    const STATUS_OFFICIAL = 'official';

    /**
     * Status promotion
     *
     * @var string
     */
    const STATUS_PROMOTION = 'promotion';

    /**
     * Status bootleg
     *
     * @var string
     */
    const STATUS_BOOTLEG = 'bootleg';

    /**
     * Status pseudo release
     *
     * @var string
     */
    const STATUS_PSEUDO_RELEASE = 'pseudo-release';

    /**
     * Type nat
     *
     * @var string
     */
    const TYPE_NAT = 'nat';

    /**
     * Type album
     *
     * @var string
     */
    const TYPE_ALBUM = 'album';

    /**
     * Type single
     *
     * @var string
     */
    const TYPE_SINGLE = 'single';

    /**
     * Type ep
     *
     * @var string
     */
    const TYPE_EP = 'ep';

    /**
     * Type compilation
     *
     * @var string
     */
    const TYPE_COMPILATION = 'compilation';

    /**
     * Type soundtrack
     *
     * @var string
     */
    const TYPE_SOUNDTRACK  = 'soundtrack';

    /**
     * Type spokenword
     *
     * @var string
     */
    const TYPE_SPOKENWORD  = 'spokenword';

    /**
     * Type interview
     *
     * @var string
     */
    const TYPE_INTERVIEW   = 'interview';

    /**
     * Type audiobook
     *
     * @var string
     */
    const TYPE_AUDIOBOOK = 'audiobook';

    /**
     * Type live
     *
     * @var string
     */
    const TYPE_LIVE = 'live';

    /**
     * Type remix
     *
     * @var string
     */
    const TYPE_REMIX = 'remix';

    /**
     * Type other
     *
     * @var string
     */
    const TYPE_OTHER = 'other';

    /**
     * The maximum number of requests that can be made per second
     *
     * All users of the XML web service must ensure that each of their
     * client applications never make more than ONE web service call per second.
     *
     * @var int
     */
    const MAX_REQUESTS_PER_SECOND = 1;

    /**
     * Browse a resource by supplying an mbid
     *
     * @param string $mbid    The MBID of the resource
     * @param array  $options An array of options
     *
     * @return \MusicBrainz\Entity
     */
    public function browse($mbid, $options = array());

    /**
     * Lookup a resource by supplying an mbid
     *
     * @param string $mbid    The MBID of the resource
     * @param array  $options An array of options
     *
     * @return \MusicBrainz\Entity
     */
    public function lookup($mbid, $options = array());

    /**
     * Search for a resource by supplying a query string
     *
     * @param string $query   A lucene query string
     * @param array  $options An array of options
     *
     * @return \MusicBrainz\Entity
     */
    public function search($query, $options = array());
}
