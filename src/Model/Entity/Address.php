<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property int $id
 * @property int $building_number
 * @property string $street_name
 * @property string $city
 * @property string $zipcode
 * @property string $state
 * @property string $country
 *
 * @property \App\Model\Entity\CustomerAddres[] $customer_address
 */
class Address extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'building_number' => true,
        'street_name' => true,
        'city' => true,
        'zipcode' => true,
        'state' => true,
        'country' => true,
        'customer_address' => true
    ];
}
