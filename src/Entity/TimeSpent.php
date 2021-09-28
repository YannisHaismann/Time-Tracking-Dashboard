<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TimeSpentRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(normalizationContext={"groups"={"timeSpentActivity"}})
 * @ORM\Entity(repositoryClass=TimeSpentRepository::class)
 */
class TimeSpent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"timeSpentActivity"})
     */
    private $Hour;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"timeSpentActivity"})
     */
    private $Date;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="timeSpents")
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity=Activity::class, inversedBy="timeSpents")
     * @Groups({"timeSpentActivity"})
     */
    private $Activity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHour(): ?int
    {
        return $this->Hour;
    }

    public function setHour(int $Hour): self
    {
        $this->Hour = $Hour;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->User;
    }

    public function setUser(?user $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getActivity(): ?activity
    {
        return $this->Activity;
    }

    public function setActivity(?activity $Activity): self
    {
        $this->Activity = $Activity;

        return $this;
    }
}
