<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomerProduct[]|\Cake\Collection\CollectionInterface $customerProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Customer Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customerProduct index large-9 medium-8 columns content">
    <h3><?= __('Customer Product') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('other_details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customerProduct as $customerProduct): ?>
            <tr>
                <td><?= $this->Number->format($customerProduct->id) ?></td>
                <td><?= $customerProduct->has('customer') ? $this->Html->link($customerProduct->customer->name, ['controller' => 'Customers', 'action' => 'view', $customerProduct->customer->id]) : '' ?></td>
                <td><?= $customerProduct->has('product') ? $this->Html->link($customerProduct->product->name, ['controller' => 'Products', 'action' => 'view', $customerProduct->product->id]) : '' ?></td>
                <td><?= h($customerProduct->date) ?></td>
                <td><?= h($customerProduct->other_details) ?></td>
                <td><?= h($customerProduct->created) ?></td>
                <td><?= h($customerProduct->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customerProduct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customerProduct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customerProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerProduct->id)]) ?>
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
