<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $product->has('type') ? $this->Html->link($product->type->description, ['controller' => 'Types', 'action' => 'view', $product->type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Color') ?></th>
            <td><?= h($product->color) ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>-->
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($product->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Store Quantity') ?></th>
            <td><?= $this->Number->format($product->store_quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($product->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Customer Product') ?></h4>
        <?php if (!empty($product->customer_product)): ?>
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
            <?php foreach ($product->customer_product as $customerProduct): ?>
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