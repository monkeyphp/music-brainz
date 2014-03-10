<?php
/**
 * Format.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
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
use MusicBrainz\Connector\ConnectorInterface;

/**
 * Format
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class Format
{
    /**
     * The value of the Format
     *
     * @var string
     */
    protected $format;

    /**
     * Array of valid format valids
     *
     * @var array
     */
    public static $formats = array(
        ConnectorInterface::FORMAT_CD
    );

    /**
     * Constructor
     *
     * @param string $format
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function __construct($format)
    {
        if (! is_string($format) || ! in_array($format, static::$formats)) {
            throw new InvalidArgumentException('Invalid format supplied');
        }
        $this->format = $format;
    }

    /**
     * Return a string representation of the Format
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->format;
    }
}
