<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paroisse
 *
 * @ORM\Table(name="paroisse", uniqueConstraints={@ORM\UniqueConstraint(name="id_paroisse_UNIQUE", columns={"id_paroisse"})}, indexes={@ORM\Index(name="id_diocese_idx", columns={"id_diocese"})})
 * @ORM\Entity
 */
class Paroisse
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_paroisse", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idParoisse;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
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
     * @ORM\Column(name="cure", type="string", length=255, nullable=false)
     */
    private $cure;

    /**
     * @var string
     *
     * @ORM\Column(name="vicaire", type="string", length=255, nullable=true)
     */
    private $vicaire;

    /**
     * @var string
     *
     * @ORM\Column(name="vicaire_episcopal", type="string", length=255, nullable=true)
     */
    private $vicaireEpiscopal;

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
     * Get idParoisse
     *
     * @return integer
     */
    public function getIdParoisse()
    {
        return $this->idParoisse;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Paroisse
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
     * @param string $telephone
     *
     * @return Paroisse
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
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
     * @return Paroisse
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
     * Set cure
     *
     * @param string $cure
     *
     * @return Paroisse
     */
    public function setCure($cure)
    {
        $this->cure = $cure;

        return $this;
    }

    /**
     * Get cure
     *
     * @return string
     */
    public function getCure()
    {
        return $this->cure;
    }

    /**
     * Set vicaire
     *
     * @param string $vicaire
     *
     * @return Paroisse
     */
    public function setVicaire($vicaire)
    {
        $this->vicaire = $vicaire;

        return $this;
    }

    /**
     * Get vicaire
     *
     * @return string
     */
    public function getVicaire()
    {
        return $this->vicaire;
    }

    /**
     * Set vicaireEpiscopal
     *
     * @param string $vicaireEpiscopal
     *
     * @return Paroisse
     */
    public function setVicaireEpiscopal($vicaireEpiscopal)
    {
        $this->vicaireEpiscopal = $vicaireEpiscopal;

        return $this;
    }

    /**
     * Get vicaireEpiscopal
     *
     * @return string
     */
    public function getVicaireEpiscopal()
    {
        return $this->vicaireEpiscopal;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Paroisse
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
     * @return Paroisse
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
