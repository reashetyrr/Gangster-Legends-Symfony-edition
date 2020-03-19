<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GangRepository")
 * @ORM\Table(name="gangs")
 */
class Gang
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $bank;

    /**
     * @ORM\Column(type="text")
     */
    private $info;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $location;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="gang", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $boss;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $underboss;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBank(): ?int
    {
        return $this->bank;
    }

    public function setBank(int $bank): self
    {
        $this->bank = $bank;

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(string $info): self
    {
        $this->info = $info;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLocation(): ?int
    {
        return $this->location;
    }

    public function setLocation(int $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getBoss(): ?User
    {
        return $this->boss;
    }

    public function setBoss(?User $boss): self
    {
        $this->boss = $boss;

        return $this;
    }

    public function getUnderboss(): ?User
    {
        return $this->underboss;
    }

    public function setUnderboss(User $underboss): self
    {
        $this->underboss = $underboss;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }
}
