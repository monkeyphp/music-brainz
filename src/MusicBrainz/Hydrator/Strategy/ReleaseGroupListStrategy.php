<?php
/**
 * ReleaseGroupListStrategy.php
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

use MusicBrainz\Entity\ReleaseGroupList;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * ReleaseGroupListStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class ReleaseGroupListStrategy implements StrategyInterface
{
    /**
     * Instance of ClassMethods hydrator
     *
     * @var ClassMethods
     */
    protected $hydrator;

    /**
     * Return an instance of ClassMethods hydrator
     *
     * @return ClassMethods
     */
    protected function getHydrator()
    {
        if (! isset($this->hydrator)) {
            $hydrator = new ClassMethods();
            $hydrator->addStrategy('count', new CountStrategy());
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
    }

    public function extract($value)
    {

    }

    /**
     * Hydrate and return an instance of ReleaseGroupList
     *
     * @param array $value
     *
     * @return null|ReleaseGroupList
     */
    public function hydrate($value)
    {
        if (! is_array($value) || ! is_array($value['release-group'])) {
            return null;
        }
        $releaseGroups = array();
        $releaseGroupStrategy = new ReleaseGroupStrategy();

        foreach ($value['release-group'] as $index => $releaseGroup) {
            $releaseGroups[$index] = $releaseGroupStrategy->hydrate($releaseGroup);
        }
        $value['releaseGroups'] = $releaseGroups;
        unset($value['release-group']);

        return $this->getHydrator()->hydrate($value, new ReleaseGroupList());
    }
}
