<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace MusicBrainz\Entity;
/**
 * Description of Artist
 *
 * @author David White <david@monkeyphp.com>
 */
class Artist
{
    protected $area;
    
    protected $beginArea;
    
    protected $lifeSpan;
    
    protected $aliases;
    
    protected $tags;
    
    protected $id;
    
    protected $type;
    
    protected $score;
    
    protected $name;
    
    protected $sortName;
    
    protected $gender;
    
    protected $country;
    
    public function getName()
    {
        return $this->name;
    }

    public function getSortName()
    {
        return $this->sortName;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setSortName($sortName)
    {
        $this->sortName = $sortName;
        return $this;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

        
    public function getArea()
    {
        return $this->area;
    }

    public function getBeginArea()
    {
        return $this->beginArea;
    }

    public function getLifeSpan()
    {
        return $this->lifeSpan;
    }

    public function getAliases()
    {
        return $this->aliases;
    }

    public function setAliases($aliases)
    {
        $this->aliases = $aliases;
        return $this;
    }

    
    public function getTagList()
    {
        return $this->tags;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setArea($area)
    {
        $this->area = $area;
        return $this;
    }

    public function setBeginArea($beginArea)
    {
        $this->beginArea = $beginArea;
        return $this;
    }

    public function setLifeSpan($lifeSpan)
    {
        $this->lifeSpan = $lifeSpan;
        return $this;
    }

    

    public function setTagList($tagList)
    {
        $this->tags = $tagList;
        return $this;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function setScore($score)
    {
        $this->score = $score;
        return $this;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }


}
