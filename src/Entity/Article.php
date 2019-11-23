<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

// 16 octobre ajouts : https://symfony.com/doc/current/reference/constraints/Length.html
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    
    // 16 octobre ajout de cette fonction - voir : https://symfony.com/doc/current/reference/constraints/Length.html
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('title', new Assert\Length([
            'min' => 5,
            'max' => 255,
            'minMessage' => 'Your first name must be at least {{ limit }} characters long',
            'maxMessage' => 'Your first name cannot be longer than {{ limit }} characters',
        ]));
    }
    
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="text", length=100)
     */
    private $title;
    
    /**
     * @ORM\Column(type="text")
     */
    private $body;
    
    /**
     * @ORM\Column(type="text")
     */
    private $graphtitle;
    
    // Getters & Setters
    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function getBody() {
        return $this->body;
    }
    public function setBody($body) {
        $this->body = $body;
    }
    // Cf. https://symfony.com/doc/current/doctrine/reverse_engineering.html
    // Cf. https://symfony.com/doc/3.3/doctrine.html
    // Utiliser le terminal de commande pour mettre à jour une Entité : après avoir indiqué "private $graphtitle" avec son annotation, il suffit de faire un coup de  "php bin/console make:entity --regenerate App" et les getters/setters sont générés !
    // Pour mettre ensuite à jour la BDD faire un "php bin/console doctrine:schema:update --dump-sql" puis "php bin/console doctrine:schema:update --force"
    public function getGraphtitle(): ?string
    {
        return $this->graphtitle;
    }

    public function setGraphtitle(string $graphtitle): self
    {
        $this->graphtitle = $graphtitle;

        return $this;
    }
}