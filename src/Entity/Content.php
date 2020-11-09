<?php

namespace App\Entity;

use App\Repository\ContentRepository;
use App\Traits\Stampable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContentRepository::class)
 */
class Content
{
    use Stampable;
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subTitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $page;

    /**
     * @ORM\ManyToOne(targetEntity=Menu::class, inversedBy="content")
     */
    private $menu;

    /**
     * @ORM\ManyToOne(targetEntity=SubMenu::class, inversedBy="content")
     */
    private $subMenu;

    /**
     * @ORM\ManyToOne(targetEntity=SubSubMenu::class, inversedBy="content")
     */
    private $subSubMenu;

    /**
     * @ORM\ManyToMany(targetEntity=Image::class, mappedBy="contents")
     */
    private $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getSubTitle(): ?string
    {
        return $this->subTitle;
    }

    public function setSubTitle(?string $subTitle): self
    {
        $this->subTitle = $subTitle;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function setPage($page): self
    {
        $this->page = $page;

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

    public function getSubMenu(): ?SubMenu
    {
        return $this->subMenu;
    }

    public function setSubMenu(?SubMenu $subMenu): self
    {
        $this->subMenu = $subMenu;

        return $this;
    }

    public function getSubSubMenu(): ?SubSubMenu
    {
        return $this->subSubMenu;
    }

    public function setSubSubMenu(?SubSubMenu $subSubMenu): self
    {
        $this->subSubMenu = $subSubMenu;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->addContent($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            $image->removeContent($this);
        }

        return $this;
    }
}
