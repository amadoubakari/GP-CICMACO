<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fraternite
 *
 * @ORM\Table(name="fraternite", uniqueConstraints={@ORM\UniqueConstraint(name="id_fraternite_UNIQUE", columns={"id_fraternite"})}, indexes={@ORM\Index(name="id_personnel_idx", columns={"id_personnel"})})
 * @ORM\Entity
 */
class Fraternite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_fraternite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFraternite;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="ordre_familial", type="smallint", nullable=false)
     */
    private $ordreFamilial;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_psychologique", type="string", length=50, nullable=false)
     */
    private $etatPsychologique;

    /**
     * @var string
     *
     * @ORM\Column(name="en_vie", type="string", length=25, nullable=false)
     */
    private $enVie;

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
     * Get idFraternite
     *
     * @return integer
     */
    public function getIdFraternite()
    {
        return $this->idFraternite;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Fraternite
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Fraternite
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
     * Set ordreFamilial
     *
     * @param integer $ordreFamilial
     *
     * @return Fraternite
     */
    public function setOrdreFamilial($ordreFamilial)
    {
        $this->ordreFamilial = $ordreFamilial;

        return $this;
    }

    /**
     * Get ordreFamilial
     *
     * @return integer
     */
    public function getOrdreFamilial()
    {
        return $this->ordreFamilial;
    }

    /**
     * Set etatPsychologique
     *
     * @param string $etatPsychologique
     *
     * @return Fraternite
     */
    public function setEtatPsychologique($etatPsychologique)
    {
        $this->etatPsychologique = $etatPsychologique;

        return $this;
    }

    /**
     * Get etatPsychologique
     *
     * @return string
     */
    public function getEtatPsychologique()
    {
        return $this->etatPsychologique;
    }

    /**
     * Set enVie
     *
     * @param string $enVie
     *
     * @return Fraternite
     */
    public function setEnVie($enVie)
    {
        $this->enVie = $enVie;

        return $this;
    }

    /**
     * Get enVie
     *
     * @return string
     */
    public function getEnVie()
    {
        return $this->enVie;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Fraternite
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
     * @return Fraternite
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
