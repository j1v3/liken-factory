<?php

namespace App\Traits;

trait Stampable
{
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
     * @var bool
     * @ORM\Column(name="validated_at", type="datetime", nullable=true)
     */
    protected $validatedAt;

    /**
     * @var \DateTime
     * @ORM\Column(name="deleted_At", type="datetime", nullable=true)
     */
    protected $deletedAt;

    /**
     * @var bool
     * @ORM\Column(name="is_Active", type="boolean", options={"default":false})
     */
    protected $isActive = false;

    public function __construct()
    {
        if (!$this->getId()) {
            $this->setCreatedAt(new \DateTime());
        } else {
            $this->setUpdatedAt(new \DateTime());
        }
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
     * @param  boolean    $isActive
     * @return self
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

}