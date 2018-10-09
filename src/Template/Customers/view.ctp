<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customer Product'), ['controller' => 'CustomerProduct', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer Product'), ['controller' => 'CustomerProduct', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customers view large-9 medium-8 columns content">
    <h3><?= h($customer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($customer->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($customer->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Details') ?></th>
            <td><?= h($customer->other_details) ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>-->
        <tr>
            <th scope="row"><?= __('Number') ?></th>
            <td><?= $this->Number->format($customer->number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($customer->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($customer->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Customer Product') ?></h4>
        <?php if (!empty($customer->customer_product)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Other Details') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->customer_product as $customerProduct): ?>
            <tr>
                <td><?= h($customerProduct->id) ?></td>
                <td><?= h($customerProduct->customer_id) ?></td>
                <td><?= h($customerProduct->product_id) ?></td>
                <td><?= h($customerProduct->date) ?></td>
                <td><?= h($customerProduct->other_details) ?></td>
                <td><?= h($customerProduct->created) ?></td>
                <td><?= h($customerProduct->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CustomerProduct', 'action' => 'view', $customerProduct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CustomerProduct', 'action' => 'edit', $customerProduct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CustomerProduct', 'action' => 'delete', $customerProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerProduct->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
