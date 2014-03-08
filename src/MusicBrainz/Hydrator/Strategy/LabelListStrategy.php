<?php
/**
 * LabelListStrategy.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
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
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace MusicBrainz\Hydrator\Strategy;

use MusicBrainz\Entity\LabelList;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * LabelListStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class LabelListStrategy implements StrategyInterface
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
            $hydrator = new ClassMethods();
            $hydrator->addStrategy('count', new CountStrategy());
            $hydrator->addStrategy('offset', new CountStrategy());
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
        // @codeCoverageIgnoreEnd
    }

    /**
     *
     * @param type $object
     */
    public function extract($object)
    {

    }

    /**
     * Hydrate and return an instance of LabelList
     *
     * @param array $values
     *
     * @return null|LabelList
     */
    public function hydrate($values)
    {
        if (! is_array($values) || ! isset($values['label']) || ! is_array($values['label'])) {
            return null;
        }

        $labels = array();
        $labelStrategy = new LabelStrategy();

        foreach ($values['label'] as $index => $value) {
            $labels[$index] = $labelStrategy->hydrate($value);
        }

        $values['labels'] = $labels;
        unset($values['label']);

        return $this->getHydrator()->hydrate($values, new LabelList());
    }
}
