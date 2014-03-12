<?php
/**
 * LanguageTest.php
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
use PHPUnit_Framework_TestCase;
/**
 * LanguageTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class LanguageTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance of Language
     *
     * @covers \MusicBrainz\Entity\Language::__construct
     */
    public function test__construct()
    {
        $string = 'eng';
        $language = new Language($string);

        $this->assertInstanceOf('\MusicBrainz\Entity\Language', $language);
    }
}
