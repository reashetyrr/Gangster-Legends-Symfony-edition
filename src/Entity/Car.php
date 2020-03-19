<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 * @ORM\Table(name="cars")
 */
class Car
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private $value = 0;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private $theft_chance = 0;

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

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getTheftChance(): ?int
    {
        return $this->theft_chance;
    }

    public function setTheftChance(int $theft_chance): self
    {
        $this->theft_chance = $theft_chance;

        return $this;
    }
}
