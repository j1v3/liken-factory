<?php

namespace App\Traits;

trait Stampable
{

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="contents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class, inversedBy="contents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $role;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     * @ORM\Column(name="uptaded_at", type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     * @var \DateTime
     * @ORM\Column(name="validated_at", type="datetime", nullable=true)
     */
    protected $validatedAt;

    /**
     * @var \DateTime
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    protected $deletedAt;

    /**
     * @var Boolean
     * @ORM\Column(name="is_active", type="boolean", nullable=true, options={"default": 0})
     */
    protected $isActive;

    public function __construct()
    {
        if (!$this->getId()) {
            $this->setCreatedAt(new \DateTime());
        } else {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Set createdAt
     *
     * @param  \DateTime    $createdAt
     * @return self
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param  \DateTime    $updatedAt
     * @return self
     */
    public function setUptadedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set validatedAt
     *
     * @param  \DateTime    $validatedAt
     * @return self
     */
    public function setValidatedAt(\DateTime $validatedAt)
    {
        $this->validatedAt = $validatedAt;

        return $this;
    }

    /**
     * Get validatedAt
     *
     * @return \DateTime
     */
    public function getValidatedAt()
    {
        return $this->validatedAt;
    }

    /**
     * Set deletedAt
     *
     * @param  \DateTime    $deletedAt
     * @return self
     */
    public function setDeletedAt(\DateTime $deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set isActive
     *
     * @param  Boolean    $isActive
     * @return self
     */
    public function setIsActive(Boolean $isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return Boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

}