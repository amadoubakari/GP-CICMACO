<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profil
 *
 * @ORM\Table(name="profil")
 * @ORM\Entity
 */
class Profil
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="profil_name", type="string", length=50, nullable=false)
     */
    private $profilName;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set profilName
     *
     * @param string $profilName
     *
     * @return Profil
     */
    public function setProfilName($profilName)
    {
        $this->profilName = $profilName;

        return $this;
    }

    /**
     * Get profilName
     *
     * @return string
     */
    public function getProfilName()
    {
        return $this->profilName;
    }
}
