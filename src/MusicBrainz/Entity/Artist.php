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

use MusicBrainz\Entity\Alias;
use MusicBrainz\Entity\AliasList;
use MusicBrainz\Entity\Area;
use MusicBrainz\Entity\Artist;
use MusicBrainz\Entity\Country;
use MusicBrainz\Entity\Ipi;
use MusicBrainz\Entity\IpiList;
use MusicBrainz\Entity\IsniList;
use MusicBrainz\Entity\LifeSpan;
use MusicBrainz\Entity\Name;
use MusicBrainz\Entity\RecordingList;
use MusicBrainz\Entity\ReleaseGroupList;
use MusicBrainz\Entity\ReleaseList;
use MusicBrainz\Entity\Tag;
use MusicBrainz\Entity\TagList;
use MusicBrainz\Entity\Type;
use MusicBrainz\Entity\WorkList;

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
     * The MusicBrainz id of the Artist
     *
     * e.g 65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab
     *
     * @var Mbid|null
     */
    protected $mbid;

    /**
     * The type of the Artist (e.g. Group)
     *
     * @var Type
     */
    protected $type;

    /**
     * The name of the Artist
     *
     * @var Name
     */
    protected $name;

    /**
     * The sortname of the Artist
     *
     * @var Name
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
     * An instance of AliasList
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
     * @var Score
     */
    protected $score;

    /**
     * The gender of the Artist
     *
     * @var Gender|null
     */
    protected $gender;

    /**
     * The disambiguation value of the Artist
     *
     * @var Disambiguation
     */
    protected $disambiguation;

    /**
     * The country of the Artist
     *
     * @var Country|null
     */
    protected $country;

    /**
     * Instance of IsniList
     *
     * @var IsniList
     */
    protected $isniList;

    /**
     * Instance of RecordingList
     *
     * @var RecordingList
     */
    protected $recordingList;

    /**
     * Instance of ReleaseList
     *
     * @var ReleaseList
     */
    protected $releaseList;

    /**
     * Instance of ReleaseGroupList
     *
     * @var ReleaseGroupList
     */
    protected $releaseGroupList;

    /**
     * Instnace of WorkList
     *
     * @var WorkList
     */
    protected $workList;

    /**
     * Return the mbid value of the Artist
     *
     * @return Mbid|null
     */
    public function getMbid()
    {
        return $this->mbid;
    }

    /**
     * Set the mbid value of the Artist
     *
     * @param Mbid|null $mbid
     *
     * @return Artist
     */
    public function setMbid(Mbid $mbid = null)
    {
        $this->mbid = $mbid;
        return $this;
    }

    /**
     * Return the type of the Artist
     *
     * @return Type|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the type of the Artist
     *
     * @param Type $type
     *
     * @return Artist
     */
    public function setType(Type $type = null)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Return the name of the Artist
     *
     * @return Name|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name of the Artist
     *
     * @param Name|null $name
     *
     * @return Artist
     */
    public function setName(Name $name = null)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Return the sortName value
     *
     * @return Name|null
     */
    public function getSortName()
    {
        return $this->sortName;
    }

    /**
     * Set the sortName property
     *
     * @param Name|null $sortName
     *
     * @return Artist
     */
    public function setSortName(Name $sortName = null)
    {
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
     * @param Ipi $ipi
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
     * @return Score
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set the score property
     *
     * @param Score|null $score
     *
     * @return Artist
     */
    public function setScore(Score $score = null)
    {
        $this->score = $score;
        return $this;
    }

    /**
     * Return the gender property
     *
     * @return Gender|null
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the gender property
     *
     * @param Gender|null $gender
     *
     * @return Artist
     */
    public function setGender($gender = null)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * Return the disambiguation
     *
     * @return Disambiguation|null
     */
    public function getDisambiguation()
    {
        return $this->disambiguation;
    }

    /**
     * Set the disambiguation
     *
     * @param Disambiguation|null $disambiguation
     *
     * @return Artist
     */
    public function setDisambiguation($disambiguation = null)
    {
        $this->disambiguation = $disambiguation;
        return $this;
    }

    /**
     * Return the country property
     *
     * @return Country|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the country property
     *
     * @param Country|null $country The Country instance
     *
     * @return Artist
     */
    public function setCountry(Country $country = null)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Return an instance of IsniList
     *
     * @return IsniList
     */
    public function getIsniList()
    {
        if (! isset($this->isniList)) {
            $this->isniList = new IsniList();
        }
        return $this->isniList;
    }

    /**
     * Set the IsniList instance
     *
     * @param IsniList $isniList
     *
     * @return Artist
     */
    public function setIsniList(IsniList $isniList = null)
    {
        $this->isniList = $isniList;
        return $this;
    }

    /**
     * Add an Isni instance
     *
     * @param Isni $isni
     *
     * @return Artist
     */
    public function addIsni(Isni $isni)
    {
        $this->getIsniList()->addIsni($isni);
        return $this;
    }

    /**
     * Return an instance of RecordingList
     *
     * @return RecordingList
     */
    public function getRecordingList()
    {
        if (! isset($this->recordingList)) {
            $this->recordingList = new RecordingList();
        }
        return $this->recordingList;
    }

    /**
     * Set the instance of RecordingList
     *
     * @param RecordingList $recordingList
     *
     * @return Artist
     */
    public function setRecordingList(RecordingList $recordingList = null)
    {
        $this->recordingList = $recordingList;
        return $this;
    }

    /**
     * Add a Recording to the Artist
     *
     * @param Recording $recording
     *
     * @return Artist
     */
    public function addRecording(Recording $recording)
    {
        $this->getRecordingList()->addRecording($recording);
        return $this;
    }

    /**
     * Return an instance of ReleaseList
     *
     * @return ReleaseList
     */
    public function getReleaseList()
    {
        if (! isset($this->releaseList)) {
            $this->releaseList = new ReleaseList();
        }
        return $this->releaseList;
    }

    /**
     * Set the RecordingList instance
     *
     * @param ReleaseList $releaseList
     *
     * @return Artist
     */
    public function setReleaseList(ReleaseList $releaseList = null)
    {
        $this->releaseList = $releaseList;
        return $this;
    }

    /**
     * Add a Release to the Artist
     *
     * @param Release $release
     *
     * @return Artist
     */
    public function addRelease(Release $release)
    {
        $this->getReleaseList()->addRelease($release);
        return $this;
    }

    /**
     *
     * @return ReleaseGroupList
     */
    public function getReleaseGroupList()
    {
        if (! isset($this->releaseGroupList)) {
            $this->releaseGroupList = new ReleaseGroupList();
        }
        return $this->releaseGroupList;
    }

    /**
     * Set the ReleaseGroupList instance
     *
     * @param ReleaseGroupList $releaseGroupList
     *
     * @return Artist
     */
    public function setReleaseGroupList(ReleaseGroupList $releaseGroupList = null)
    {
        $this->releaseGroupList = $releaseGroupList;
        return $this;
    }

    /**
     * Add a ReleaseGroup to the Artist
     *
     * @param ReleaseGroup $releaseGroup
     *
     * @return Artist
     */
    public function addReleaseGroup(ReleaseGroup $releaseGroup)
    {
        $this->getReleaseGroupList()->addReleaseGroup($releaseGroup);
        return $this;
    }

    /**
     * Return the WorkList instance
     *
     * @return WorkList
     */
    public function getWorkList()
    {
        if (! isset($this->workList)) {
            $this->workList = new WorkList();
        }
        return $this->workList;
    }

    /**
     *
     * @param WorkList $workList
     *
     * @return Artist
     */
    public function setWorkList(WorkList $workList = null)
    {
        $this->workList = $workList;
        return $this;
    }

    /**
     * Add a Work instance to the Artist
     *
     * @param Work $work
     *
     * @return Artist
     */
    public function addWork(Work $work)
    {
        $this->getWorkList()->addWork($work);
        return $this;
    }
}
