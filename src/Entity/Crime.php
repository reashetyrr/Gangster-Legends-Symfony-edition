<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CrimeRepository")
 * @ORM\Table(name="crimes")
 */
class Crime
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
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private $cooldown = 0;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private $money = 0;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private $max_money = 0;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private $bullets = 0;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private $max_bullets = 0;

    /**
     * @ORM\Column(type="integer", options={"default" : 1})
     */
    private $exp = 1;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private $level = 0;

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

    public function getCooldown(): ?int
    {
        return $this->cooldown;
    }

    public function setCooldown(int $cooldown): self
    {
        $this->cooldown = $cooldown;

        return $this;
    }

    public function getMoney(): ?int
    {
        return $this->money;
    }

    public function setMoney(int $money): self
    {
        $this->money = $money;

        return $this;
    }

    public function getMaxMoney(): ?int
    {
        return $this->max_money;
    }

    public function setMaxMoney(int $max_money): self
    {
        $this->max_money = $max_money;

        return $this;
    }

    public function getBullets(): ?int
    {
        return $this->bullets;
    }

    public function setBullets(int $bullets): self
    {
        $this->bullets = $bullets;

        return $this;
    }

    public function getMaxBullets(): ?int
    {
        return $this->max_bullets;
    }

    public function setMaxBullets(int $max_bullets): self
    {
        $this->max_bullets = $max_bullets;

        return $this;
    }

    public function getExp(): ?int
    {
        return $this->exp;
    }

    public function setExp(int $exp): self
    {
        $this->exp = $exp;

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
