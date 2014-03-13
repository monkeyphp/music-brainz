<?php
/**
 * ArtistStrategy.php
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

use MusicBrainz\Entity\Artist;
use Zend\Filter\Word\DashToUnderscore;
use Zend\Filter\Word\UnderscoreToDash;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * ArtistStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class ArtistStrategy implements StrategyInterface
{
    /**
     * Instance of ClassMethods hydrator
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
            $hydrator = new ClassMethods(true);
            $hydrator->addStrategy('area', new AreaStrategy());
            $hydrator->addStrategy('begin_area', new AreaStrategy());
            $hydrator->addStrategy('life_span', new LifeSpanStrategy());
            $hydrator->addStrategy('alias_list', new AliasListStrategy());
            $hydrator->addStrategy('tag_list', new TagListStrategy());
            $hydrator->addStrategy('ipi_list', new IpiListStrategy());
            $hydrator->addStrategy('isni_list', new IsniListStrategy());
            $hydrator->addStrategy('release_list', new ReleaseListStrategy());
            $hydrator->addStrategy('release_group_list', new ReleaseGroupListStrategy());
            $hydrator->addStrategy('recording_list', new RecordingListStrategy());
            $hydrator->addStrategy('work_list', new WorkListStrategy());
            $hydrator->addStrategy('type', new ArtistTypeStrategy());
            $hydrator->addStrategy('name', new NameStrategy());
            $hydrator->addStrategy('sort_name', new NameStrategy());
            $hydrator->addStrategy('mbid', new MbidStrategy());
            $hydrator->addStrategy('score', new ScoreStrategy());
            $hydrator->addStrategy('gender', new GenderStrategy());
            $hydrator->addStrategy('country', new CountryStrategy());
            $hydrator->addStrategy('disambiguation', new DisambiguationStrategy());
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Extract the values from an instance of Artist
     *
     * @param Artist $object
     *
     * @return null|array
     */
    public function extract($object)
    {
        if (! $object instanceof Artist) {
            return null;
        }

        $values = $this->getHydrator()->extract($object);
        $filter = new UnderscoreToDash();
        $filtered = array();

        array_walk($values, function ($value, $key) use ($filter, &$filtered) {
            $_ = $filter->filter($key);
            $filtered[$_] = $value;
        });

        if ($filtered['mbid']) {
            $filtered['id'] = $filtered['mbid'];
            unset($filtered['mbid']);
        }


        return $filtered;
    }

    /**
     * Hydrate and return an instance of Artist
     *
     * @param array $values The array of values to hydrate the Artist with
     *
     * @return Artist|null
     */
    public function hydrate($values)
    {
        if (! is_array($values)) {
            return null;
        }

        if (isset($values['@attributes']) && is_array($values['@attributes'])) {
            $attributes = $values['@attributes'];
            unset($values['@attributes']);
            $values  = $values + $attributes;
        }

        $filter = new DashToUnderscore();
        $filtered = array();

        array_walk($values, function ($value, $key) use ($filter, &$filtered) {
            $_ = lcfirst($filter->filter($key));
            $filtered[$_] = $value;
        });

        if (isset($filtered['id'])) {
            $filtered['mbid'] = $filtered['id'];
            unset($filtered['id']);
        }
        return $this->getHydrator()->hydrate($filtered, new Artist());
    }
}
