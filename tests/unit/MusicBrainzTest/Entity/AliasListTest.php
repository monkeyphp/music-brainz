<?php
namespace MusicBrainzTest\Entity;

use MusicBrainz\Entity\Alias;
use MusicBrainz\Entity\AliasList;
use PHPUnit_Framework_TestCase;

class AliasListTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can call the getAliases method and recieve
     * an empty array
     *
     * @covers \MusicBrainz\Entity\AliasList::getAliases
     */
    public function testGetAliasesReturnsArray()
    {
        $aliasList = new AliasList();

        $aliases = $aliasList->getAliases();

        $this->assertInternalType('array', $aliases);
    }

    /**
     * Test that we can add an Alias
     *
     * @covers \MusicBrainz\Entity\AliasList::addAlias
     */
    public function testAddAlias()
    {
        $aliasList = new AliasList();
        $alias = new Alias();

        $this->assertEmpty($aliasList->getAliases());
        $this->assertSame($aliasList, $aliasList->addAlias($alias));
        $this->assertCount(1, $aliasList->getAliases());
    }

    /**
     * Test that we can set the aliases
     *
     * @covers \MusicBrainz\Entity\AliasList::setAliases
     */
    public function testSetAliases()
    {
        $aliasList = new AliasList();
        $aliases = array(
            new Alias(),
            new Alias(),
            new Alias(),
        );
        $this->assertEmpty($aliasList->getAliases());
        $this->assertSame($aliasList, $aliasList->setAliases($aliases));
        $this->assertCount(count($aliases), $aliasList->getAliases());
    }

    /**
     * Test that we can set the aliases
     *
     * @covers \MusicBrainz\Entity\AliasList::current
     * @covers \MusicBrainz\Entity\AliasList::key
     * @covers \MusicBrainz\Entity\AliasList::next
     * @covers \MusicBrainz\Entity\AliasList::rewind
     * @covers \MusicBrainz\Entity\AliasList::valid
     */
    public function testIterator()
    {
        $aliasList = new AliasList();
        $aliases = array(
            new Alias(),
            new Alias(),
            new Alias(),
        );
        $count = 0;
        $this->assertSame($aliasList, $aliasList->setAliases($aliases));
        foreach ($aliasList as $alias) {
            $this->assertInstanceOf('\MusicBrainz\Entity\Alias', $alias);
            $count++;
        }
        $this->assertCount($count, $aliases);
    }
}