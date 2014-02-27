<?php
/**
 * ReleaseGroupStrategy.php
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

use MusicBrainz\Entity\ReleaseGroup;
use MusicBrainz\Hydrator\Strategy\MbidStrategy;
use MusicBrainz\Hydrator\Strategy\ReleaseGroupStrategy;
use MusicBrainz\Hydrator\Strategy\ReleaseGroupTypeStrategy;
use MusicBrainz\Hydrator\Strategy\TitleStrategy;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * ReleaseGroupStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class ReleaseGroupStrategy implements StrategyInterface
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
            $hydrator->addStrategy('mbid', new MbidStrategy());
            $hydrator->addStrategy('title', new TitleStrategy());
            $hydrator->addStrategy('type', new ReleaseGroupTypeStrategy());
            $hydrator->addStrategy('primaryType', new ReleaseGroupStrategy());
            // firstReleaseDate
            // secondaryTypeList
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
    }

    /**
     * Extract the values from the supplied instance of ReleaseGroup
     *
     * @param ReleaseGroup $object
     *
     * @return void|array
     */
    public function extract($object)
    {
        if (! $object instanceof ReleaseGroup) {
            return null;
        }
        return $this->getHydrator()->extract($object);
    }

    /**
     * Hydrate and return an instance of ReleaseGroup
     *
     * @param array $value
     *
     * @return null|ReleaseGroup
     */
    public function hydrate($value)
    {
        if (! is_array($value)) {
            return null;
        }
        if (isset($value['id'])) {
            $value['mbid'] = $value['id'];
            unset($value['id']);
        }
        if (isset($value['first-release-date'])) {
            unset($value['first-release-date']);
            //$value['firstReleaseDate'] = $value['first-release-date'];
        }
        if (isset($value['primary-type'])) {
            $value['primaryType'] = $value['primary-type'];
            unset($value['primary-type']);
        }
        if (isset($value['secondary-type-list'])) {
            unset($value['secondary-type-list']);
            //$value['secondaryTypeList'] = $value['secondary-type-list'];
        }
        return $this->getHydrator()->hydrate($value, new ReleaseGroup());
    }
}
