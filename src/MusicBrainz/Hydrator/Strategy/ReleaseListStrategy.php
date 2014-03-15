<?php
/**
 * ReleaseListStrategy.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
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
namespace MusicBrainz\Hydrator\Strategy;

use MusicBrainz\Entity\ReleaseList;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * ReleaseListStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class ReleaseListStrategy implements StrategyInterface
{
    /**
     * Instance of ClassMethods
     *
     * @var ClassMethods
     */
    protected $hydrator;

    /**
     * Return an instance of ClassMethods
     *
     * @return ClassMethods
     */
    protected function getHydrator()
    {
        // @codeCoverageIgnoreStart
        if (! isset($this->hydrator)) {
            $hydrator = new ClassMethods();
            $hydrator->addStrategy('count', new CountStrategy());
            $hydrator->addStrategy('offset', new CountStrategy());
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Extract and return an array of values from the ReleaseList instance
     *
     * @param ReleaseList $object
     *
     * @return array|null
     */
    public function extract($object)
    {
        if (! $object instanceof ReleaseList) {
            return null;
        }
        return $this->getHydrator()->extract($object);
    }

    /**
     * Hydrate and return an instance of ReleaseList
     *
     * @param array $values
     *
     * @return null|ReleaseList
     */
    public function hydrate($values)
    {
        if (! is_array($values) ||
            ! isset($values['release']) ||
            ! is_array($values['release'])
        ) {
            return null;
        }

        if (isset($values['@attributes']) && is_array($values['@attributes'])) {
            $attributes = $values['@attributes'];
            unset($values['@attributes']);
            $values = $values + $attributes;
        }

        $releases = array();
        $releaseStrategy = new ReleaseStrategy();
        foreach ($values['release'] as $index => $key) {
            if (! is_int($index)) {
                $releases[] = $releaseStrategy->hydrate($values['release']);
                break;
            }
            $releases[] = $releaseStrategy->hydrate($key);
        }

        $values['releases'] = $releases;
        unset($values['release']);

        return $this->getHydrator()->hydrate($values, new ReleaseList());
    }
}
