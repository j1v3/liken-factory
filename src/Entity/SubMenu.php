<?php

namespace App\Entity;

use App\Repository\SubMenuRepository;
use App\Traits\Stampable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubMenuRepository::class)
 */
class SubMenu
{

    use Stampable;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $rank;

    /**
     * @ORM\ManyToOne(targetEntity=Menu::class, inversedBy="subMenus")
     * @ORM\JoinColumn(nullable=false)
     */
    private $menu;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="subMenus")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class, inversedBy="subMenus")
     * @ORM\JoinColumn(nullable=false)
     */
    private $role;

    /**
     * @ORM\OneToMany(targetEntity=Content::class, mappedBy="subMenu")
     * @ORM\OrderBy({"rank" = "ASC"})
     */
    private $contents;

    /**
     * @ORM\OneToMany(targetEntity=SubSubMenu::class, mappedBy="subMenu", orphanRemoval=true)
     * @ORM\OrderBy({"rank" = "ASC"})
     */
    private $subSubMenus;

    public function __construct()
    {
        $this->contents = new ArrayCollection();
        $this->subSubMenus = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRank(): ?int
    {
        return $this->rank;
    }

    public function setRank(int $rank): self
    {
        $this->rank = $rank;

        return $this;
    }

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    public function setMenu(?Menu $menu): self
    {
        $this->menu = $menu;

        return $this;
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
     * @return Collection|Content[]
     */
    public function getContents(): Collection
    {
        return $this->contents;
    }

    public function addContents(Content $contents): self
    {
        if (!$this->contents->contains($contents)) {
            $this->contents[] = $contents;
            $contents->setSubMenu($this);
        }

        return $this;
    }

    public function removeContents(Content $contents): self
    {
        if ($this->content->removeElement($contents)) {
            // set the owning side to null (unless already changed)
            if ($contents->getSubMenu() === $this) {
                $contents->setSubMenu(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SubSubMenu[]
     */
    public function getSubSubMenus(): Collection
    {
        return $this->subSubMenus;
    }

    public function addSubSubMenu(SubSubMenu $subSubMenu): self
    {
        if (!$this->subSubMenus->contains($subSubMenu)) {
            $this->subSubMenus[] = $subSubMenu;
            $subSubMenu->setSubMenu($this);
        }

        return $this;
    }

    public function removeSubSubMenu(SubSubMenu $subSubMenu): self
    {
        if ($this->subSubMenus->removeElement($subSubMenu)) {
            // set the owning side to null (unless already changed)
            if ($subSubMenu->getSubMenu() === $this) {
                $subSubMenu->setSubMenu(null);
            }
        }

        return $this;
    }
}
