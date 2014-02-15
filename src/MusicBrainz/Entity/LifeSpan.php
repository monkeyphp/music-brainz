<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace MusicBrainz\Entity;
/**
 * Description of LifeSpan
 *
 * @author David White <david@monkeyphp.com>
 */
class LifeSpan
{
    protected $begin;
    
    protected $ended;
    
    public function getBegin()
    {
        return $this->begin;
    }

    public function getEnded()
    {
        return $this->ended;
    }

    public function setBegin($begin)
    {
        $this->begin = $begin;
        return $this;
    }

    public function setEnded($ended)
    {
        $this->ended = $ended;
        return $this;
    }


}
