<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customer Product'), ['controller' => 'CustomerProduct', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer Product'), ['controller' => 'CustomerProduct', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product File'), ['controller' => 'ProductFile', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product File'), ['controller' => 'ProductFile', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('price');
            echo $this->Form->control('type_id', ['options' => $types]);
            echo $this->Form->control('color');
            echo $this->Form->control('store_quantity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
