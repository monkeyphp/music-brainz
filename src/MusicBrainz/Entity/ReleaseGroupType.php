<?php

/**
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
namespace MusicBrainz\Entity;

use MusicBrainz\Connector\ConnectorInterface;

/**
 * Description of ReleaseGroupType
 *
 * @author David White <david@monkeyphp.com>
 */
class ReleaseGroupType
{
    public static $types = array(
        ConnectorInterface::RELEASE_GROUP_TYPE_ALBUM,
        ConnectorInterface::RELEASE_GROUP_TYPE_COMPILATION
    );

    protected $type;

    public function __construct($type)
    {
        if (! in_array($type, static::$types)) {
            throw new InvalidArgumentException('Invalid type supplied');
        }
        $this->type = $type;
    }

    public function __toString()
    {
        return $this->type;
    }
}