<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Type $type
 */
?>

<?php
$urlToTypesAutocompletedemoJson = $this->Url->build([
    "controller" => "Types",
    "action" => "findTypes",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToTypesAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('Types/autocomplete', ['block' => 'scriptBottom']);
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="types form large-9 medium-8 columns content">
    <?= $this->Form->create($type) ?>
    <fieldset>
        <legend><?= __('Add Type') ?></legend>
        <?php
            echo $this->Form->input('description', ['id' => 'autocomplete']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
