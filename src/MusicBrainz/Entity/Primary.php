<?php
/**
 * Primary.php
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
 * Primary
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class Primary
{
    /**
     * The value of the Primary
     *
     * @var string
     */
    protected $primary;

    /**
     * Constructor
     *
     * @param string $primary
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function __construct($primary)
    {
        if (! is_string($primary)) {
            throw new InvalidArgumentException('Expects a string');
        }
        $this->primary = $primary;
    }

    /**
     * Return a string representation of the Primary
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->primary;
    }
}
