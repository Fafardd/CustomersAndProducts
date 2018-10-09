<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomerProduct $customerProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer Product'), ['action' => 'edit', $customerProduct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer Product'), ['action' => 'delete', $customerProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerProduct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customer Product'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customerProduct view large-9 medium-8 columns content">
    <h3><?= h($customerProduct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $customerProduct->has('customer') ? $this->Html->link($customerProduct->customer->name, ['controller' => 'Customers', 'action' => 'view', $customerProduct->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $customerProduct->has('product') ? $this->Html->link($customerProduct->product->name, ['controller' => 'Products', 'action' => 'view', $customerProduct->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Details') ?></th>
            <td><?= h($customerProduct->other_details) ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customerProduct->id) ?></td>
        </tr>-->
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($customerProduct->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($customerProduct->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($customerProduct->modified) ?></td>
        </tr>
    </table>
</div>
