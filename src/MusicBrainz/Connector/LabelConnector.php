<?php
/**
 * LabelConnector.php
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
 * LabelConnector
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Connector
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class LabelConnector extends AbstractConnector
{
    /**
     * The name of the Resource that this Connector handles
     *
     * @var string
     */
    protected $resource = ConnectorInterface::RESOURCE_LABEL;

    /**
     * The name of the strategy class that will hydrate from search results
     *
     * @var string
     */
    protected $searchStrategyClassname = 'MusicBrainz\Hydrator\Strategy\LabelSearchStrategy';

    /**
     * The name of the strategy class that will hydrate from lookup results
     * 
     * @var string
     */
    protected $lookupStrategyClassname = 'MusicBrainz\Hydrator\Strategy\LabelLookupStragegy';
}
