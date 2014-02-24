<?php
/**
 * ConnectorFactoryTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Connector\Factory
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
namespace MusicBrainzTest\Connector\Factory;

use InvalidArgumentException;
use MusicBrainz\Connector\ConnectorInterface;
use MusicBrainz\Connector\Factory\ConnectorFactory;
use MusicBrainz\Identity\Identity;
use PHPUnit_Framework_TestCase;

/**
 * ConnectorFactoryTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Connector\Factory
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class ConnectorFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance of ConnectorFactory
     *
     * @covers \MusicBrainz\Connector\Factory\ConnectorFactory::__construct
     */
    public function test__construct()
    {
        $identity = new Identity('tests');
        $connectorFactory = new ConnectorFactory($identity);

        $this->assertInstanceOf('\MusicBrainz\Connector\Factory\ConnectorFactory', $connectorFactory);
    }

    /**
     * Test that we can get the AreaConnector
     *
     * @covers \MusicBrainz\Connector\Factory\ConnectorFactory::getAreaConnector
     */
    public function testGetAreaConnector()
    {
        $connectorFactory = new ConnectorFactory(new Identity('test'));

        $connector = $connectorFactory->getAreaConnector();

        $this->assertInstanceOf('\MusicBrainz\Connector\AreaConnector', $connector);
    }

    /**
     * Test that we can get the ArtistConnector
     *
     * @covers \MusicBrainz\Connector\Factory\ConnectorFactory::getArtistConnector
     */
    public function testGetArtistConnector()
    {
        $connectorFactory = new ConnectorFactory(new Identity('test'));

        $connector = $connectorFactory->getArtistConnector();

        $this->assertInstanceOf('\MusicBrainz\Connector\ArtistConnector', $connector);
    }

    /**
     * Test that we can get the LabelConnector
     *
     * @covers \MusicBrainz\Connector\Factory\ConnectorFactory::getLabelConnector
     */
    public function testGetLabelConnector()
    {
        $connectorFactory = new ConnectorFactory(new Identity('test'));

        $connector = $connectorFactory->getLabelConnector();

        $this->assertInstanceOf('\MusicBrainz\Connector\LabelConnector', $connector);
    }

    /**
     * Test that we can get the RecordingConnector
     *
     * @covers \MusicBrainz\Connector\Factory\ConnectorFactory::getRecordingConnector
     */
    public function testGetRecordingConnector()
    {
        $connectorFactory = new ConnectorFactory(new Identity('test'));

        $connector = $connectorFactory->getRecordingConnector();

        $this->assertInstanceOf('\MusicBrainz\Connector\RecordingConnector', $connector);
    }

    /**
     * Test that we can get the ReleaseConnectorInterface
     *
     * @covers \MusicBrainz\Connector\Factory\ConnectorFactory::getReleaseConnector
     */
    public function testGetReleaseConnector()
    {
        $connectorFactory = new ConnectorFactory(new Identity('test'));

        $connector = $connectorFactory->getReleaseConnector();

        $this->assertInstanceOf('\MusicBrainz\Connector\ReleaseConnector', $connector);
    }

    /**
     * Test that we can get the ReleaseGroupConnectorInterface
     *
     * @covers \MusicBrainz\Connector\Factory\ConnectorFactory::getReleaseGroupConnector
     */
    public function testGetReleaseGroupConnector()
    {
        $connectorFactory = new ConnectorFactory(new Identity('test'));

        $connector = $connectorFactory->getReleaseGroupConnector();

        $this->assertInstanceOf('\MusicBrainz\Connector\ReleaseGroupConnector', $connector);
    }

    /**
     * Test that we can get the UrlConnectoInterface
     *
     * @covers \MusicBrainz\Connector\Factory\ConnectorFactory::getUrlConnector
     */
    public function testGetUrlConnector()
    {
        $connectorFactory = new ConnectorFactory(new Identity('test'));

        $connector = $connectorFactory->getUrlConnector();

        $this->assertInstanceOf('\MusicBrainz\Connector\UrlConnector', $connector);
    }

    /**
     * Test that we can get the WorkConnectorInterface
     *
     * @covers \MusicBrainz\Connector\Factory\ConnectorFactory::getWorkConnector
     */
    public function testGetWorkConnector()
    {
        $connectorFactory = new ConnectorFactory(new Identity('test'));

        $connector = $connectorFactory->getWorkConnector();

        $this->assertInstanceOf('\MusicBrainz\Connector\WorkConnector', $connector);
    }

    /**
     * Test that we can get the ArtistConnector when we supply the
     * artist resource string
     *
     * @covers \MusicBrainz\Connector\Factory\ConnectorFactory::getConnector
     */
    public function testGetConnectorArtist()
    {
        $connectorFactory = new ConnectorFactory(new Identity('test'));

        $connector = $connectorFactory->getConnector(ConnectorInterface::RESOURCE_ARTIST);

        $this->assertInstanceOf('\MusicBrainz\Connector\ArtistConnector', $connector);
    }

    /**
     * Test that we can get the AreaConnector when we supply the
     * artist resource string
     *
     * @covers \MusicBrainz\Connector\Factory\ConnectorFactory::getConnector
     */
    public function testGetConnectorArea()
    {
        $connectorFactory = new ConnectorFactory(new Identity('test'));

        $connector = $connectorFactory->getConnector(ConnectorInterface::RESOURCE_AREA);

        $this->assertInstanceOf('\MusicBrainz\Connector\AreaConnector', $connector);
    }

    /**
     * Test that we can get the LabelConnector when we supply the label
     * resource string
     *
     * @covers \MusicBrainz\Connector\Factory\ConnectorFactory::getConnector
     */
    public function testGetConnectorLabel()
    {
        $connectorFactory = new ConnectorFactory(new Identity('test'));

        $connector = $connectorFactory->getConnector(ConnectorInterface::RESOURCE_LABEL);

        $this->assertInstanceOf('\MusicBrainz\Connector\LabelConnector', $connector);
    }

    /**
     * Test that we can get the RecordingConnector when we supply the recording
     * resource string
     *
     * @covers \MusicBrainz\Connector\Factory\ConnectorFactory::getConnector
     */
    public function testGetConnectorRecording()
    {
        $connectorFactory = new ConnectorFactory(new Identity('test'));

        $connector = $connectorFactory->getConnector(ConnectorInterface::RESOURCE_RECORDING);

        $this->assertInstanceOf('\MusicBrainz\Connector\RecordingConnector', $connector);
    }

    /**
     * Test that we can get the UrlConnector when we supply the url resource string
     *
     * @covers \MusicBrainz\Connector\Factory\ConnectorFactory::getConnector
     */
    public function testGetConnectorUrl()
    {
        $connectorFactory = new ConnectorFactory(new Identity('test'));

        $connector = $connectorFactory->getConnector(ConnectorInterface::RESOURCE_URL);

        $this->assertInstanceOf('\MusicBrainz\Connector\UrlConnector', $connector);
    }

    /**
     * Test that we can get the WorkConnector when we supply the work resource
     * string
     *
     * @covers \MusicBrainz\Connector\Factory\ConnectorFactory::getConnector
     */
    public function testGetConnectorWork()
    {
        $connectorFactory = new ConnectorFactory(new Identity('test'));

        $connector = $connectorFactory->getConnector(ConnectorInterface::RESOURCE_WORK);

        $this->assertInstanceOf('\MusicBrainz\Connector\WorkConnector', $connector);
    }

    /**
     * Test that we can get the ReleaseConnector when we supply the release resource
     * string
     *
     * @covers \MusicBrainz\Connector\Factory\ConnectorFactory::getConnector
     */
    public function testGetConnectorRelease()
    {
        $connectorFactory = new ConnectorFactory(new Identity('test'));

        $connector = $connectorFactory->getConnector(ConnectorInterface::RESOURCE_RELEASE);

        $this->assertInstanceOf('\MusicBrainz\Connector\ReleaseConnector', $connector);
    }

    /**
     * Test that we can get the ReleaseGroupConnector when we supply the
     * release group resource string
     *
     * @covers \MusicBrainz\Connector\Factory\ConnectorFactory::getConnector
     */
    public function testGetConnectorReleaseGroup()
    {
        $connectorFactory = new ConnectorFactory(new Identity('test'));

        $connector = $connectorFactory->getConnector(ConnectorInterface::RESOURCE_RELEASE_GROUP);

        $this->assertInstanceOf('\MusicBrainz\Connector\ReleaseGroupConnector', $connector);
    }

    /**
     * Test that passing an invalid resource string results in an exception
     * bring thrown
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Connector\Factory\ConnectorFactory::getConnector
     */
    public function testGetConnectorThrowsException()
    {
        $connectorFactory = new ConnectorFactory(new Identity('test'));

        $connectorFactory->getConnector('foobar');
    }

    /**
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Connector\Factory\ConnectorFactory::getConnector
     */
    public function testGetConnectorThrowsExceptionNonString()
    {
        $connectorFactory = new ConnectorFactory(new Identity('test'));
        $connectorFactory->getConnector(new \stdClass());
    }
}
