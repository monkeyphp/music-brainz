<?php
/**
 * AreaConnector.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Connector
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) 2014  David White
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
 * along with this program.  If not, see [http://www.gnu.org/licenses/].
 */
namespace MusicBrainz\Connector;

/**
 * AreaConnector
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Connector
 */
class AreaConnector extends AbstractConnector
{
    /**
     * The name of the resource that this Connector handles
     *
     * @var string
     */
    protected $resource = ConnectorInterface::RESOURCE_AREA;

    /**
     * The classname for search results
     *
     * @var string
     */
    protected $searchStrategyClassname = 'MusicBrainz\Hydrator\Strategy\AreaSearchStrategy';
}
