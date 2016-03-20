<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commission
 *
 * @ORM\Table(name="commission", uniqueConstraints={@ORM\UniqueConstraint(name="id_evenement_UNIQUE", columns={"id_commission"})}, indexes={@ORM\Index(name="id_diocese_idx", columns={"id_diocese"})})
 * @ORM\Entity
 */
class Commission
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commission", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommission;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="president", type="string", length=255, nullable=true)
     */
    private $president;

    /**
     * @var string
     *
     * @ORM\Column(name="vice_president", type="string", length=255, nullable=true)
     */
    private $vicePresident;

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
     * Get idCommission
     *
     * @return integer
     */
    public function getIdCommission()
    {
        return $this->idCommission;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Commission
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
     * Set president
     *
     * @param string $president
     *
     * @return Commission
     */
    public function setPresident($president)
    {
        $this->president = $president;

        return $this;
    }

    /**
     * Get president
     *
     * @return string
     */
    public function getPresident()
    {
        return $this->president;
    }

    /**
     * Set vicePresident
     *
     * @param string $vicePresident
     *
     * @return Commission
     */
    public function setVicePresident($vicePresident)
    {
        $this->vicePresident = $vicePresident;

        return $this;
    }

    /**
     * Get vicePresident
     *
     * @return string
     */
    public function getVicePresident()
    {
        return $this->vicePresident;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Commission
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
     * @return Commission
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
