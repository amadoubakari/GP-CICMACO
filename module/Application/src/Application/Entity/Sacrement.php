<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sacrement
 *
 * @ORM\Table(name="sacrement", uniqueConstraints={@ORM\UniqueConstraint(name="id_sacrement_UNIQUE", columns={"id_sacrement"})}, indexes={@ORM\Index(name="id_personnel_idx", columns={"id_personnel"})})
 * @ORM\Entity
 */
class Sacrement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_sacrement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSacrement;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", nullable=false)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255, nullable=true)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="diocese", type="string", length=255, nullable=true)
     */
    private $diocese;

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
     * Get idSacrement
     *
     * @return integer
     */
    public function getIdSacrement()
    {
        return $this->idSacrement;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Sacrement
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Sacrement
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Sacrement
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set diocese
     *
     * @param string $diocese
     *
     * @return Sacrement
     */
    public function setDiocese($diocese)
    {
        $this->diocese = $diocese;

        return $this;
    }

    /**
     * Get diocese
     *
     * @return string
     */
    public function getDiocese()
    {
        return $this->diocese;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Sacrement
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
     * @return Sacrement
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
