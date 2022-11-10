<?php
namespace App;
class Affectation{

    public $entities = [
        'SAF' => 'Service Administratif et Financier',
        'SPP' => 'Service de Programation et de Planification',
        'SEL' => "Service d'Elevage",
        'SM' => 'Service du Matériel',
        'SPA' => 'Service de la Production Agricole',
        'SEHA' => "Service de l'Equipement Hydro-Agricole",
        'SGRID' => "Service de Gestion des Réseaux d'Irrigation et de Drainage",
        'CAM' => 'Cellule des Approvisionnements et des Marchés',
        'CAI' => "Cellule d'Audit Interne",
        'CSI' => "Cellule des Systèmes d'Information",
        'GU' => "Guichet Unique",
        'LABO' => 'Service de la Production Agricole - LABO',
        'TP' => 'Trésorerie paierie',
        'CKS' => 'Coordination de Kelaa des Sraghna',
        'CHC' => 'Coordination du Haouz Central',

    ];
    public function getEntities(){
        return($this->entities);
    }



}
