<?php
/**
 * TextRepresentationTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) David White
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
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace MusicBrainzTest\Entity;

use MusicBrainz\Entity\Language;
use MusicBrainz\Entity\Script;
use MusicBrainz\Entity\TextRepresentation;
use PHPUnit_Framework_TestCase;

/**
 * TextRepresentationTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class TextRepresentationTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the Language
     *
     * @covers \MusicBrainz\Entity\TextRepresentation::getLanguage
     * @covers \MusicBrainz\Entity\TextRepresentation::setLanguage
     */
    public function testGetSetLanguage()
    {
        $textRepresentation = new TextRepresentation();
        $language = new Language('eng');

        $this->assertNull($textRepresentation->getLanguage());
        $this->assertSame($textRepresentation, $textRepresentation->setLanguage($language));
        $this->assertSame($language, $textRepresentation->getLanguage());
    }

    /**
     * Test that we can get and set the Script
     *
     * @covers \MusicBrainz\Entity\TextRepresentation::getScript
     * @covers \MusicBrainz\Entity\TextRepresentation::setScript
     */
    public function testGetSetScript()
    {
        $textRepresentation = new TextRepresentation();
        $script = new Script('lat');

        $this->assertNull($textRepresentation->getScript());
        $this->assertSame($textRepresentation, $textRepresentation->setScript($script));
        $this->assertSame($script, $textRepresentation->getScript());
    }
}
