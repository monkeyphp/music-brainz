<?php

/*
 * Copyright (C) Error: on line 4, column 33 in Templates/Licenses/license-gpl30.txt
  The string doesn't match the expected date/time format. The string to parse was: "07-Mar-2014". The expected format was: "MMM d, yyyy". David White <david@monkeyphp.com>
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
 * Description of LabelType
 *
 * @author David White <david@monkeyphp.com>
 */
class LabelType
{
    protected $labelType;

    public static $labelTypes = array(
        ConnectorInterface::LABEL_TYPE_HOLDING,
        ConnectorInterface::LABEL_TYPE_ORIGINAL_PRODUCTION,
        ConnectorInterface::LABEL_TYPE_PRODUCTION,
        ConnectorInterface::LABEL_TYPE_PUBLISHER,
        ConnectorInterface::LABEL_TYPE_REISSUE_PRODUCTION
    );

    public function __construct($labelType)
    {
        if (! is_string($labelType) || ! in_array($labelType, static::$labelTypes)) {
            throw new InvalidArgumentException('Invalid label type supplied');
        }
        $this->labelType = $labelType;
    }

    public function __toString()
    {
        return $this->labelType;
    }
}
