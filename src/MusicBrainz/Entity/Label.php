<?php
/**
 * Label.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
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
namespace MusicBrainz\Entity;

/**
 * Label
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class Label
{
    /**
     * The Mbid of the Label
     *
     * @var Mbid
     */
    protected $mbid;

    /**
     * The type of the Label
     *
     * @var LabelType|null
     */
    protected $type;

    /**
     * The Score
     *
     * @var Score
     */
    protected $score;

    /**
     * The Name of the Label
     *
     * @var Name
     */
    protected $name;

    /**
     * The Label sort name
     *
     * @var Name
     */
    protected $sortName;

    /**
     * The LabelCode
     *
     * @var LabelCode
     */
    protected $labelCode;

    /**
     * The Country
     *
     * @var Country
     */
    protected $country;

    /**
     * The Area
     *
     * @var Area
     */
    protected $area;

    /**
     * The Label LifeSpan
     *
     * @var LifeSpan
     */
    protected $lifeSpan;

    /**
     * The AliasList
     *
     * @var AliasList
     */
    protected $aliasList;

    /**
     * The TagList
     *
     * @var TagList
     */
    protected $tagList;

    /**
     * The IpiList
     *
     * @var IpiList
     */
    protected $ipiList;

    /**
     * Return the Mbid
     *
     * @return Mbid|null
     */
    public function getMbid()
    {
        return $this->mbid;
    }

    /**
     * Return the LabelType
     *
     * @return LabelType|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Return the Score
     *
     * @return Score|null
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Return the Name
     *
     * @return Name|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Return the Name
     *
     * @return Name|null
     */
    public function getSortName()
    {
        return $this->sortName;
    }

    /**
     * Return the LabelCode
     *
     * @return LabelCode|null
     */
    public function getLabelCode()
    {
        return $this->labelCode;
    }

    /**
     * Return the Country
     *
     * @return Country|null
     */
    public function getCountry()
    {
        return $this->country;
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
     * Return the LifeSpan
     *
     * @return LifeSpan|null
     */
    public function getLifeSpan()
    {
        return $this->lifeSpan;
    }

    /**
     * Set the Mbid instance
     *
     * @param Mbid $mbid
     *
     * @return Label
     */
    public function setMbid(Mbid $mbid)
    {
        $this->mbid = $mbid;
        return $this;
    }

    /**
     * Set the LabelType
     *
     * @param LabelType $type
     *
     * @return Label
     */
    public function setType(LabelType $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Set the Score
     *
     * @param Score $score
     *
     * @return Label
     */
    public function setScore(Score $score)
    {
        $this->score = $score;
        return $this;
    }

    /**
     * Set the Name
     *
     * @param Name $name
     *
     * @return Label
     */
    public function setName(Name $name = null)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Set the Name instance
     *
     * @param Name $sortName
     *
     * @return Label
     */
    public function setSortName(Name $sortName = null)
    {
        $this->sortName = $sortName;
        return $this;
    }

    /**
     * Set the LabelCode instance
     *
     * @param LabelCode $labelCode
     *
     * @return Label
     */
    public function setLabelCode(LabelCode $labelCode)
    {
        $this->labelCode = $labelCode;
        return $this;
    }

    /**
     * Set the Country
     *
     * @param Country $country
     *
     * @return Label
     */
    public function setCountry(Country $country = null)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Set the Area
     *
     * @param Area $area
     *
     * @return Label
     */
    public function setArea(Area $area = null)
    {
        $this->area = $area;
        return $this;
    }

    /**
     * Set the LifeSpan instance
     *
     * @param LifeSpan $lifeSpan
     *
     * @return Label
     */
    public function setLifeSpan(LifeSpan $lifeSpan = null)
    {
        $this->lifeSpan = $lifeSpan;
        return $this;
    }

    /**
     * Add an Alias to the Label
     *
     * @param Alias $alias
     *
     * @return Label
     */
    public function addAlias(Alias $alias)
    {
        $this->getAliasList()->addAlias($alias);
        return $this;
    }

    /**
     * Return the AliasList
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
     * @return Label
     */
    public function setAliasList(AliasList $aliasList = null)
    {
        $this->aliasList = $aliasList;
        return $this;
    }

    /**
     * Add a Tag to the Label
     *
     * @param Tag $tag
     *
     * @return Label
     */
    public function addTag(Tag $tag)
    {
        $this->getTagList()->addTag($tag);
        return $this;
    }

    /**
     * Return the TagList instance
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
     * Set the TagList instance
     *
     * @param TagList $tagList
     *
     * @return Label
     */
    public function setTagList(TagList $tagList = null)
    {
        $this->tagList = $tagList;
        return $this;
    }

    /**
     * Return the IpiList instance
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
     * @return Label
     */
    public function setIpiList(IpiList $ipiList = null)
    {
        $this->ipiList = $ipiList;
        return $this;
    }

    /**
     * Add an Ipi to the Label
     *
     * @param Ipi $ipi
     *
     * @return Label
     */
    public function addIpi(Ipi $ipi)
    {
        $this->getIpiList()->addIpi($ipi);
        return $this;
    }
}
