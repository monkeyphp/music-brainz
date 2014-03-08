<?php
/**
 * LabelStrategy.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) 2014 David White
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

use MusicBrainz\Entity\Label;
use Zend\Filter\Word\DashToUnderscore;
use Zend\Filter\Word\UnderscoreToDash;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * LabelStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class LabelStrategy implements StrategyInterface
{
    /**
     * Instance of ClassMethdods hydrator
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
        // @codeCoverageIgnoreStart
        if (! isset($this->hydrator)) {
            $hydrator = new ClassMethods(true);
            $hydrator->addStrategy('mbid', new MbidStrategy());
            $hydrator->addStrategy('name', new NameStrategy());
            $hydrator->addStrategy('sort_name', new NameStrategy());
            $hydrator->addStrategy('label_code', new LabelCodeStrategy());
            $hydrator->addStrategy('type', new LabelTypeStrategy());
            $hydrator->addStrategy('country', new CountryStrategy());
            $hydrator->addStrategy('area', new AreaStrategy());
            $hydrator->addStrategy('life_span', new LifeSpanStrategy());
            $hydrator->addStrategy('alias_list', new AliasListStrategy());
            $hydrator->addStrategy('tag_list', new TagListStrategy());
            $hydrator->addStrategy('ipi_list', new IpiListStrategy());
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
        // @codeCoverageIgnoreEnd
    }

    public function extract($object)
    {
        if (! $object instanceof Label) {
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
        }
        unset($filtered['mbid']);

        return $filtered;
    }

    /**
     * Hydrate and return an instance of Label
     *
     * @param array $values An array of values
     *
     * @return null|Label
     */
    public function hydrate($values)
    {
        if (! is_array($values)) {
            return null;
        }

        $filter = new DashToUnderscore();
        $filtered = array();

        array_walk($values, function ($value, $key) use ($filter, &$filtered) {
            $_ = strtolower($filter->filter($key));
            $filtered[$_] = $value;
        });

        if (isset($filtered['id'])) {
            $filtered['mbid'] = $filtered['id'];
            unset($filtered['id']);
        }

        return $this->getHydrator()->hydrate($filtered, new Label());
    }
}
