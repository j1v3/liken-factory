<?php

namespace App\Entity;

use App\Repository\UserRepository;
use App\Traits\Stampable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    use Stampable;
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

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
     * @ORM\OneToMany(targetEntity=Menu::class, mappedBy="owner")
     */
    private $menus;

    /**
     * @ORM\OneToMany(targetEntity=SubMenu::class, mappedBy="owner")
     */
    private $subMenus;

    /**
     * @ORM\OneToMany(targetEntity=SubSubMenu::class, mappedBy="owner")
     */
    private $subSubMenus;

    /**
     * @ORM\OneToMany(targetEntity=Content::class, mappedBy="owner")
     */
    private $contents;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="owner")
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity=SurveyItem::class, mappedBy="owner")
     */
    private $surveyItems;

    /**
     * @ORM\OneToMany(targetEntity=Survey::class, mappedBy="owner")
     */
    private $surveys;

    /**
     * @ORM\OneToMany(targetEntity=Survey::class, mappedBy="client")
     */
    private $surveysClient;

    /**
     * @ORM\OneToMany(targetEntity=Estimate::class, mappedBy="client")
     */
    private $estimates;

    /**
     * @ORM\OneToMany(targetEntity=ContentType::class, mappedBy="owner")
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
        $this->surveysClient = new ArrayCollection();
        $this->estimates = new ArrayCollection();
        $this->contentTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
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
            $menu->setOwner($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menus->removeElement($menu)) {
            // set the owning side to null (unless already changed)
            if ($menu->getOwner() === $this) {
                $menu->setOwner(null);
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
            $subMenu->setOwner($this);
        }

        return $this;
    }

    public function removeSubMenu(SubMenu $subMenu): self
    {
        if ($this->subMenus->removeElement($subMenu)) {
            // set the owning side to null (unless already changed)
            if ($subMenu->getOwner() === $this) {
                $subMenu->setOwner(null);
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
            $subSubMenu->setOwner($this);
        }

        return $this;
    }

    public function removeSubSubMenu(SubSubMenu $subSubMenu): self
    {
        if ($this->subSubMenus->removeElement($subSubMenu)) {
            // set the owning side to null (unless already changed)
            if ($subSubMenu->getOwner() === $this) {
                $subSubMenu->setOwner(null);
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
            $content->setOwner($this);
        }

        return $this;
    }

    public function removeContent(Content $content): self
    {
        if ($this->contents->removeElement($content)) {
            // set the owning side to null (unless already changed)
            if ($content->getOwner() === $this) {
                $content->setOwner(null);
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
            $image->setOwner($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getOwner() === $this) {
                $image->setOwner(null);
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
            $surveyItem->setOwner($this);
        }

        return $this;
    }

    public function removeSurveyItem(SurveyItem $surveyItem): self
    {
        if ($this->surveyItems->removeElement($surveyItem)) {
            // set the owning side to null (unless already changed)
            if ($surveyItem->getOwner() === $this) {
                $surveyItem->setOwner(null);
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
            $survey->setOwner($this);
        }

        return $this;
    }

    public function removeSurvey(Survey $survey): self
    {
        if ($this->surveys->removeElement($survey)) {
            // set the owning side to null (unless already changed)
            if ($survey->getOwner() === $this) {
                $survey->setOwner(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Survey[]
     */
    public function getSurveysClient(): Collection
    {
        return $this->surveysClient;
    }

    public function addSurveysClient(Survey $surveysClient): self
    {
        if (!$this->surveysClient->contains($surveysClient)) {
            $this->surveysClient[] = $surveysClient;
            $surveysClient->setClient($this);
        }

        return $this;
    }

    public function removeSurveysClient(Survey $surveysClient): self
    {
        if ($this->surveysClient->removeElement($surveysClient)) {
            // set the owning side to null (unless already changed)
            if ($surveysClient->getClient() === $this) {
                $surveysClient->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Estimate[]
     */
    public function getEstimates(): Collection
    {
        return $this->estimates;
    }

    public function addEstimate(Estimate $estimate): self
    {
        if (!$this->estimates->contains($estimate)) {
            $this->estimates[] = $estimate;
            $estimate->setClient($this);
        }

        return $this;
    }

    public function removeEstimate(Estimate $estimate): self
    {
        if ($this->estimates->removeElement($estimate)) {
            // set the owning side to null (unless already changed)
            if ($estimate->getClient() === $this) {
                $estimate->setClient(null);
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
            $contentType->setOwner($this);
        }

        return $this;
    }

    public function removeContentType(ContentType $contentType): self
    {
        if ($this->contentTypes->removeElement($contentType)) {
            // set the owning side to null (unless already changed)
            if ($contentType->getOwner() === $this) {
                $contentType->setOwner(null);
            }
        }

        return $this;
    }
}
