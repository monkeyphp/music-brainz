<?php
/**
 * Status.php
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
 * Status
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class Status
{
    /**
     * Array of valid statuses
     *
     * @var array
     */
    public static $statusTypes = array(
        ConnectorInterface::RELEASE_STATUS_OFFICIAL,
        ConnectorInterface::RELEASE_STATUS_BOOTLEG,
    );

    /**
     * The value of the status
     *
     * @var string
     */
    protected $status;

    /**
     * Constructor
     *
     * @param string $status
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function __construct($status)
    {
        if (! is_string($status) || ! in_array($status, static::$statusTypes)) {
            throw new InvalidArgumentException('Invlaid type supplied');
        }
        $this->status = $status;
    }

    /**
     * Return a string representation of the Status
     *
     * @return string
     */
    public function __toString()
    {
        return $this->status;
    }
}
