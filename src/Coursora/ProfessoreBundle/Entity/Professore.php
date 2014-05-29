<?php

namespace Coursora\ProfessoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Professore
 *
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Coursora\ProfessoreBundle\Entity\ProfessoreRepository")
 */
class Professore
{
    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function fixNameOfUploadImmagine(){
        $immagine = $this->immagine;

        if(!$immagine instanceof UploadedFile)
            return;

        $destPath = __DIR__.'/../../../../web/uploads';
        $fileName = $immagine->getClientOriginalName();
        $immagine->move($destPath, $fileName);
        $this->setImmagine('/uploads' . DIRECTORY_SEPARATOR . $fileName);
    }





    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     * @Assert\NotBlank
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="cognome", type="string", length=255)
     * @Assert\NotBlank
     */
    private $cognome;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\Email
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="immagine", type="string", length=255, nullable=true)
     */
    private $immagine;

    /**
     * @var string
     *
     * @ORM\Column(name="biografia", type="text", nullable=true)
     */
    private $biografia;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Professore
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set cognome
     *
     * @param string $cognome
     * @return Professore
     */
    public function setCognome($cognome)
    {
        $this->cognome = $cognome;

        return $this;
    }

    /**
     * Get cognome
     *
     * @return string 
     */
    public function getCognome()
    {
        return $this->cognome;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Professore
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set immagine
     *
     * @param string $immagine
     * @return Professore
     */
    public function setImmagine($immagine)
    {
        $this->immagine = $immagine;

        return $this;
    }

    /**
     * Get immagine
     *
     * @return string 
     */
    public function getImmagine()
    {
        return $this->immagine;
    }

    /**
     * Set biografia
     *
     * @param string $biografia
     * @return Professore
     */
    public function setBiografia($biografia)
    {
        $this->biografia = $biografia;

        return $this;
    }

    /**
     * Get biografia
     *
     * @return string 
     */
    public function getBiografia()
    {
        return $this->biografia;
    }
}
