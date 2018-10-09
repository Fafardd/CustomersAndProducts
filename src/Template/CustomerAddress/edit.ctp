<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomerAddres $customerAddres
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customerAddres->customer_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customerAddres->customer_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Customer Address'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customerAddress form large-9 medium-8 columns content">
    <?= $this->Form->create($customerAddres) ?>
    <fieldset>
        <legend><?= __('Edit Customer Addres') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
