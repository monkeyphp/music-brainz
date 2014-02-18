<?php
/**
 * LookupFilter.php
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

use Zend\Filter\StringToLower;
use Zend\InputFilter\ArrayInput;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\InArray;

/**
 * LookupFilter
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MuiscBrainz\InputFilter
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class LookupFilter extends InputFilter
{
    public function __construct(array $formats = array(), array $includes = array())
    {
        $format = new Input('format');
        $format->setAllowEmpty(false);
        $format->getFilterChain()->attach(new StringToLower());
        $format->getValidatorChain()->attach(
            new InArray(
                array(
                    'haystack' => $formats,
                )
            ),
            true
        );
        $include = new ArrayInput('includes');
        $include->setAllowEmpty(true);
        $include->getFilterChain()->attach(new StringToLower());
        $include->getValidatorChain()->attach(
            new InArray(
                array(
                    'haystack' => $includes,
                )
            ),
            true
        );

        $this->add($format)
            ->add($include);
    }
}
