<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $type_id
 * @property string $color
 * @property int $store_quantity
 *
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\CustomerProduct[] $customer_product
 * @property \App\Model\Entity\ProductFile[] $product_file
 */
class Product extends Entity
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
        'name' => true,
        'price' => true,
        'created' => true,
        'modified' => true,
        'type_id' => true,
        'color' => true,
        'store_quantity' => true,
        'type' => true,
        'customer_product' => true,
        'product_file' => true
    ];
}
