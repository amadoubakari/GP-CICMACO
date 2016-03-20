<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation
 *
 * @ORM\Table(name="evaluation", uniqueConstraints={@ORM\UniqueConstraint(name="id_evaluation_UNIQUE", columns={"id_evaluation"})}, indexes={@ORM\Index(name="id_personnel_idx", columns={"id_personnel"})})
 * @ORM\Entity
 */
class Evaluation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_evaluation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvaluation;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_evaluation", type="date", nullable=false)
     */
    private $dateEvaluation;

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
     * Get idEvaluation
     *
     * @return integer
     */
    public function getIdEvaluation()
    {
        return $this->idEvaluation;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Evaluation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateEvaluation
     *
     * @param \DateTime $dateEvaluation
     *
     * @return Evaluation
     */
    public function setDateEvaluation($dateEvaluation)
    {
        $this->dateEvaluation = $dateEvaluation;

        return $this;
    }

    /**
     * Get dateEvaluation
     *
     * @return \DateTime
     */
    public function getDateEvaluation()
    {
        return $this->dateEvaluation;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Evaluation
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
     * @return Evaluation
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
