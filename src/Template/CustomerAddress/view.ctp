<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomerAddres $customerAddres
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer Addres'), ['action' => 'edit', $customerAddres->customer_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer Addres'), ['action' => 'delete', $customerAddres->customer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerAddres->customer_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customer Address'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer Addres'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customerAddress view large-9 medium-8 columns content">
    <h3><?= h($customerAddres->customer_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $customerAddres->has('customer') ? $this->Html->link($customerAddres->customer->name, ['controller' => 'Customers', 'action' => 'view', $customerAddres->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= $customerAddres->has('address') ? $this->Html->link($customerAddres->address->id, ['controller' => 'Addresses', 'action' => 'view', $customerAddres->address->id]) : '' ?></td>
        </tr>
    </table>
</div>
