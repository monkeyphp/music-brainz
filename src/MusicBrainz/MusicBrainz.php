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

use Exception;
use InvalidArgumentException;
use MusicBrainz\Connector\ConnectorInterface;
use MusicBrainz\Connector\Factory\ConnectorFactory;
use MusicBrainz\Connector\Factory\ConnectorFactoryInterface;
use MusicBrainz\Entity\ArtistSearch;
use MusicBrainz\Identity\Identity;

/**
 * MusicBrainz
 *
 * @link http://musicbrainz.org/doc/Development/XML_Web_Service/Version_2/Search
 * @link http://musicbrainz.org/doc/XML_Web_Service/Rate_Limiting
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
     * Instance of Identity used to identity the application to the
     * MusicBrainz web service
     *
     * @var Identity
     */
    protected $identity;

    /**
     * Constructor
     *
     * @param array|Identity $identity An instance of Identity or an array
     *
     * @return void
     */
    public function __construct($identity)
    {
        $this->setIdentity($identity);
    }

    /**
     * Set the Identity instance
     *
     * @param string|array|Identity $identity
     *
     * @throws InvalidArgumentException
     * @return MusicBrainz
     */
    protected function setIdentity($identity)
    {
        if ($identity instanceof Identity) {
            $this->identity = $identity;
            return $this;
        }

        $name = $version = $contact = null;

        if (is_string($identity)) {
            $name = $identity;
        }
        if (is_array($identity)) {
            $name    = (isset($identity['name'])) ? $identity['name'] : null;
            $version = (isset($identity['version'])) ? $identity['version'] : null;
            $contact = (isset($identity['contact'])) ? $identity['contact'] : null;
        }
        try {
            $identity = new Identity($name, $version, $contact);
            $this->identity = $identity;
            return $this;
        } catch (\Exception $exception) {
            throw new InvalidArgumentException(
                'An instance of Identity could not be constructed from the supplied parameters',
                null,
                $exception
            );
        }
    }

    /**
     * Return the Identity instance
     *
     * @return Identity
     */
    protected function getIdentity()
    {
        // @codeCoverageIgnoreStart
        return $this->identity;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Return an instance of ConnectorFactory
     *
     * @return ConnectorFactoryInterface
     */
    public function getConnectorFactory()
    {
        if (! isset($this->connectorFactory)) {
            $this->connectorFactory = new ConnectorFactory($this->getIdentity());
        }
        return $this->connectorFactory;
    }

    /**
     * Browse the details of a specific resource
     *
     * @param string $resource The name of the resource
     * @param string $mbid     The mbid of the resource
     * @param array  $options  An array of browse options
     *
     * @return \MusicBrainz\Entity
     */
    public function browse($resource, $mbid, $options = array())
    {
        try {
            $connector = $this->getConnectorFactory()->getConnector($resource);
            return $connector->browse($mbid, $options);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Lookup a resource
     *
     * @param string $resource The name of the resource
     * @param string $mbid     The mbid of the resource
     * @param array  $options  An array of browse options
     *
     * @return \MusicBrainz\Entity
     */
    public function lookup($resource, $mbid, $options = array())
    {
        try {
            $connector = $this->getConnectorFactory()->getConnector($resource);
            return $connector->lookup($mbid, $options);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Search a resource
     *
     * The supplied resource should be one of the following:
     * - area
     * - artist
     * - label
     * - recording
     * - release
     * - release-group
     *
     * @param string $resource The resource to search
     * @param string $query    The search query string
     * @param array  $options  An array of search options
     *
     * @return \MusicBrainz\Entity
     */
    public function search($resource, $query, $options = array())
    {
        try {
            $connector = $this->getConnectorFactory()->getConnector($resource);
            return $connector->search($query, $options);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Search for an Artist
     *
     * @param string $query   The Lucene query string
     * @param array  $options An optional array of options
     *
     * @return ArtistSearch
     */
    public function searchArtist($query, $options = array())
    {
        return $this->search(ConnectorInterface::RESOURCE_ARTIST, $query, $options);
    }

    /**
     * Search for an Area
     *
     * @param string $query   The Lucene query string
     * @param array  $options An optional array of options
     *
     * @return AreaSearch
     */
    public function searchArea($query, $options = array())
    {
        return $this->search(ConnectorInterface::RESOURCE_AREA, $query, $options);
    }

    /**
     * Search for a Label
     *
     * @param string $query   The Lucene query string
     * @param array  $options An optional array of options
     *
     * @return LabelSearch
     */
    public function searchLabel($query, $options = array())
    {
        return $this->search(ConnectorInterface::RESOURCE_LABEL, $query, $options);
    }

    /**
     * Search for a Recording
     *
     * @param string $query   The Lucene query string
     * @param array  $options An optional array of options
     *
     * @return RecordingSearch
     */
    public function searchRecording($query, $options = array())
    {
        return $this->search(ConnectorInterface::RESOURCE_RECORDING, $query, $options);
    }

    /**
     * Search for a Url
     *
     * @param string $query   The Lucene query string
     * @param array  $options An optional array of options
     *
     * @return UrlSearch
     */
    public function searchUrl($query, $options = array())
    {
        return $this->search(ConnectorInterface::RESOURCE_URL, $query, $options);
    }

    /**
     * Search for a Work
     *
     * @param string $query   The Lucene query string
     * @param array  $options An optional array of options
     *
     * @return WorkSearch
     */
    public function searchWork($query, $options = array())
    {
        return $this->search(ConnectorInterface::RESOURCE_WORK, $query, $options);
    }

    /**
     * Search for a Release
     *
     * @param string $query   The Lucene query string
     * @param array  $options An optional array of options
     *
     * @return ReleaseSearch
     */
    public function searchRelease($query, $options = array())
    {
        return $this->search(ConnectorInterface::RESOURCE_RELEASE, $query, $options);
    }

    /**
     * Search for a ReleaseGroup
     *
     * @param string $query   The Lucene query string
     * @param array  $options An optional array of options
     *
     * @return ReleaseGroupSearch
     */
    public function searchReleaseGroup($query, $options = array())
    {
        return $this->search(ConnectorInterface::RESOURCE_RELEASE_GROUP, $query, $options);
    }


//    public function lookupArtist($mbid, $options = array()) {}
//    public function lookupArea($mbid, $options = array()) {}
//    public function lookupLabel($mbid, $options = array()) {}
//    public function lookupRecording($mbid, $options = array()) {}
//    public function lookupUrl($mbid, $options = array()) {}
//    public function lookupWork($mbid, $options = array()) {}
//    public function lookupRelease($mbid, $options = array()) {}
//    public function lookupReleaseGroup($mbid, $options = array()) {}
//
//    public function browseArtist($mbid, $options = array()) {}
//    public function browseArea($mbid, $options = array()) {}
//    public function browseLabel($mbid, $options = array()) {}
//    public function browseRecording($mbid, $options = array()) {}
//    public function browseUrl($mbid, $options = array()) {}
//    public function browseWork($mbid, $options = array()) {}
//    public function browseRelease($mbid, $options = array()) {}
//    public function browseReleaseGroup($mbid, $options = array()) {}

}