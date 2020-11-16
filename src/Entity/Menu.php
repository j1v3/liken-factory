<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use App\Traits\Stampable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MenuRepository::class)
 */
class Menu
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
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="menus")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class, inversedBy="menus")
     * @ORM\JoinColumn(nullable=false)
     */
    private $role;

    /**
     * @ORM\OneToMany(targetEntity=SubMenu::class, mappedBy="menu", orphanRemoval=true)
     * @ORM\OrderBy({"rank" = "ASC"})
     */
    private $subMenus;

    /**
     * @ORM\OneToMany(targetEntity=SubSubMenu::class, mappedBy="menu")
     * @ORM\OrderBy({"rank" = "ASC"})
     */
    private $subSubMenus;

    /**
     * @ORM\OneToMany(targetEntity=Content::class, mappedBy="menu")
     * @ORM\OrderBy({"rank" = "ASC"})
     */
    private $contents;

    public function __construct()
    {
        $this->subMenus = new ArrayCollection();
        $this->subSubMenus = new ArrayCollection();
        $this->contents = new ArrayCollection();
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
     * @return Collection|SubMenu[]
     */
    public function getSubMenus(): Collection
    {
        return $this->subMenus;
    }

    public function addSubMenu(SubMenu $subMenu): self
    {
        if (!$this->subMenus->contains($subMenu)) {
            $this->subMenus[] = $subMenu;
            $subMenu->setMenu($this);
        }

        return $this;
    }

    public function removeSubMenu(SubMenu $subMenu): self
    {
        if ($this->subMenus->removeElement($subMenu)) {
            // set the owning side to null (unless already changed)
            if ($subMenu->getMenu() === $this) {
                $subMenu->setMenu(null);
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
            $subSubMenu->setMenu($this);
        }

        return $this;
    }

    public function removeSubSubMenu(SubSubMenu $subSubMenu): self
    {
        if ($this->subSubMenus->removeElement($subSubMenu)) {
            // set the owning side to null (unless already changed)
            if ($subSubMenu->getMenu() === $this) {
                $subSubMenu->setMenu(null);
            }
        }

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
            $contents->setMenu($this);
        }

        return $this;
    }

    public function removeContents(Content $contents): self
    {
        if ($this->contents->removeElement($contents)) {
            // set the owning side to null (unless already changed)
            if ($contents->getMenu() === $this) {
                $contents->setMenu(null);
            }
        }

        return $this;
    }

    public function getNavigation()
    {
        $arrayNavMenu = [];
            
            $arrayNavMenu = array_merge($arrayNavMenu, [ 'menu' => 
                                                            [
                                                                'name'        => $this->getName(),
                                                                'description' => $this->getDescription(),
                                                                // 'content'     => $this->getContent()->getName(),
                                                                'rank'        => $this->getRank(),
                                                                'role'        => $this->getRole()->getName(),
                                                                'owner'       => $this->getOwner()->getUserName(),
                                                                'isActive'    => $this->getIsActive()
                                                            ]
                                                        ]
                                                    );
 
            if ($this->getSubMenus()) {

                foreach ($this->getSubMenus() as $currentSubMenu) {
            
                    if ($this->getSubSubMenus()) {

                        $arrayNavMenu = array_merge($arrayNavMenu, [ 'subMenu' => 
                                                                    [
                                                                        'name'        => $currentSubMenu->getName(),
                                                                        'description' => $currentSubMenu->getDescription(),
                                                                        // 'content'     => $currentSubMenu->getContent()->getName(),
                                                                        'rank'        => $currentSubMenu->getRank(),
                                                                        'role'        => $currentSubMenu->getRole()->getName(),
                                                                        'owner'       => $currentSubMenu->getOwner()->getUserName(),
                                                                        'menu'        => $currentSubMenu->getMenu()->getName(),
                                                                        'isActive'    => $currentSubMenu->getIsActive()
                                                                    ]
                                                                ]
                                                            );

                        foreach ($this->getSubSubMenus() as $currentSubSubMenu) {

                            $arrayNavMenu = array_merge($arrayNavMenu, [ 'subSubMenu' => 
                                                                        [
                                                                            'name'        => $currentSubSubMenu->getName(),
                                                                            'description' => $currentSubSubMenu->getDescription(),
                                                                            // 'content'     => $currentSubSubMenu->getContent()->getName(),
                                                                            'rank'        => $currentSubSubMenu->getRank(),
                                                                            'role'        => $currentSubSubMenu->getRole()->getName(),
                                                                            'owner'       => $currentSubSubMenu->getOwner()->getUserName(),
                                                                            'menu'        => $currentSubSubMenu->getMenu()->getName(),
                                                                            'subMenu'     => $currentSubSubMenu->getSubMenu()->getName(),
                                                                            'isActive'    => $currentSubSubMenu->getIsActive()
                                                                        ]
                                                                    ]
                                                                );     
                        }
                    }
                    else {
                    
                        $arrayNavMenu = array_merge($arrayNavMenu, [ 'subMenu' => 
                                                                    [
                                                                        'name'        => $currentSubMenu->getName(),
                                                                        'description' => $currentSubMenu->getDescription(),
                                                                        // 'content'     => $currentSubMenu->getContent()->getName(),
                                                                        'rank'        => $currentSubMenu->getRank(),
                                                                        'role'        => $currentSubMenu->getRole()->getName(),
                                                                        'owner'       => $currentSubMenu->getOwner()->getUserName(),
                                                                        'menu'        => $currentSubMenu->getMenu()->getName(),
                                                                        'isActive'    => $currentSubMenu->getIsActive()
                                                                    ]
                                                                ]
                                                            );
                    }
                }
            }

        return $arrayNavMenu;
    }
}
