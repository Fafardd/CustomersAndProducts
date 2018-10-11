<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductFile[]|\Cake\Collection\CollectionInterface $productFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product File'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productFile index large-9 medium-8 columns content">
    <h3><?= __('Product File') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <!--<th scope="col"><?= $this->Paginator->sort('id') ?></th>-->
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productFile as $productFile): ?>
            <tr>
                <!--<td><?= $this->Number->format($productFile->id) ?></td>-->
                <td><?= $productFile->has('product') ? $this->Html->link($productFile->product->name, ['controller' => 'Products', 'action' => 'view', $productFile->product->id]) : '' ?></td>
                <td><?= $productFile->has('file') ? $this->Html->link($productFile->file->name, ['controller' => 'Files', 'action' => 'view', $productFile->file->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productFile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productFile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productFile->id)]) ?>
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
