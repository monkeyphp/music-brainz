<?php
/**
 * Barcode.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David white <david@monkeyphp.com>
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
 * Barcode
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class Barcode
{
    /**
     * The value of the Barcode
     *
     * @var string
     */
    protected $barcode;

    /**
     * Constructor
     *
     * @param int|string $barcode The barcode string
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function __construct($barcode)
    {
        if (! is_scalar($barcode) || ! ctype_digit((string)$barcode)) {
            throw new InvalidArgumentException('Invalid barcode supplied');
        }
        $this->barcode = $barcode;
    }

    /**
     * Return the string representation of the Barcode
     *
     * @return string
     */
    public function __toString()
    {
        return $this->barcode;
    }
}
