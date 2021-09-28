<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ActivityRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ActivityRepository::class)
 */
class Activity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"timeSpentActivity"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=TimeSpent::class, mappedBy="Activity")
     */
    private $timeSpents;

    public function __construct()
    {
        $this->timeSpents = new ArrayCollection();
    }

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

    /**
     * @return Collection|TimeSpent[]
     */
    public function getTimeSpents(): Collection
    {
        return $this->timeSpents;
    }

    public function addTimeSpent(TimeSpent $timeSpent): self
    {
        if (!$this->timeSpents->contains($timeSpent)) {
            $this->timeSpents[] = $timeSpent;
            $timeSpent->setActivity($this);
        }

        return $this;
    }

    public function removeTimeSpent(TimeSpent $timeSpent): self
    {
        if ($this->timeSpents->removeElement($timeSpent)) {
            // set the owning side to null (unless already changed)
            if ($timeSpent->getActivity() === $this) {
                $timeSpent->setActivity(null);
            }
        }

        return $this;
    }
}
