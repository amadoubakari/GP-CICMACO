<?php

namespace Personnel\Utilitaires;

class Evenement {

    private $idEvenement;
    private $type;
    private $dateDebut;
    private $dateFin;
    private $description;
    private $idPersonnel;

    public function getIdEvenement() {
        return $this->idEvenement;
    }

    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    public function getType() {
        return $this->type;
    }

    public function setDateDebut($dateDebut) {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateDebut() {
        return $this->dateDebut;
    }

    public function setDateFin($dateFin) {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getDateFin() {
        return $this->dateFin;
    }

    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setIdPersonnel(\Application\Entity\Personnel $idPersonnel = null) {
        $this->idPersonnel = $idPersonnel;

        return $this;
    }

    public function getIdPersonnel() {
        return $this->idPersonnel;
    }

    public function __construct(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

}
