<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 *
 * @ORM\Table(name="pays", uniqueConstraints={@ORM\UniqueConstraint(name="id_pays_UNIQUE", columns={"id_pays"})})
 * @ORM\Entity
 */
class Pays
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_pays", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPays;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="code_telephone", type="string", length=45, nullable=true)
     */
    private $codeTelephone;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", nullable=true)
     */
    private $statut = '1';



    /**
     * Get idPays
     *
     * @return integer
     */
    public function getIdPays()
    {
        return $this->idPays;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Pays
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
     * Set codeTelephone
     *
     * @param string $codeTelephone
     *
     * @return Pays
     */
    public function setCodeTelephone($codeTelephone)
    {
        $this->codeTelephone = $codeTelephone;

        return $this;
    }

    /**
     * Get codeTelephone
     *
     * @return string
     */
    public function getCodeTelephone()
    {
        return $this->codeTelephone;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Pays
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
}
