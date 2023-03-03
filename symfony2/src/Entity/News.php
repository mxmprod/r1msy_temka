<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NewsRepository::class)]
#[ORM\Table('news')]
class News
{
    #[ORM\Id()]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private $id;

    #[ORM\Column(type: 'string')]
    private $title;

    #[ORM\Column(type: 'datetime')]
    private $publishedAt;

    #[ORM\Column(type: 'string')]
    private $content;

    #[ORM\Column(type: 'string')]
    private $author;

    #[ORM\Column(type: 'string')]
    private $category;

    #[ORM\Column(type: 'string')]
    private $slug;

	public function getId() {
		return $this->id;
	}

	
	public function getTitle() {
		return $this->title;
	}
	

	public function setTitle($title): self {
		$this->title = $title;
		return $this;
	}

	public function getPublishedAt() {
		return $this->publishedAt;
	}

	public function getContent() {
		return $this->content;
	}

	public function setContent($content): self {
		$this->content = $content;
		return $this;
	}

	public function getAuthor() {
		return $this->author;
	}

	public function setAuthor($author): self {
		$this->author = $author;
		return $this;
	}

	public function getCategory() {
		return $this->category;
	}

	public function setCategory($category): self {
		$this->category = $category;
		return $this;
	}

	public function getSlug() {
		return $this->slug;
	}

	public function setSlug($slug): self {
		$this->slug = $slug;
		return $this;
	}
}
