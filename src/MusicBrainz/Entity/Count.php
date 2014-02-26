<?php
/**
 * Count.php
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
 * Count
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class Count
{
    /**
     * The count value
     *
     * @var int
     */
    protected $count;

    /**
     * Constructor
     *
     * @param int $count
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function __construct($count)
    {
        if (! is_scalar($count) || ! ctype_digit((string)$count)) {
            throw new InvalidArgumentException('Expects a number');
        }
        $this->count = (int)$count;
    }

    /**
     * Return a string representation of the Count
     *
     * @return string
     */
    public function __toString()
    {
        return (string)$this->count;
    }
}
