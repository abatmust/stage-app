<?php
namespace App;
class Affectation{

    public $entities = [
        'SAF' => 'Service Administratif et Financier',
        'SPP' => 'Service de la Planification et de la Programmation',
        'SEL' => "Service d'Elevage",
        'SM' => 'Service du Matériel',
        'SPA' => 'Service de la Production Agricole',
        'SEHA' => "Service de l'Equipement Hydro-Agricole",
        'SGRID' => "Service de Gestion des Réseaux d'Irrigation et de Drainage",
        'SVOP' => "Service de la Vulgarisation et de l'Organisation Professionnelle",
        'CAM' => 'Cellule des Approvisionnements et des Marchés',
        'CAI' => "Cellule d'Audit Interne",
        'CSI' => "Cellule des Systèmes d'Information",
        'GU' => "Guichet Unique",
        'LABO' => 'Service de la Production Agricole - LABO',
        'TP' => 'Trésorerie paierie',
        'CKS' => 'Coordination de Kelaa des Sraghna',
        'CHC' => 'Coordination du Haouz Central',

    ];
    public $responsables = [
        'SAF' => 'Monsieur le Chef du Service Administratif et Financier',
        'SPP' => 'Monsieur le Chef du Service de la Planification et de la Programmation',
        'SEL' => "Monsieur le Chef du Service d'Elevage",
        'SM' => 'Monsieur le Chef du Service du Matériel',
        'SPA' => 'Monsieur le Chef du Service de la Production Agricole',
        'SEHA' => "Mme la Chef du Service de l'Equipement Hydro-Agricole",
        'SGRID' => "Monsieur le Chef du Service de Gestion des Réseaux d'Irrigation et de Drainage",
        'SVOP' => "Monsieur le Chef du Service de la Vulgarisation et de l'Organisation Professionnelle",
        'CAM' => 'Monsieur le Responsable de la Cellule des Approvisionnements et des Marchés',
        'CAI' => "Monsieur le Responsable de la Cellule d'Audit Interne",
        'CSI' => "Monsieur le Responsable de la Cellule des Systèmes d'Information",
        'GU' => "Monsieur le Responsable du Guichet Unique",
        'LABO' => 'Monsieur le Chef du Service de la Production Agricole - LABO',
        'TP' => 'Monsieur le Trésorier payeur',
        'CKS' => "Monsieur le Coordinateur des activités de l'ORMVAH à Kelaa des Sraghna",
        'CHC' => "Monsieur le Coordinateur des activités de l'ORMVAH au Haouz Central",

    ];
    public function getEntities(){
        return($this->entities);
    }



}
