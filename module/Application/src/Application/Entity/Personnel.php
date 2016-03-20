<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personnel
 *
 * @ORM\Table(name="personnel", uniqueConstraints={@ORM\UniqueConstraint(name="id_personnel_UNIQUE", columns={"id_personnel"}), @ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"})}, indexes={@ORM\Index(name="id_pays_idx", columns={"id_pays"}), @ORM\Index(name="id_profil", columns={"profil"})})
 * @ORM\Entity
 */
class Personnel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_personnel", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPersonnel;

    /**
     * @var string
     *
     * @ORM\Column(name="type_personnel", type="string", nullable=false)
     */
    private $typePersonnel;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", nullable=true)
     */
    private $sexe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeNaissance", type="date", nullable=true)
     */
    private $datedenaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="lieuDeNaissance", type="string", length=255, nullable=true)
     */
    private $lieudenaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="groupeEthnique", type="string", length=255, nullable=true)
     */
    private $groupeethnique;

    /**
     * @var string
     *
     * @ORM\Column(name="langueMaternelle", type="string", length=255, nullable=true)
     */
    private $languematernelle;

    /**
     * @var string
     *
     * @ORM\Column(name="domicile", type="string", length=250, nullable=true)
     */
    private $domicile;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="st_patron", type="date", nullable=true)
     */
    private $stPatron;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone", type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_admission", type="date", nullable=true)
     */
    private $dateAdmission;

    /**
     * @var string
     *
     * @ORM\Column(name="superieur", type="string", length=255, nullable=true)
     */
    private $superieur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_pere", type="string", length=255, nullable=true)
     */
    private $nomPere;

    /**
     * @var string
     *
     * @ORM\Column(name="origin_pere", type="string", length=255, nullable=true)
     */
    private $originPere;

    /**
     * @var string
     *
     * @ORM\Column(name="profession_pere", type="string", length=255, nullable=true)
     */
    private $professionPere;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_psychologique_pere", type="string", length=255, nullable=true)
     */
    private $etatPsychologiquePere;

    /**
     * @var string
     *
     * @ORM\Column(name="en_vie_pere", type="string", length=255, nullable=true)
     */
    private $enViePere;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_mere", type="string", length=255, nullable=true)
     */
    private $nomMere;

    /**
     * @var string
     *
     * @ORM\Column(name="origine_mere", type="string", length=255, nullable=true)
     */
    private $origineMere;

    /**
     * @var string
     *
     * @ORM\Column(name="profession_mere", type="string", length=255, nullable=true)
     */
    private $professionMere;

    /**
     * @var string
     *
     * @ORM\Column(name="en_vie_mere", type="string", length=255, nullable=true)
     */
    private $enVieMere;

    /**
     * @var string
     *
     * @ORM\Column(name="type_mariage", type="string", length=255, nullable=true)
     */
    private $typeMariage;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_psychologique_mere", type="string", length=255, nullable=true)
     */
    private $etatPsychologiqueMere;

    /**
     * @var string
     *
     * @ORM\Column(name="id_service", type="string", length=255, nullable=true)
     */
    private $idService;

    /**
     * @var string
     *
     * @ORM\Column(name="ecole", type="string", length=255, nullable=true)
     */
    private $ecole;

    /**
     * @var string
     *
     * @ORM\Column(name="filiere", type="string", length=255, nullable=true)
     */
    private $filiere;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", nullable=true)
     */
    private $statut = '1';

    /**
     * @var \Application\Entity\Pays
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pays", referencedColumnName="id_pays")
     * })
     */
    private $idPays;

    /**
     * @var \Application\Entity\Profil
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Profil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="profil", referencedColumnName="id")
     * })
     */
    private $profil;



    /**
     * Get idPersonnel
     *
     * @return integer
     */
    public function getIdPersonnel()
    {
        return $this->idPersonnel;
    }

    /**
     * Set typePersonnel
     *
     * @param string $typePersonnel
     *
     * @return Personnel
     */
    public function setTypePersonnel($typePersonnel)
    {
        $this->typePersonnel = $typePersonnel;

        return $this;
    }

    /**
     * Get typePersonnel
     *
     * @return string
     */
    public function getTypePersonnel()
    {
        return $this->typePersonnel;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Personnel
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Personnel
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return Personnel
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set datedenaissance
     *
     * @param \DateTime $datedenaissance
     *
     * @return Personnel
     */
    public function setDatedenaissance($datedenaissance)
    {
        $this->datedenaissance = $datedenaissance;

        return $this;
    }

    /**
     * Get datedenaissance
     *
     * @return \DateTime
     */
    public function getDatedenaissance()
    {
        return $this->datedenaissance;
    }

    /**
     * Set lieudenaissance
     *
     * @param string $lieudenaissance
     *
     * @return Personnel
     */
    public function setLieudenaissance($lieudenaissance)
    {
        $this->lieudenaissance = $lieudenaissance;

        return $this;
    }

    /**
     * Get lieudenaissance
     *
     * @return string
     */
    public function getLieudenaissance()
    {
        return $this->lieudenaissance;
    }

    /**
     * Set groupeethnique
     *
     * @param string $groupeethnique
     *
     * @return Personnel
     */
    public function setGroupeethnique($groupeethnique)
    {
        $this->groupeethnique = $groupeethnique;

        return $this;
    }

    /**
     * Get groupeethnique
     *
     * @return string
     */
    public function getGroupeethnique()
    {
        return $this->groupeethnique;
    }

    /**
     * Set languematernelle
     *
     * @param string $languematernelle
     *
     * @return Personnel
     */
    public function setLanguematernelle($languematernelle)
    {
        $this->languematernelle = $languematernelle;

        return $this;
    }

    /**
     * Get languematernelle
     *
     * @return string
     */
    public function getLanguematernelle()
    {
        return $this->languematernelle;
    }

    /**
     * Set domicile
     *
     * @param string $domicile
     *
     * @return Personnel
     */
    public function setDomicile($domicile)
    {
        $this->domicile = $domicile;

        return $this;
    }

    /**
     * Get domicile
     *
     * @return string
     */
    public function getDomicile()
    {
        return $this->domicile;
    }

    /**
     * Set stPatron
     *
     * @param \DateTime $stPatron
     *
     * @return Personnel
     */
    public function setStPatron($stPatron)
    {
        $this->stPatron = $stPatron;

        return $this;
    }

    /**
     * Get stPatron
     *
     * @return \DateTime
     */
    public function getStPatron()
    {
        return $this->stPatron;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Personnel
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
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return Personnel
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Personnel
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set dateAdmission
     *
     * @param \DateTime $dateAdmission
     *
     * @return Personnel
     */
    public function setDateAdmission($dateAdmission)
    {
        $this->dateAdmission = $dateAdmission;

        return $this;
    }

    /**
     * Get dateAdmission
     *
     * @return \DateTime
     */
    public function getDateAdmission()
    {
        return $this->dateAdmission;
    }

    /**
     * Set superieur
     *
     * @param string $superieur
     *
     * @return Personnel
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
     * Set nomPere
     *
     * @param string $nomPere
     *
     * @return Personnel
     */
    public function setNomPere($nomPere)
    {
        $this->nomPere = $nomPere;

        return $this;
    }

    /**
     * Get nomPere
     *
     * @return string
     */
    public function getNomPere()
    {
        return $this->nomPere;
    }

    /**
     * Set originPere
     *
     * @param string $originPere
     *
     * @return Personnel
     */
    public function setOriginPere($originPere)
    {
        $this->originPere = $originPere;

        return $this;
    }

    /**
     * Get originPere
     *
     * @return string
     */
    public function getOriginPere()
    {
        return $this->originPere;
    }

    /**
     * Set professionPere
     *
     * @param string $professionPere
     *
     * @return Personnel
     */
    public function setProfessionPere($professionPere)
    {
        $this->professionPere = $professionPere;

        return $this;
    }

    /**
     * Get professionPere
     *
     * @return string
     */
    public function getProfessionPere()
    {
        return $this->professionPere;
    }

    /**
     * Set etatPsychologiquePere
     *
     * @param string $etatPsychologiquePere
     *
     * @return Personnel
     */
    public function setEtatPsychologiquePere($etatPsychologiquePere)
    {
        $this->etatPsychologiquePere = $etatPsychologiquePere;

        return $this;
    }

    /**
     * Get etatPsychologiquePere
     *
     * @return string
     */
    public function getEtatPsychologiquePere()
    {
        return $this->etatPsychologiquePere;
    }

    /**
     * Set enViePere
     *
     * @param string $enViePere
     *
     * @return Personnel
     */
    public function setEnViePere($enViePere)
    {
        $this->enViePere = $enViePere;

        return $this;
    }

    /**
     * Get enViePere
     *
     * @return string
     */
    public function getEnViePere()
    {
        return $this->enViePere;
    }

    /**
     * Set nomMere
     *
     * @param string $nomMere
     *
     * @return Personnel
     */
    public function setNomMere($nomMere)
    {
        $this->nomMere = $nomMere;

        return $this;
    }

    /**
     * Get nomMere
     *
     * @return string
     */
    public function getNomMere()
    {
        return $this->nomMere;
    }

    /**
     * Set origineMere
     *
     * @param string $origineMere
     *
     * @return Personnel
     */
    public function setOrigineMere($origineMere)
    {
        $this->origineMere = $origineMere;

        return $this;
    }

    /**
     * Get origineMere
     *
     * @return string
     */
    public function getOrigineMere()
    {
        return $this->origineMere;
    }

    /**
     * Set professionMere
     *
     * @param string $professionMere
     *
     * @return Personnel
     */
    public function setProfessionMere($professionMere)
    {
        $this->professionMere = $professionMere;

        return $this;
    }

    /**
     * Get professionMere
     *
     * @return string
     */
    public function getProfessionMere()
    {
        return $this->professionMere;
    }

    /**
     * Set enVieMere
     *
     * @param string $enVieMere
     *
     * @return Personnel
     */
    public function setEnVieMere($enVieMere)
    {
        $this->enVieMere = $enVieMere;

        return $this;
    }

    /**
     * Get enVieMere
     *
     * @return string
     */
    public function getEnVieMere()
    {
        return $this->enVieMere;
    }

    /**
     * Set typeMariage
     *
     * @param string $typeMariage
     *
     * @return Personnel
     */
    public function setTypeMariage($typeMariage)
    {
        $this->typeMariage = $typeMariage;

        return $this;
    }

    /**
     * Get typeMariage
     *
     * @return string
     */
    public function getTypeMariage()
    {
        return $this->typeMariage;
    }

    /**
     * Set etatPsychologiqueMere
     *
     * @param string $etatPsychologiqueMere
     *
     * @return Personnel
     */
    public function setEtatPsychologiqueMere($etatPsychologiqueMere)
    {
        $this->etatPsychologiqueMere = $etatPsychologiqueMere;

        return $this;
    }

    /**
     * Get etatPsychologiqueMere
     *
     * @return string
     */
    public function getEtatPsychologiqueMere()
    {
        return $this->etatPsychologiqueMere;
    }

    /**
     * Set idService
     *
     * @param string $idService
     *
     * @return Personnel
     */
    public function setIdService($idService)
    {
        $this->idService = $idService;

        return $this;
    }

    /**
     * Get idService
     *
     * @return string
     */
    public function getIdService()
    {
        return $this->idService;
    }

    /**
     * Set ecole
     *
     * @param string $ecole
     *
     * @return Personnel
     */
    public function setEcole($ecole)
    {
        $this->ecole = $ecole;

        return $this;
    }

    /**
     * Get ecole
     *
     * @return string
     */
    public function getEcole()
    {
        return $this->ecole;
    }

    /**
     * Set filiere
     *
     * @param string $filiere
     *
     * @return Personnel
     */
    public function setFiliere($filiere)
    {
        $this->filiere = $filiere;

        return $this;
    }

    /**
     * Get filiere
     *
     * @return string
     */
    public function getFiliere()
    {
        return $this->filiere;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Personnel
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Personnel
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Personnel
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
     * Set idPays
     *
     * @param \Application\Entity\Pays $idPays
     *
     * @return Personnel
     */
    public function setIdPays(\Application\Entity\Pays $idPays = null)
    {
        $this->idPays = $idPays;

        return $this;
    }

    /**
     * Get idPays
     *
     * @return \Application\Entity\Pays
     */
    public function getIdPays()
    {
        return $this->idPays;
    }

    /**
     * Set profil
     *
     * @param \Application\Entity\Profil $profil
     *
     * @return Personnel
     */
    public function setProfil(\Application\Entity\Profil $profil = null)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil
     *
     * @return \Application\Entity\Profil
     */
    public function getProfil()
    {
        return $this->profil;
    }
}
