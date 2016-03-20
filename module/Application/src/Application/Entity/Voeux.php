<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Voeux
 *
 * @ORM\Table(name="voeux", indexes={@ORM\Index(name="id_personnel_idx", columns={"id_personnel"})})
 * @ORM\Entity
 */
class Voeux
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_voeux", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVoeux;

    /**
     * @var string
     *
     * @ORM\Column(name="date_serment", type="string", length=45, nullable=true)
     */
    private $dateSerment;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", nullable=true)
     */
    private $statut = '1';

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
     * Get idVoeux
     *
     * @return integer
     */
    public function getIdVoeux()
    {
        return $this->idVoeux;
    }

    /**
     * Set dateSerment
     *
     * @param string $dateSerment
     *
     * @return Voeux
     */
    public function setDateSerment($dateSerment)
    {
        $this->dateSerment = $dateSerment;

        return $this;
    }

    /**
     * Get dateSerment
     *
     * @return string
     */
    public function getDateSerment()
    {
        return $this->dateSerment;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Voeux
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
     * Set idPersonnel
     *
     * @param \Application\Entity\Personnel $idPersonnel
     *
     * @return Voeux
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
