<?php
/**
 * Artist.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
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
 * along with this program.  If not, see [http://www.gnu.org/licenses/].
 */
namespace MusicBrainz\Entity;

use InvalidArgumentException;

/**
 * Artist
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class Artist
{
    /**
     * Valid types
     *
     * @var array
     */
    protected static $types = array (
        'Group', 'Person'
    );

    /**
     * The MusicBrainz id of the Artist
     *
     * e.g 65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab
     *
     * @var string|null (MBID)
     */
    protected $mbid;

    /**
     * The type of the Artist (e.g. Group)
     *
     * @var string
     */
    protected $type;

    /**
     * The name of the Artist
     *
     * @var string
     */
    protected $name;

    /**
     * The sortname of the Artist
     *
     * @var string
     */
    protected $sortName;

    /**
     * The Area
     *
     * @var Area
     */
    protected $area;

    /**
     * The begin Area
     *
     * @var Area
     */
    protected $beginArea;

    /**
     * The life span of the Artist
     *
     * @var LifeSpan
     */
    protected $lifeSpan;

    /**
     * The list of Alias(es)
     *
     * @var AliasList
     */
    protected $aliasList;

    /**
     * The list of Ipi(s)
     *
     * @var IpiList
     */
    protected $ipiList;

    /**
     * The list of Tags associated with the Artist
     *
     * @var TagList
     */
    protected $tagList;

    /**
     * Score of the Artist (as used in Search)
     *
     * ext:score
     *
     * @var int
     */
    protected $score;

    /**
     * The gender of the Artist
     *
     * @var string|null
     */
    protected $gender;

    /**
     * The disambiguation value of the Artist
     *
     * @var string
     */
    protected $disambiguation;

    /**
     * The country of the Artist
     *
     * @var string|null
     */
    protected $country;

    /**
     * Return the mbid value of the Artist
     *
     * @return string|null
     */
    public function getMbid()
    {
        return $this->mbid;
    }

    /**
     * Set the mbid value of the Artist
     *
     * @param string|null $mbid
     *
     * @return Artist
     */
    public function setMbid($mbid = null)
    {
        return $this->setId($mbid);
    }

    /**
     * Return the mbid value of the Artist
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->getMbid();
    }

    /**
     * Set the id value of the Artist
     *
     * Example: 220b8211-cc4f-44dc-8860-d40c4bdeb95a
     *
     * @param string|null $id
     *
     * @return Artist
     */
    public function setId($id = null)
    {
        if (! is_null($id)) {
            if (! preg_match('#\A[0-9a-f]{8}(?:-[0-9a-f]{4}){3}-[0-9a-f]{12}\z#', $id)) {
                throw new InvalidArgumentException('The supplied id is invalid');
            }
        }
        $this->mbid = $id;
        return $this;
    }

    /**
     * Return the type of the Artist
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the type of the Artist
     *
     * @param string|null $type
     *
     * @return Artist
     */
    public function setType($type = null)
    {
        if (! is_null($type)) {
            if (! is_string($type) || ! in_array($type, static::$types)) {
                throw new InvalidArgumentException(
                    'Supplied type is invalid'
                );
            }
        }
        $this->type = $type;
        return $this;
    }

    /**
     * Return the name of the Artist
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name of the Artist
     *
     * @param string|null $name
     *
     * @return Artist
     */
    public function setName($name = null)
    {
        if (! is_null($name)) {
            if (! is_string($name)) {
                throw new InvalidArgumentException('Supplied name is invalid');
            }
        }
        $this->name = $name;
        return $this;
    }

    /**
     * Return the sortName value
     *
     * @return string|null
     */
    public function getSortName()
    {
        return $this->sortName;
    }

    /**
     * Set the sortName property
     *
     * @param string|null $sortName
     *
     * @throws InvalidArgumentException
     * @return Artist
     */
    public function setSortName($sortName = null)
    {
        if (! is_null($sortName) && ! is_string($sortName)) {
            throw new InvalidArgumentException('Expects a string');
        }
        $this->sortName = $sortName;
        return $this;
    }

    /**
     * Return the Area
     *
     * @return Area|null
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set the Area
     *
     * @param Area $area
     *
     * @return Artist
     */
    public function setArea(Area $area = null)
    {
        $this->area = $area;
        return $this;
    }

    /**
     * Return the beginArea
     *
     * @return Area|null
     */
    public function getBeginArea()
    {
        return $this->beginArea;
    }

    /**
     * Set the beginArea
     *
     * @param Area $beginArea
     *
     * @return Artist
     */
    public function setBeginArea(Area $beginArea = null)
    {
        $this->beginArea = $beginArea;
        return $this;
    }

    /**
     * Return the LifeSpan
     *
     * @return LifeSpan
     */
    public function getLifeSpan()
    {
        return $this->lifeSpan;
    }

    /**
     * Set the LifeSpan
     *
     * @param LifeSpan $lifeSpan
     *
     * @return Artist
     */
    public function setLifeSpan(LifeSpan $lifeSpan = null)
    {
        $this->lifeSpan = $lifeSpan;
        return $this;
    }

    /**
     * Add an Alias to the Artist
     *
     * @param Alias $alias
     *
     * @return Artist
     */
    public function addAlias(Alias $alias)
    {
        $this->getAliasList()->addAlias($alias);
        return $this;
    }

    /**
     * Return the AliasList
     *
     * If the AliasList has not already been set, this method will
     * create a new AliasList instance
     *
     * @return AliasList
     */
    public function getAliasList()
    {
        if (! isset($this->aliasList)) {
            $this->aliasList = new AliasList();
        }
        return $this->aliasList;
    }

    /**
     * Set the AliasList
     *
     * @param AliasList $aliasList
     *
     * @return Artist
     */
    public function setAliasList(AliasList $aliasList = null)
    {
        $this->aliasList = $aliasList;
        return $this;
    }

    /**
     * Return the IpiList
     *
     * @return IpiList
     */
    public function getIpiList()
    {
        if (! isset($this->ipiList)) {
            $this->ipiList = new IpiList();
        }
        return $this->ipiList;
    }

    /**
     * Set the IpiList
     *
     * @param IpiList $ipiList
     *
     * @return Artist
     */
    public function setIpiList(IpiList $ipiList = null)
    {
        $this->ipiList = $ipiList;
        return $this;
    }

    /**
     * Add an Ipi to the Artist
     *
     * @param \MusicBrainz\Entity\Ipi $ipi
     *
     * @return Artist
     */
    public function addIpi(Ipi $ipi)
    {
        $this->getIpiList()->addIpi($ipi);
        return $this;
    }

    /**
     * Return the TagList
     *
     * @return TagList
     */
    public function getTagList()
    {
        if (! isset($this->tagList)) {
            $this->tagList = new TagList();
        }
        return $this->tagList;
    }

    /**
     * Set the TagList
     *
     * @param TagList $tagList
     *
     * @return Artist
     */
    public function setTagList(TagList $tagList = null)
    {
        $this->tagList = $tagList;
        return $this;
    }

    /**
     * Add a Tag to the Artist
     *
     * @param Tag $tag
     *
     * @return Artist
     */
    public function addTag(Tag $tag)
    {
        $this->getTagList()->addTag($tag);
        return $this;
    }

    /**
     * Return the score
     *
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set the score property
     *
     * @param int|null $score
     *
     * @return Artist
     */
    public function setScore($score = null)
    {
        $score = (int)$score;
        if (! ($score >= 0 &&  $score <= 100)) {
            throw new InvalidArgumentException('Expects a score between 0 and 100');
        }
        $this->score = $score;
        return $this;
    }

    /**
     * Return the gender property
     *
     * @return string|null
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the gender property
     *
     * @param string|null $gender
     *
     * @throws InvalidArgumentException
     * @return Artist
     */
    public function setGender($gender = null)
    {
        if (! is_null($gender) && ! is_string($gender)) {
            throw new InvalidArgumentException('Expects a string');
        }
        $this->gender = $gender;
        return $this;
    }

    /**
     * Return the disambiguation
     *
     * @return string|null
     */
    public function getDisambiguation()
    {
        return $this->disambiguation;
    }

    /**
     * Set the disambiguation
     *
     * @param string|null $disambiguation
     *
     * @throws InvalidArgumentException
     * @return Artist
     */
    public function setDisambiguation($disambiguation = null)
    {
        if (! is_null($disambiguation) && ! is_string($disambiguation)) {
            throw new InvalidArgumentException('Expects a string');
        }
        $this->disambiguation = $disambiguation;
        return $this;
    }

    /**
     * Return the country property
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the country property
     *
     * @param string|null $country
     *
     * @throws InvalidArgumentException
     * @return Artist
     */
    public function setCountry($country = null)
    {
        if (! is_null($country) && ! is_string($country)) {
            throw new InvalidArgumentException('Expects a string');
        }
        $this->country = $country;
        return $this;
    }
}
