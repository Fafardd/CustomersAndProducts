<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Address'), ['action' => 'edit', $address->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Address'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customer Address'), ['controller' => 'CustomerAddress', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer Addres'), ['controller' => 'CustomerAddress', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="addresses view large-9 medium-8 columns content">
    <h3><?= h($address->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Street Name') ?></th>
            <td><?= h($address->street_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($address->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zipcode') ?></th>
            <td><?= h($address->zipcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($address->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($address->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($address->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Building Number') ?></th>
            <td><?= $this->Number->format($address->building_number) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Customer Address') ?></h4>
        <?php if (!empty($address->customer_address)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Address Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($address->customer_address as $customerAddress): ?>
            <tr>
                <td><?= h($customerAddress->customer_id) ?></td>
                <td><?= h($customerAddress->address_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CustomerAddress', 'action' => 'view', $customerAddress->customer_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CustomerAddress', 'action' => 'edit', $customerAddress->customer_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CustomerAddress', 'action' => 'delete', $customerAddress->customer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerAddress->customer_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
