<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table(name="karo_teilnehmer", indexes={@ORM\Index(name="U_ID", columns={"U_ID"})})
 * @ORM\Entity
 */
class Player
{
    public function __construct()
    {
        $this->moves = new ArrayCollection();
    }

    /*
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;


    /**
     * var \AppBundle\Entity\Move
     * @ORM\OneToMany(targetEntity="Move", mappedBy="player")
     * @ORM\OrderBy({"date" = "ASC"})
     */
    private $moves;


    /**
     * @var boolean
     *
     * @ORM\Column(name="moved", type="boolean", nullable=false)
     */
    private $moved;

    /**
     * @var boolean
     *
     * @ORM\Column(name="finished", type="boolean", nullable=false)
     */
    private $finished;

    /**
     * @var Game
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="players")
     * @ORM\JoinColumn(name="G_ID", referencedColumnName="G_ID")
     */
    private $game;

    /**
     * @var User
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="U_ID", referencedColumnName="U_ID")
     */
    private $user;

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function getFinished()
    {
        return $this->finished;

    }

    /**
     * @return Game
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function __toString()
    {
        return $this->user->getLogin();
    }

    public function getMoves()
    {
        return $this->moves;
    }

    /**
     * @return Move
     */
    public function getLastMove()
    {
        return $this->moves->last();
    }


}
