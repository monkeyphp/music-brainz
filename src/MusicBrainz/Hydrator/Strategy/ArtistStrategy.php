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
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * ArtistStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 * @author     David White [monkeyphp] <david@monkeyphp.com>
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
            $hydrator = new ClassMethods(false);
            $hydrator->addStrategy('area', new AreaStrategy());
            $hydrator->addStrategy('beginArea', new AreaStrategy());
            $hydrator->addStrategy('lifeSpan', new LifeSpanStrategy());
            $hydrator->addStrategy('aliasList', new AliasListStrategy());
            $hydrator->addStrategy('tagList', new TagListStrategy());
            $hydrator->addStrategy('ipiList', new IpiListStrategy());
            $hydrator->addStrategy('isniList', new IsniListStrategy());
            $hydrator->addStrategy('releaseList', new ReleaseListStrategy());
            $hydrator->addStrategy('releaseGroupList', new ReleaseGroupListStrategy());
            $hydrator->addStrategy('recordingList', new RecordingListStrategy());
            $hydrator->addStrategy('workList', new WorkListStrategy());
            $hydrator->addStrategy('type', new ArtistTypeStrategy());
            $hydrator->addStrategy('name', new NameStrategy());
            $hydrator->addStrategy('sortName', new NameStrategy());
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
        return $this->getHydrator()->extract($object);
    }

    /**
     * Hydrate and return an instance of Artist
     *
     * @param array $value
     *
     * @return Artist|null
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
        if (isset($value['sort-name'])) {
            $value['sortName'] = $value['sort-name'];
            unset($value['sort-name']);
        }
        if (isset($value['begin-area'])) {
            $value['beginArea'] = $value['begin-area'];
            unset($value['begin-area']);
        }
        if (isset($value['life-span'])) {
            $value['lifeSpan'] = $value['life-span'];
            unset($value['life-span']);
        }
        if (isset($value['alias-list'])) {
            $value['aliasList'] = $value['alias-list'];
            unset($value['alias-list']);
        }
        if (isset($value['tag-list'])) {
            $value['tagList'] = $value['tag-list'];
            unset($value['tag-list']);
        }
        if (isset($value['ipi-list'])) {
            $value['ipiList'] = $value['ipi-list'];
            unset($value['ipi-list']);
        }
        if (isset($value['isni-list'])) {
            $value['isniList'] = $value['isni-list'];
            unset($value['isni-list']);
        }
        if (isset($value['recording-list'])) {
            $value['recordingList'] = $value['recording-list'];
            unset($value['recording-list']);
        }
        if (isset($value['release-list'])) {
            $value['releaseList'] = $value['release-list'];
            unset($value['release-list']);
        }
        if (isset($value['release-group-list'])) {
            $value['releaseGroupList'] = $value['release-group-list'];
            unset($value['release-group-list']);
        }
        if (isset($value['work-list'])) {
            $value['workList'] = $value['work-list'];
            unset($value['work-list']);
        }
        return $this->getHydrator()->hydrate($value, new Artist());
    }
}
