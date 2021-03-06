<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KaroChat
 *
 * @ORM\Table(name="karo_chat", uniqueConstraints={@ORM\UniqueConstraint(name="lineId", columns={"lineId"})})
 * @ORM\Entity
 */
class ChatMessage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="lineId", type="integer", nullable=false)
     */
    private $lineid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ts", type="datetime", nullable=true)
     */
    private $ts;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=50, nullable=false)
     */
    private $login;

    /**
     * @var integer
     *
     * @ORM\Column(name="U_ID", type="integer", nullable=true)
     */
    private $uId;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=false)
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="after", type="datetime", nullable=true)
     */
    private $after;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="before", type="datetime", nullable=true)
     */
    private $before;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    public function __construct(User $user, $text)
    {
        $this->login = $user->getUsername();
        $this->uId = $user->getId();
        $this->text = $text;
        $this->ts = time();
        $this->after = time();
        $this->before = time();
    }

    /**
     * @return \DateTime
     */
    public function getTs()
    {
        return $this->ts;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

}
