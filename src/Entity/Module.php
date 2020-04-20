<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModuleRepository")
 */
class Module
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
     * @ORM\Column(type="string", length=255)
     */
    private $creator;

    /**
     * @ORM\Column(type="object")
     */
    private $templateSettings;

    /**
     * @ORM\Column(type="object")
     */
    private $assets;

    /**
     * @ORM\Column(nullable=true)
     * @ORM\ManyToOne(targetEntity="App\Entity\Module")
     */
    private $extends;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bundle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $namespace;


    /**
     * @ORM\Column(type="boolean")
     */
    private $canDisable = true;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $menuStructure = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private $active = false;

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

    public function getCreator(): ?string
    {
        return $this->creator;
    }

    public function setCreator(string $creator): self
    {
        $this->creator = $creator;

        return $this;
    }

    public function getTemplateSettings()
    {
        return $this->templateSettings;
    }

    public function setTemplateSettings($templateSettings): self
    {
        $this->templateSettings = $templateSettings;

        return $this;
    }

    public function getAssets()
    {
        return $this->assets;
    }

    public function setAssets($assets): self
    {
        $this->assets = $assets;

        return $this;
    }

    public function getExtends(): ?self
    {
        return $this->extends;
    }

    public function setExtends(?self $extends): self
    {
        $this->extends = $extends;

        return $this;
    }

    public function getBundle(): ?string
    {
        return $this->bundle;
    }

    public function setBundle(string $bundle): self
    {
        $this->bundle = $bundle;

        return $this;
    }

    public function getNamespace(): ?string
    {
        return $this->namespace;
    }

    public function setNamespace(string $namespace): self
    {
        $this->namespace = $namespace;

        return $this;
    }

    public function getCanDisable(): ?bool
    {
        return $this->canDisable;
    }

    public function setCanDisable(bool $canDisable): self
    {
        $this->canDisable = $canDisable;

        return $this;
    }

    public function getMenuStructure(): ?array
    {
        return $this->menuStructure;
    }

    public function setMenuStructure(?array $menuStructure): self
    {
        $this->menuStructure = $menuStructure;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }
}
