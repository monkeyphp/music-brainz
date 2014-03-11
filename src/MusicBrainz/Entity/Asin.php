<?php
/**
 * Asin.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David White <david@monkeyphp.com>
 *
 * Copyright (C) David White <david@monkeyphp.com>
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
 * Asin
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class Asin
{
    /**
     * The asin value
     *
     * @example B000005RFH
     *
     * @var string
     */
    protected $asin;

    /**
     * Constructor
     *
     * @param string $asin
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function __construct($asin)
    {
        if (! is_string($asin)) {
            throw new InvalidArgumentException('Expects a string');
        }
        $this->asin = $asin;
    }

    /**
     * Return a string representation of the Asin
     *
     * @return string
     */
    public function __toString()
    {
        return $this->asin;
    }
}
