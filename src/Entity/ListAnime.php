<?php

namespace App\Entity;

use App\Repository\ListAnimeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListAnimeRepository::class)]
class ListAnime
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Anime::class, inversedBy: 'listAnimes')]
    private Collection $anime;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'listAnimes')]
    private Collection $user;

    public function __construct()
    {
        $this->anime = new ArrayCollection();
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Anime>
     */
    public function getAnime(): Collection
    {
        return $this->anime;
    }

    public function addAnime(Anime $anime): static
    {
        if (!$this->anime->contains($anime)) {
            $this->anime->add($anime);
        }

        return $this;
    }

    public function removeAnime(Anime $anime): static
    {
        $this->anime->removeElement($anime);

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): static
    {
        if (!$this->user->contains($user)) {
            $this->user->add($user);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        $this->user->removeElement($user);

        return $this;
    }
}
