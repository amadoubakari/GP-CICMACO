<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ecole
 *
 * @ORM\Table(name="ecole", uniqueConstraints={@ORM\UniqueConstraint(name="id_ecole_UNIQUE", columns={"id_ecole"})}, indexes={@ORM\Index(name="id_diocese_idx", columns={"id_diocese"})})
 * @ORM\Entity
 */
class Ecole
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_ecole", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEcole;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=225, nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone", type="integer", nullable=false)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="recteur", type="string", length=255, nullable=false)
     */
    private $recteur;

    /**
     * @var string
     *
     * @ORM\Column(name="econome", type="string", length=255, nullable=false)
     */
    private $econome;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", nullable=true)
     */
    private $statut = '1';

    /**
     * @var \Application\Entity\Diocese
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Diocese")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_diocese", referencedColumnName="id_diocese")
     * })
     */
    private $idDiocese;



    /**
     * Get idEcole
     *
     * @return integer
     */
    public function getIdEcole()
    {
        return $this->idEcole;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Ecole
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return Ecole
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Ecole
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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Ecole
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set recteur
     *
     * @param string $recteur
     *
     * @return Ecole
     */
    public function setRecteur($recteur)
    {
        $this->recteur = $recteur;

        return $this;
    }

    /**
     * Get recteur
     *
     * @return string
     */
    public function getRecteur()
    {
        return $this->recteur;
    }

    /**
     * Set econome
     *
     * @param string $econome
     *
     * @return Ecole
     */
    public function setEconome($econome)
    {
        $this->econome = $econome;

        return $this;
    }

    /**
     * Get econome
     *
     * @return string
     */
    public function getEconome()
    {
        return $this->econome;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Ecole
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set idDiocese
     *
     * @param \Application\Entity\Diocese $idDiocese
     *
     * @return Ecole
     */
    public function setIdDiocese(\Application\Entity\Diocese $idDiocese = null)
    {
        $this->idDiocese = $idDiocese;

        return $this;
    }

    /**
     * Get idDiocese
     *
     * @return \Application\Entity\Diocese
     */
    public function getIdDiocese()
    {
        return $this->idDiocese;
    }
}
