<?php
/**
 * EndedStrategy.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
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
namespace MusicBrainz\Hydrator\Strategy;

use MusicBrainz\Entity\Ended;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * EndedStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class EndedStrategy implements StrategyInterface
{
    public function extract($object)
    {
        if (! $object instanceof Ended) {
            return null;
        }
        return $object->__toString();
    }

    public function hydrate($value)
    {
        if (is_string($value)) {
            $value = (strtolower($value) === 'true') ? true : false;
        }
        return new Ended((boolean)$value);
    }
}
