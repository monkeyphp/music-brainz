<?php
/**
 * Country.php
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
 * Country
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class Country
{
    /**
     * The country value
     *
     * @var string
     */
    protected $country;

    /**
     * Constructor
     *
     * @param string $country The country value
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function __construct($country)
    {
        if (! is_string($country)) {
            throw new InvalidArgumentException('Expects a string');
        }
        $this->country = $country;
    }

    /**
     * Return the string representation of the Country
     *
     * @return string
     */
    public function __toString()
    {
        return $this->country;
    }
}
