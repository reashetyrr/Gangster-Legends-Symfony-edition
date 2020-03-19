<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="users")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\News", mappedBy="author")
     */
    private $news_items;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Gang", mappedBy="boss", cascade={"persist", "remove"})
     */
    private $gang;

    public function __construct()
    {
        $this->news_items = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }


    /**
     * @return Collection|News[]
     */
    public function getNewsItems(): Collection
    {
        return $this->news_items;
    }

    public function addNewsItem(News $newsItem): self
    {
        if (!$this->news_items->contains($newsItem)) {
            $this->news_items[] = $newsItem;
            $newsItem->setAuthor($this);
        }

        return $this;
    }

    public function removeNewsItem(News $newsItem): self
    {
        if ($this->news_items->contains($newsItem)) {
            $this->news_items->removeElement($newsItem);
            // set the owning side to null (unless already changed)
            if ($newsItem->getAuthor() === $this) {
                $newsItem->setAuthor(null);
            }
        }

        return $this;
    }

    public function getGang(): ?Gang
    {
        return $this->gang;
    }

    public function setGang(?Gang $gang): self
    {
        $this->gang = $gang;

        // set (or unset) the owning side of the relation if necessary
        $newBoss = null === $gang ? null : $this;
        if ($gang->getBoss() !== $newBoss) {
            $gang->setBoss($newBoss);
        }

        return $this;
    }
}
