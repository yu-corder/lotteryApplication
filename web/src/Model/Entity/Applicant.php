<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Applicant extends Entity {
    protected $_accessible = [
        'name' => true,
        'accompanying_person_name' => true,
    ];
}
