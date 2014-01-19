<?php
/**
 * ConnectorInterface.php
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
namespace MusicBrainz\Connector;

/**
 * ConnectorInterface
 * 
 * @category MusicBrainz
 * @package  MusicBrainz
 * @author   David White [monkeyphp] <david@monkeyphp.com>
 */
interface ConnectorInterface
{
    // resources
    const RESOURCE_ARTIST        = 'artist';
    const RESOURCE_LABEL         = 'label';
    const RESOURCE_RECORDING     = 'recording';
    const RESOURCE_RELEASE       = 'release';
    const RESOURCE_RELEASE_GROUP = 'release-group';
    const RESOURCE_WORK          = 'work';
    const RESOURCE_AREA          = 'area';
    const RESOURCE_URL           = 'url';
    
    // formats
    const FORMAT_JSON = 'json';
    const FORMAT_XML  = 'xml';
    
    // includes
    const INC_ARTISTS            = 'artists';
    const INC_RECORDINGS         = 'recordings';
    const INC_RELEASES           = 'releases';
    const INC_RELEASE_GROUPS     = 'release-groups';
    const INC_WORKS              = 'works';
    const INC_LABELS             = 'labels'; 
    const INC_TYPE               = 'type';
    const INC_STATUS             = 'status';
    
    const INC_DISCIDS         = 'discids';
    const INC_MEDIA           = 'media';
    const INC_ISRCS           = 'isrcs';
    const INC_ARTIST_CREDITS  = 'artist-credits';
    const INC_VARIOUS_ARTISTS = 'various-artists';
     
    const INC_ALIASES      = 'aliases';
    const INC_ANNOTATION   = 'annotation';
    const INC_TAGS         = 'tags';
    const INC_RATINGS      = 'ratings';
    const INC_USER_TAGS    = 'user-tags';
    const INC_USER_RATINGS = 'user-ratings';
      
    const INC_RECORD_LEVEL_RELS = 'recording-level-rels';
    const INC_WORK_LEVEL_RELS   = 'work-level-rels';
    
    const INC_REL_ARTIST         = 'artist-rels';
    const INC_REL_LABEL          = 'label-rels';
    const INC_REL_RECORDING      = 'recording-rels';
    const INC_REL_RELEASE        = 'release-rels';
    const INC_REL_RELEASE_GROUPS = 'release-group-rels';
    const INC_REL_URL            = 'url-rels';
    const INC_REL_WORK           = 'work-rels';
    
    
    
    const SEARCH_LIMIT_MIN      = 1;
    const SEARCH_LIMIT_MAX      = 100;
    const SEARCH_LIMIT_DEFAULT  = 25;
    const SEARCH_OFFSET_DEFAULT = 0;
    
    const PARAM_FORMAT   = 'fmt';
    const PARAM_INCLUDES = 'inc';
    const PARAM_LIMIT    = 'limit';
    const PARAM_OFFSET   = 'offset';
    const PARAM_QUERY    = 'query';
    const PARAM_STATUS   = 'status';
    const PARAM_TYPE     = 'type';
    const PARAM_TOC      = 'toc';
    
    const STATUS_OFFICIAL       = 'official';
    const STATUS_PROMOTION      = 'promotion';
    const STATUS_BOOTLEG        = 'bootleg';
    const STATUS_PSEUDO_RELEASE = 'pseudo-release';
    
    const TYPE_NAT         = 'nat';
    const TYPE_ALBUM       = 'album';
    const TYPE_SINGLE      = 'single';
    const TYPE_EP          = 'ep';
    const TYPE_COMPILATION = 'compilation';
    const TYPE_SOUNDTRACK  = 'soundtrack';
    const TYPE_SPOKENWORD  = 'spokenword';
    const TYPE_INTERVIEW   = 'interview';
    const TYPE_AUDIOBOOK   = 'audiobook';
    const TYPE_LIVE        = 'live';
    const TYPE_REMIX       = 'remix';
    const TYPE_OTHER       = 'other';
    
    
    public function browse($mbid, $options = array());
    
    public function lookup($mbid, $options = array());
    
    public function search($options = array());
}
