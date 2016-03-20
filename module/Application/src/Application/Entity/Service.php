<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 *
 * @ORM\Table(name="service", uniqueConstraints={@ORM\UniqueConstraint(name="id_service_UNIQUE", columns={"id_service"})}, indexes={@ORM\Index(name="id_personnel_idx", columns={"id_personnel"}), @ORM\Index(name="id_diocese_idx", columns={"id_diocese"})})
 * @ORM\Entity
 */
class Service
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_service", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idService;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_prise", type="date", nullable=false)
     */
    private $datePrise;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=255, nullable=false)
     */
    private $poste;

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
     * @var \Application\Entity\Personnel
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Personnel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_personnel", referencedColumnName="id_personnel")
     * })
     */
    private $idPersonnel;



    /**
     * Get idService
     *
     * @return integer
     */
    public function getIdService()
    {
        return $this->idService;
    }

    /**
     * Set datePrise
     *
     * @param \DateTime $datePrise
     *
     * @return Service
     */
    public function setDatePrise($datePrise)
    {
        $this->datePrise = $datePrise;

        return $this;
    }

    /**
     * Get datePrise
     *
     * @return \DateTime
     */
    public function getDatePrise()
    {
        return $this->datePrise;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Service
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
     * Set poste
     *
     * @param string $poste
     *
     * @return Service
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * Get poste
     *
     * @return string
     */
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Service
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
     * @return Service
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

    /**
     * Set idPersonnel
     *
     * @param \Application\Entity\Personnel $idPersonnel
     *
     * @return Service
     */
    public function setIdPersonnel(\Application\Entity\Personnel $idPersonnel = null)
    {
        $this->idPersonnel = $idPersonnel;

        return $this;
    }

    /**
     * Get idPersonnel
     *
     * @return \Application\Entity\Personnel
     */
    public function getIdPersonnel()
    {
        return $this->idPersonnel;
    }
}
