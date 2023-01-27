<?php
namespace App;
class Affectation{

    public $entities = [
        'SAF' => 'Service Administratif et Financier',
        'SPP' => 'Service de Programmation et de Planification',
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
        'SAF' => 'Mr le Chef du Service Administratif et Financier',
        'SPP' => 'Mr le Chef du Service de Programmation et de Planification',
        'SEL' => "Mr le Chef du Service d'Elevage",
        'SM' => 'Mr le Chef du Service du Matériel',
        'SPA' => 'Mr le Chef du Service de la Production Agricole',
        'SEHA' => "Mme la Chef du Service de l'Equipement Hydro-Agricole",
        'SGRID' => "Mr le Chef du Service de Gestion des Réseaux d'Irrigation et de Drainage",
        'SVOP' => "Mr le Chef du Service de la Vulgarisation et de l'Organisation Professionnelle",
        'CAM' => 'Mr le Responsable de la Cellule des Approvisionnements et des Marchés',
        'CAI' => "Mr le Responsable de la Cellule d'Audit Interne",
        'CSI' => "Mr le Responsable de la Cellule des Systèmes d'Information",
        'GU' => "Mr le Responsable du Guichet Unique",
        'LABO' => 'Mr le Chef du Service de la Production Agricole - LABO',
        'TP' => 'Mr le Trésorier payeur',
        'CKS' => "Mr le Coordinateur des activités de l'ORMVAH à Kelaa des Sraghna",
        'CHC' => "Mr le Coordinateur des activités de l'ORMVAH au Haouz Central",

    ];
    public function getEntities(){
        return($this->entities);
    }



}
