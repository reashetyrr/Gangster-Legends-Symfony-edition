<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ThemeRepository")
 */
class Theme
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="object")
     */
    private $templates = \stdClass::class;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $creator;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $assets = \stdClass::class;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTemplates()
    {
        return $this->templates;
    }

    public function setTemplates($templates): self
    {
        $this->templates = $templates;

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

    public function getTemplate($template_reference) {
        return isset($this->templates[$template_reference]) ? $this->templates[$template_reference] : $template_reference;
    }

    public function getStylesheets(): Array
    {
        return $this->assets['stylesheets'];
    }

    public function getImages()
    {
        return $this->assets['images'];
    }

    public function getJavascripts(): Array {
        return $this->assets['javascripts'];
    }
}
