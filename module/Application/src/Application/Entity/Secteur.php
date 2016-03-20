<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Secteur
 *
 * @ORM\Table(name="secteur", uniqueConstraints={@ORM\UniqueConstraint(name="id_section_UNIQUE", columns={"id_secteur"})})
 * @ORM\Entity
 */
class Secteur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_secteur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSecteur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="superieur", type="string", length=255, nullable=false)
     */
    private $superieur;

    /**
     * @var string
     *
     * @ORM\Column(name="econome_sup", type="string", length=255, nullable=true)
     */
    private $economeSup;

    /**
     * @var string
     *
     * @ORM\Column(name="econome_adj", type="string", length=255, nullable=true)
     */
    private $economeAdj;



    /**
     * Get idSecteur
     *
     * @return integer
     */
    public function getIdSecteur()
    {
        return $this->idSecteur;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Secteur
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
     * Set superieur
     *
     * @param string $superieur
     *
     * @return Secteur
     */
    public function setSuperieur($superieur)
    {
        $this->superieur = $superieur;

        return $this;
    }

    /**
     * Get superieur
     *
     * @return string
     */
    public function getSuperieur()
    {
        return $this->superieur;
    }

    /**
     * Set economeSup
     *
     * @param string $economeSup
     *
     * @return Secteur
     */
    public function setEconomeSup($economeSup)
    {
        $this->economeSup = $economeSup;

        return $this;
    }

    /**
     * Get economeSup
     *
     * @return string
     */
    public function getEconomeSup()
    {
        return $this->economeSup;
    }

    /**
     * Set economeAdj
     *
     * @param string $economeAdj
     *
     * @return Secteur
     */
    public function setEconomeAdj($economeAdj)
    {
        $this->economeAdj = $economeAdj;

        return $this;
    }

    /**
     * Get economeAdj
     *
     * @return string
     */
    public function getEconomeAdj()
    {
        return $this->economeAdj;
    }
}
