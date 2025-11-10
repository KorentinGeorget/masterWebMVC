<?php

namespace App\Entities;

class Produit
{
    private $id;
    private $type;
    private $designation;
    private $prix_ht;
    private $date_in;
    private $time_sin;
    private $stock;
    private $image_filename;
    private $reduction_percent;

    // Getters
    public function getId() { return $this->id; }
    public function getType() { return $this->type; }
    public function getDesignation() { return $this->designation; }
    public function getPrixHt() { return $this->prix_ht; }
    public function getPrixReduit(): float
    {
        if (empty($this->reduction_percent) || $this->reduction_percent <= 0 || empty($this->prix_ht)) {
            return $this->prix_ht;
        }
        $nouveauPrix = $this->prix_ht * (1 - ($this->reduction_percent / 100));

        return round($nouveauPrix, 2);
    }
    
    public function getDateIn() { return $this->date_in; }
    public function getTimeSin() { return $this->time_sin; }
    public function getStock() { return $this->stock; }
    public function getImageFileName() { return $this->image_filename; }
    public function getReductionPercent() { return $this->reduction_percent; }

    // Setters
    public function setId($id) { $this->id = $id; }
    public function setType($type) { $this->type = $type; }
    public function setDesignation($designation) { $this->designation = $designation; }
    public function setPrixHt($prix_ht) { $this->prix_ht = $prix_ht; }
    public function setDateIn($date_in) { $this->date_in = $date_in; }
    public function setTimeSin($time_sin) { $this->time_sin = $time_sin; }
    public function setStock($stock) { $this->stock = $stock; }
    public function setImageFileName($image_filename) { $this->image_filename = $image_filename; }
    public function setReductionPercent($reduction_percent) { $this->reduction_percent = $reduction_percent; }

}
