<?php
/**
 * PrimaryType.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) 2014 David White
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
 * PrimaryType
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class PrimaryType
{
    /**
     * The value of the PrimaryType
     *
     * @var string
     */
    protected $primaryType;

    /**
     * An array of valid types
     *
     * @var array
     */
    public static $primaryTypes = array(
        ConnectorInterface::PRIMARY_TYPE_ALBUM,
        ConnectorInterface::PRIMARY_TYPE_EP,
        ConnectorInterface::PRIMARY_TYPE_SINGLE,
        ConnectorInterface::PRIMARY_TYPE_OTHER,
    );

    /**
     * Constructor
     *
     * @param string $primaryType
     *
     * @throws InvalidArgumentException
     * @return PrimaryType
     */
    public function __construct($primaryType)
    {
        if (! is_string($primaryType) || ! in_array($primaryType, static::$primaryTypes)) {
            throw new InvalidArgumentException('Invalid primary type supplied');
        }
        $this->primaryType = $primaryType;
        return $this;
    }

    /**
     * Return a string representation of the PrimaryType
     *
     * @return string
     */
    public function __toString()
    {
        return $this->primaryType;
    }
}
