<?php
namespace MusicBrainzTest\Hydrator\Strategy;

use MusicBrainz\Hydrator\Strategy\EndedStrategy;
use PHPUnit_Framework_TestCase;

class EndedStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \MusicBrainz\Hydrator\Strategy\EndedStrategy::hydrate
     */
    public function testHydrate()
    {
        $endedStrategy = new EndedStrategy();

        $ended = $endedStrategy->hydrate('true');

        $this->assertInstanceOf('\MusicBrainz\Entity\Ended', $ended);
    }
}