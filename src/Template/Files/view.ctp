<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\File $file
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit File'), ['action' => 'edit', $file->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete File'), ['action' => 'delete', $file->id], ['confirm' => __('Are you sure you want to delete # {0}?', $file->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product File'), ['controller' => 'ProductFile', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product File'), ['controller' => 'ProductFile', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="files view large-9 medium-8 columns content">
    <h3><?= h($file->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($file->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Path') ?></th>
            <td><?= h($file->path) ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($file->id) ?></td>
        </tr>-->
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($file->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($file->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $file->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Product File') ?></h4>
        <?php if (!empty($file->product_file)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <!--<th scope="col"><?= __('Id') ?></th>-->
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('File Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($file->product_file as $productFile): ?>
            <tr>
                <!--<td><?= h($productFile->id) ?></td>-->
                <td><?= h($productFile->product_id) ?></td>
                <td><?= h($productFile->file_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductFile', 'action' => 'view', $productFile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductFile', 'action' => 'edit', $productFile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductFile', 'action' => 'delete', $productFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productFile->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
