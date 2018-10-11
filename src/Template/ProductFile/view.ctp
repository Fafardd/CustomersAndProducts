<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductFile $productFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product File'), ['action' => 'edit', $productFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product File'), ['action' => 'delete', $productFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product File'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productFile view large-9 medium-8 columns content">
    <h3><?= h($productFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productFile->has('product') ? $this->Html->link($productFile->product->name, ['controller' => 'Products', 'action' => 'view', $productFile->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= $productFile->has('file') ? $this->Html->link($productFile->file->name, ['controller' => 'Files', 'action' => 'view', $productFile->file->id]) : '' ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productFile->id) ?></td>
        </tr>-->
    </table>
</div>
