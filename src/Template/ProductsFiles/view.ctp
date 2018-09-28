<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsFile $productsFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Products File'), ['action' => 'edit', $productsFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Products File'), ['action' => 'delete', $productsFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Products File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productsFiles view large-9 medium-8 columns content">
    <h3><?= h($productsFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productsFile->has('product') ? $this->Html->link($productsFile->product->name, ['controller' => 'Products', 'action' => 'view', $productsFile->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= $productsFile->has('file') ? $this->Html->link($productsFile->file->name, ['controller' => 'Files', 'action' => 'view', $productsFile->file->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productsFile->id) ?></td>
        </tr>
    </table>
</div>
