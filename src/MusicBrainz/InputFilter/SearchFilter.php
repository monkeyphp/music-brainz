<?php
/**
 * SearchFilter.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MuiscBrainz\InputFilter
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) David White
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
namespace MusicBrainz\InputFilter;

use MusicBrainz\Connector\ConnectorInterface;
use Zend\Filter\Int;
use Zend\Filter\StringToLower;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\Between;
use Zend\Validator\Digits;

/**
 * SearchFilter
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MuiscBrainz\InputFilter
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class SearchFilter extends InputFilter
{
    /**
     * Constructr
     *
     * @return void
     */
    public function __construct()
    {
        $query  = new Input('query');
        $query->setAllowEmpty(false);
        $query->getFilterChain()->attach(
            new StringToLower()
        );

        $format = new Input('format');
        $format->setAllowEmpty(true);
        $format->getFilterChain()->attach(
            new StringToLower()
        );

        $limit = new Input('limit');
        $limit->setAllowEmpty(false);
        $limit->getFilterChain()->attach(new Int());
        $limit->getValidatorChain()
            ->attach(
                new Digits(),
                true
            )
            ->attach(
                new Between(
                    array(
                        'min' => ConnectorInterface::SEARCH_LIMIT_MIN,
                        'max' => ConnectorInterface::SEARCH_LIMIT_MAX
                    )
                ), true
            );

        $offset  = new Input('offset');
        $offset->setAllowEmpty(false);
        $offset->getFilterChain()->attach(new Int());
        $offset->getValidatorChain()->attach(
            new Digits(),
            true
        );

        $this->add($query)
            ->add($format)
            ->add($limit)
            ->add($offset);
    }
}
