<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Diocese
 *
 * @ORM\Table(name="diocese", uniqueConstraints={@ORM\UniqueConstraint(name="id_diocese_UNIQUE", columns={"id_diocese"})}, indexes={@ORM\Index(name="id_secteur_idx", columns={"id_secteur"})})
 * @ORM\Entity
 */
class Diocese
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_diocese", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDiocese;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone", type="integer", nullable=true)
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
     * @ORM\Column(name="recteur", type="string", length=255, nullable=true)
     */
    private $recteur;

    /**
     * @var string
     *
     * @ORM\Column(name="econome", type="string", length=255, nullable=true)
     */
    private $econome;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", nullable=true)
     */
    private $statut = '1';

    /**
     * @var \Application\Entity\Secteur
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Secteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_secteur", referencedColumnName="id_secteur")
     * })
     */
    private $idSecteur;



    /**
     * Get idDiocese
     *
     * @return integer
     */
    public function getIdDiocese()
    {
        return $this->idDiocese;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Diocese
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
     * @return Diocese
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
     * @return Diocese
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
     * @return Diocese
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
     * @return Diocese
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
     * @return Diocese
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
     * @return Diocese
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
     * Set idSecteur
     *
     * @param \Application\Entity\Secteur $idSecteur
     *
     * @return Diocese
     */
    public function setIdSecteur(\Application\Entity\Secteur $idSecteur = null)
    {
        $this->idSecteur = $idSecteur;

        return $this;
    }

    /**
     * Get idSecteur
     *
     * @return \Application\Entity\Secteur
     */
    public function getIdSecteur()
    {
        return $this->idSecteur;
    }
}
