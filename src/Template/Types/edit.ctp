<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Type $type
 */

$urlToTypesAutocompleteJson = $this->Url->build([
    "controller" => "Types",
    "action" => "findTypes",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToTypesAutocompleteJson . '";', ['block' => true]);
echo $this->Html->script('Types/autocomplete', ['block' => 'scriptBottom']);
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Type $type
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $type->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $type->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="types form large-9 medium-8 columns content">
    <?= $this->Form->create($type) ?>
    <fieldset>
        <legend><?= __('Edit Type') ?></legend>
        <?php
            echo $this->Form->control('description' ,['id' => 'autocomplete']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
