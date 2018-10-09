<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomerAddres[]|\Cake\Collection\CollectionInterface $customerAddress
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Customer Addres'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customerAddress index large-9 medium-8 columns content">
    <h3><?= __('Customer Address') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customerAddress as $customerAddres): ?>
            <tr>
                <td><?= $customerAddres->has('customer') ? $this->Html->link($customerAddres->customer->name, ['controller' => 'Customers', 'action' => 'view', $customerAddres->customer->id]) : '' ?></td>
                <td><?= $customerAddres->has('address') ? $this->Html->link($customerAddres->address->id, ['controller' => 'Addresses', 'action' => 'view', $customerAddres->address->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customerAddres->customer_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customerAddres->customer_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customerAddres->customer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerAddres->customer_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
