<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use App\Traits\Stampable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoleRepository::class)
 */
class Role
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
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Menu::class, mappedBy="role")
     */
    private $menus;

    /**
     * @ORM\OneToMany(targetEntity=SubMenu::class, mappedBy="role")
     */
    private $subMenus;

    /**
     * @ORM\OneToMany(targetEntity=SubSubMenu::class, mappedBy="role")
     */
    private $subSubMenus;

    /**
     * @ORM\OneToMany(targetEntity=Content::class, mappedBy="role")
     */
    private $contents;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="role")
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity=SurveyItem::class, mappedBy="role")
     */
    private $surveyItems;

    /**
     * @ORM\OneToMany(targetEntity=Survey::class, mappedBy="role")
     */
    private $surveys;

    /**
     * @ORM\OneToMany(targetEntity=ContentType::class, mappedBy="Role")
     */
    private $contentTypes;

    public function __construct()
    {
        $this->menus = new ArrayCollection();
        $this->subMenus = new ArrayCollection();
        $this->subSubMenus = new ArrayCollection();
        $this->contents = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->surveyItems = new ArrayCollection();
        $this->surveys = new ArrayCollection();
        $this->contentTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
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

    /**
     * @return Collection|Menu[]
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menus->contains($menu)) {
            $this->menus[] = $menu;
            $menu->setRole($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menus->removeElement($menu)) {
            // set the owning side to null (unless already changed)
            if ($menu->getRole() === $this) {
                $menu->setRole(null);
            }
        }

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
            $subMenu->setRole($this);
        }

        return $this;
    }

    public function removeSubMenu(SubMenu $subMenu): self
    {
        if ($this->subMenus->removeElement($subMenu)) {
            // set the owning side to null (unless already changed)
            if ($subMenu->getRole() === $this) {
                $subMenu->setRole(null);
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
            $subSubMenu->setRole($this);
        }

        return $this;
    }

    public function removeSubSubMenu(SubSubMenu $subSubMenu): self
    {
        if ($this->subSubMenus->removeElement($subSubMenu)) {
            // set the owning side to null (unless already changed)
            if ($subSubMenu->getRole() === $this) {
                $subSubMenu->setRole(null);
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

    public function addContent(Content $content): self
    {
        if (!$this->contents->contains($content)) {
            $this->contents[] = $content;
            $content->setRole($this);
        }

        return $this;
    }

    public function removeContent(Content $content): self
    {
        if ($this->contents->removeElement($content)) {
            // set the owning side to null (unless already changed)
            if ($content->getRole() === $this) {
                $content->setRole(null);
            }
        }

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
            $image->setRole($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getRole() === $this) {
                $image->setRole(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SurveyItem[]
     */
    public function getSurveyItems(): Collection
    {
        return $this->surveyItems;
    }

    public function addSurveyItem(SurveyItem $surveyItem): self
    {
        if (!$this->surveyItems->contains($surveyItem)) {
            $this->surveyItems[] = $surveyItem;
            $surveyItem->setRole($this);
        }

        return $this;
    }

    public function removeSurveyItem(SurveyItem $surveyItem): self
    {
        if ($this->surveyItems->removeElement($surveyItem)) {
            // set the owning side to null (unless already changed)
            if ($surveyItem->getRole() === $this) {
                $surveyItem->setRole(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Survey[]
     */
    public function getSurveys(): Collection
    {
        return $this->surveys;
    }

    public function addSurvey(Survey $survey): self
    {
        if (!$this->surveys->contains($survey)) {
            $this->surveys[] = $survey;
            $survey->setRole($this);
        }

        return $this;
    }

    public function removeSurvey(Survey $survey): self
    {
        if ($this->surveys->removeElement($survey)) {
            // set the owning side to null (unless already changed)
            if ($survey->getRole() === $this) {
                $survey->setRole(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ContentType[]
     */
    public function getContentTypes(): Collection
    {
        return $this->contentTypes;
    }

    public function addContentType(ContentType $contentType): self
    {
        if (!$this->contentTypes->contains($contentType)) {
            $this->contentTypes[] = $contentType;
            $contentType->setRole($this);
        }

        return $this;
    }

    public function removeContentType(ContentType $contentType): self
    {
        if ($this->contentTypes->removeElement($contentType)) {
            // set the owning side to null (unless already changed)
            if ($contentType->getRole() === $this) {
                $contentType->setRole(null);
            }
        }

        return $this;
    }
}
