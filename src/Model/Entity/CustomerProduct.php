<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CustomerProduct Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property int $product_id
 * @property \Cake\I18n\FrozenDate $date
 * @property string $other_details
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Product $product
 */
class CustomerProduct extends Entity
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
        'customer_id' => true,
        'product_id' => true,
        'date' => true,
        'other_details' => true,
        'created' => true,
        'modified' => true,
        'customer' => true,
        'product' => true
    ];
}
