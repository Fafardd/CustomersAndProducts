<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Products",
    "action" => "getByType",
    "_ext" => "json"
        ]);
 echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
 echo $this->Html->script('CustomerProduct/add', ['block' => 'scriptBottom']);
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomerProduct $customerProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Customer Product'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customerProduct form large-9 medium-8 columns content">
    <?= $this->Form->create($customerProduct) ?>
    <fieldset>
        <legend><?= __('Add Customer Product') ?></legend>
        <?php
            echo $this->Form->control('customer_id', ['options' => $customers]);
            echo $this->Form->control('type_id', ['options' => $types]);
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('date');
            echo $this->Form->control('other_details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
