<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

// -> Ajouté pour régler les conditions de validation du formulaire éditeur d'article
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChapterRepository")
 */
class Chapter
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=10, max=255, minMessage="Titre trop court")
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Length(min=10)
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Url()
     */
    private $image;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="chapters")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    // Ici, avec ORM ORDER BY on peut régler l'ordre de l'affichage des commentaires liés aux articles!!!! cf. https://symfony.com/doc/current/doctrine.html
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="chapter", orphanRemoval=true)
     * @ORM\OrderBy({"createdAt" = "DESC"})
     */
    private $comments;
    
    // Mise à jour de l'entité pour autoriser un champs vide ou NULL : https://openclassrooms.com/forum/sujet/symfony-form-required-false
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $graph_title;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $graph_namex;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $graph_namey;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $graph_colorone;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $graph_type;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $graph_value;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $graph_subtitle;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $graph_urljson;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $graph_csvurl;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $graph_csvfilename;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $graph_csvtextdatas;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $graph_arrayjson;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $graph_seriesnamejson;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $graph_urlapi;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $graph_apifilters;
    
    public function __construct()
    {
        $this->comments = new ArrayCollection();
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setChapter($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getChapter() === $this) {
                $comment->setChapter(null);
            }
        }

        return $this;
    }
    // Cf. https://symfony.com/doc/current/doctrine/reverse_engineering.html
    // Cf. https://symfony.com/doc/3.3/doctrine.html
    // Utiliser le terminal de commande pour mettre à jour une Entité : après avoir indiqué "private $graphtitle" avec son annotation, il suffit de faire un coup de  "php bin/console make:entity --regenerate App" et les getters/setters sont générés !
    // Pour mettre ensuite à jour la BDD faire un "php bin/console doctrine:schema:update --dump-sql" puis "php bin/console doctrine:schema:update --force"
    public function getGraphTitle(): ?string
    {
        return $this->graph_title;
    }

    public function setGraphTitle(string $graph_title): self
    {
        $this->graph_title = $graph_title;

        return $this;
    }

    public function getGraphNamex(): ?string
    {
        return $this->graph_namex;
    }

    public function setGraphNamex(?string $graph_namex): self
    {
        $this->graph_namex = $graph_namex;

        return $this;
    }

    public function getGraphNamey(): ?string
    {
        return $this->graph_namey;
    }

    public function setGraphNamey(?string $graph_namey): self
    {
        $this->graph_namey = $graph_namey;

        return $this;
    }

    public function getGraphColorone(): ?string
    {
        return $this->graph_colorone;
    }

    public function setGraphColorone(?string $graph_colorone): self
    {
        $this->graph_colorone = $graph_colorone;

        return $this;
    }

    public function getGraphType(): ?string
    {
        return $this->graph_type;
    }

    public function setGraphType(?string $graph_type): self
    {
        $this->graph_type = $graph_type;

        return $this;
    }

    public function getGraphValue(): ?string
    {
        return $this->graph_value;
    }

    public function setGraphValue(?string $graph_value): self
    {
        $this->graph_value = $graph_value;

        return $this;
    }

    public function getGraphSubtitle(): ?string
    {
        return $this->graph_subtitle;
    }

    public function setGraphSubtitle(?string $graph_subtitle): self
    {
        $this->graph_subtitle = $graph_subtitle;

        return $this;
    }

    public function getGraphUrljson(): ?string
    {
        return $this->graph_urljson;
    }

    public function setGraphUrljson(?string $graph_urljson): self
    {
        $this->graph_urljson = $graph_urljson;

        return $this;
    }

    public function getGraphCsvurl(): ?string
    {
        return $this->graph_csvurl;
    }

    public function setGraphCsvurl(?string $graph_csvurl): self
    {
        $this->graph_csvurl = $graph_csvurl;

        return $this;
    }

    public function getGraphCsvfilename(): ?string
    {
        return $this->graph_csvfilename;
    }

    public function setGraphCsvfilename(?string $graph_csvfilename): self
    {
        $this->graph_csvfilename = $graph_csvfilename;

        return $this;
    }

    public function getGraphCsvtextdatas(): ?string
    {
        return $this->graph_csvtextdatas;
    }

    public function setGraphCsvtextdatas(?string $graph_csvtextdatas): self
    {
        $this->graph_csvtextdatas = $graph_csvtextdatas;

        return $this;
    }

    public function getGraphArrayjson(): ?string
    {
        return $this->graph_arrayjson;
    }

    public function setGraphArrayjson(?string $graph_arrayjson): self
    {
        $this->graph_arrayjson = $graph_arrayjson;

        return $this;
    }

    public function getGraphSeriesnamejson(): ?string
    {
        return $this->graph_seriesnamejson;
    }

    public function setGraphSeriesnamejson(?string $graph_seriesnamejson): self
    {
        $this->graph_seriesnamejson = $graph_seriesnamejson;

        return $this;
    }

    public function getGraphUrlapi(): ?string
    {
        return $this->graph_urlapi;
    }

    public function setGraphUrlapi(?string $graph_urlapi): self
    {
        $this->graph_urlapi = $graph_urlapi;

        return $this;
    }

    public function getGraphApifilters(): ?string
    {
        return $this->graph_apifilters;
    }

    public function setGraphApifilters(?string $graph_apifilters): self
    {
        $this->graph_apifilters = $graph_apifilters;

        return $this;
    }
}
