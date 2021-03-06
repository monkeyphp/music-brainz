<?php
/**
 * ConnectorFactory.php
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

use InvalidArgumentException;
use MusicBrainz\Connector\AbstractConnector;
use MusicBrainz\Connector\AreaConnector;
use MusicBrainz\Connector\ArtistConnector;
use MusicBrainz\Connector\ConnectorInterface;
use MusicBrainz\Connector\LabelConnector;
use MusicBrainz\Connector\RecordingConnector;
use MusicBrainz\Connector\ReleaseConnector;
use MusicBrainz\Connector\ReleaseGroupConnector;
use MusicBrainz\Connector\UrlConnector;
use MusicBrainz\Connector\WorkConnector;
use MusicBrainz\Identity\Identity;

/**
 * ConnectorFactory
 *
 * ConnectorFactory is responisble for returning configured instances of
 * ConnectorInterface
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Connector\Factory
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class ConnectorFactory implements ConnectorFactoryInterface
{
    /**
     * Instance of AreaConnector
     *
     * @var AreaConnector
     */
    protected $areaConnector;

    /**
     * Instance of ArtistConnector
     *
     * @var ArtistConnector
     */
    protected $artistConnector;

    /**
     * Instance of LabelConnector
     *
     * @var LabelConnector
     */
    protected $labelConnector;

    /**
     * Instance of RecordingConnector
     *
     * @var RecordingConnector
     */
    protected $recordingConnector;

    /**
     * Instance of ReleaseConnector
     *
     * @var ReleaseConnector
     */
    protected $releaseConnector;

    /**
     * Instance of ReleaseGroupConnector
     *
     * @var ReleaseGroupConnector
     */
    protected $releaseGroupConnector;

    /**
     * Instance of UrlConnector
     *
     * @var UrlConnector
     */
    protected $urlConnector;

    /**
     * Instance of WorkConnector
     *
     * @var WorkConnector
     */
    protected $workConnector;

    /**
     * Instance of Identity
     *
     * @var Identity
     */
    protected $identity;

    /**
     * Constructor
     *
     * @param Identity $identity
     *
     * @return void
     */
    public function __construct(Identity $identity)
    {
        $this->setIdentity($identity);
    }

    /**
     * Return the instance of Identity
     *
     * @return Identity
     */
    public function getIdentity()
    {
        // @codeCoverageIgnoreStart
        return $this->identity;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Set the Identity instance
     *
     * @param Identity $identity
     *
     * @return ConnectorFactory
     */
    protected function setIdentity(Identity $identity)
    {
        // @codeCoverageIgnoreStart
        $this->identity = $identity;
        return $this;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Return the Connector appropriate for the supplied resource
     *
     * A helper method that accepts the resource string and attempts to return
     * the appropriate ConnectorInterface instance.
     * If an invalid resource string is supplied, this method will throw
     * an InvalidArgumentException.
     *
     * @param string $resource
     *
     * @return AbstractConnector
     * @throws InvalidArgumentException
     */
    public function getConnector($resource)
    {
        switch($resource) {
            case ConnectorInterface::RESOURCE_ARTIST:
                return $this->getArtistConnector();
            case ConnectorInterface::RESOURCE_AREA:
                return $this->getAreaConnector();
            case ConnectorInterface::RESOURCE_LABEL:
                return $this->getLabelConnector();
            case ConnectorInterface::RESOURCE_RECORDING:
                return $this->getRecordingConnector();
            case ConnectorInterface::RESOURCE_URL:
                return $this->getUrlConnector();
            case ConnectorInterface::RESOURCE_WORK:
                return $this->getWorkConnector();
            case ConnectorInterface::RESOURCE_RELEASE:
                return $this->getReleaseConnector();
            case ConnectorInterface::RESOURCE_RELEASE_GROUP:
                return $this->getReleaseGroupConnector();
            default:
                throw new InvalidArgumentException('Supplied resource not recognised');
        }
    }

    /**
     * Return an instance of AreaConnector
     *
     * @return AreaConnector
     */
    public function getAreaConnector()
    {
        if (! isset($this->areaConnector)) {
            $this->areaConnector = new AreaConnector($this->getIdentity());
        }
        return $this->areaConnector;
    }

    /**
     * Return an instance of ArtistConnector
     *
     * @return ArtistConnector
     */
    public function getArtistConnector()
    {
        if (! isset($this->artistConnector)) {
            $this->artistConnector = new ArtistConnector($this->getIdentity());
        }
        return $this->artistConnector;
    }

    /**
     * Return an instance of LabelConnector
     *
     * @return LabelConnector
     */
    public function getLabelConnector()
    {
        if (! isset($this->labelConnector)) {
            $this->labelConnector = new LabelConnector($this->getIdentity());
        }
        return $this->labelConnector;
    }

    /**
     * Return an instance of RecordingConnector
     *
     * @return RecordingConnector
     */
    public function getRecordingConnector()
    {
        if (! isset($this->recordingConnector)) {
            $this->recordingConnector = new RecordingConnector($this->getIdentity());
        }
        return $this->recordingConnector;
    }

    /**
     * Return an instance of ReleaseConnector
     *
     * @return ReleaseConnector
     */
    public function getReleaseConnector()
    {
        if (! isset($this->releaseConnector)) {
            $this->releaseConnector = new ReleaseConnector($this->getIdentity());
        }
        return $this->releaseConnector;
    }

    /**
     * Return an instance of ReleaseGroupConnector
     *
     * @return ReleaseGroupConnector
     */
    public function getReleaseGroupConnector()
    {
        if (! isset($this->releaseGroupConnector)) {
            $this->releaseGroupConnector = new ReleaseGroupConnector($this->getIdentity());
        }
        return $this->releaseGroupConnector;
    }

    /**
     * Return an instance of UrlConenctor
     *
     * @return UrlConnector
     */
    public function getUrlConnector()
    {
        if (! isset($this->urlConnector)) {
            $this->urlConnector = new UrlConnector($this->getIdentity());
        }
        return $this->urlConnector;
    }

    /**
     * Return an instance of WorkConnector
     *
     * @return WorkConnector
     */
    public function getWorkConnector()
    {
        if (! isset($this->workConnector)) {
            $this->workConnector = new WorkConnector($this->getIdentity());
        }
        return $this->workConnector;
    }
}
