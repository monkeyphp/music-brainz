<?php
/**
 * ReleaseEventListStrategy.php
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

use MusicBrainz\Entity\ReleaseEventList;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * ReleaseEventListStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class ReleaseEventListStrategy implements StrategyInterface
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
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
    }


    public function extract($value)
    {

    }

    public function hydrate($values)
    {
        if (! is_array($values) ||
            ! isset($values['release-event']) ||
            ! is_array($values['release-event'])
        ) {
            return null;
        }

        if (isset($values['@attributes']) && is_array($values['@attributes'])) {
            $attributes = $values['@attributes'];
            unset($values['@attributes']);
            $values = $values + $attributes;
        }

        $releaseEvents = array();
        $releaseEventStrategy = new ReleaseEventStrategy();

        foreach ($values['release-event'] as $index => $key) {
            if (! is_int($index)) {
                $releaseEvents[] = $releaseEventStrategy->hydrate($values['release-event']);
                break;
            }
            $releaseEvents[] = $releaseEventStrategy->hydrate($key);
        }

        $values['release_events'] = $releaseEvents;
        unset($values['release-events']);

        return $this->getHydrator()->hydrate($values, new ReleaseEventList());
    }
    /*
     * [release_event_list] => Array
        (
            [release-event] => Array
                (
                    [date] => 2007-08-09
                    [area] => Array
                        (
                            [name] => Netherlands
                            [sort-name] => Netherlands
                            [iso-3166-1-code-list] => Array
                                (
                                    [iso-3166-1-code] => NL
                                )

                            [@attributes] => Array
                                (
                                    [id] => ef1b7cc0-cd26-36f4-8ea0-04d9623786c7
                                )

                        )

                )

        )
     */
}
