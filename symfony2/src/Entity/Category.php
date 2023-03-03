<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ORM\Table('categories')]
class Category
{

    #[ORM\Id()]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private $id;

    #[ORM\Column(type: 'string')]
    private $title;

    #[ORM\Column(type: 'string')]
    private $slug;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'categories')]
    private ?Category $category = null;

    #[ORM\OneToMany(targetEntity: Category::class, mappedBy: 'categories')]
    private Collection $categories;

	public function getId() {
		return $this->id;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getCategory(): ?Category {
		return $this->category;
	}
	
	public function setCategory(?Category $category): self {
		$this->category = $category;
		return $this;
	}

	public function getCategories(): Collection {
		return $this->categories;
	}
	
	public function setCategories(Collection $categories): self {
		$this->categories = $categories;
		return $this;
	}

	public function getSlug() {
		return $this->slug;
	}

	public function setSlug($slug): self {
		$this->slug = $slug;
		return $this;
	}
	public function setTitle($title): self {
		$this->title = $title;
		return $this;
	}
}