<?php
/**
 * Iswc.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
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
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace MusicBrainz\Entity;

use InvalidArgumentException;

/**
 * Iswc
 *
 * @link http://www.iswc.org/en/faq.html
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class Iswc
{
    /**
     * The value of the Iswc
     *
     * @example T-070.899.612-6
     *
     * @var string
     */
    protected $iswc;

    /**
     * Constructor
     *
     * @param string $iswc
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function __construct($iswc)
    {
        if (! is_string($iswc)) {
            throw new InvalidArgumentException('Expects a string');
        }
        $this->iswc = $iswc;
    }

    /**
     * Return a string representation of the Iswc
     *
     * @return string
     */
    public function __toString()
    {
        return $this->iswc;
    }
}
