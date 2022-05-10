<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Display[]|\Cake\Collection\CollectionInterface $displays
 */
?>
<div class="displays index content">
    <?php // $this->Html->link(__('New Display'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    
    <h3><?= __('Displays') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('reader_id') ?></th>
                    <th><?= $this->Paginator->sort('card_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <!-- <th> -->
                        <?php // $this->Paginator->sort('modified') ?>
                    <!-- </th> -->
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($displays as $display): ?>
                <tr>
                    <td><?= $this->Number->format($display->id) ?></td>
                    <td><?= $display->has('reader') ? $this->Html->link($display->reader->name, ['controller' => 'Readers', 'action' => 'view', $display->reader->id]) : '' ?></td>
                    <td><?= $display->has('card') ? $this->Html->link($display->card->id, ['controller' => 'Cards', 'action' => 'view', $display->card->id]) : '' ?></td>
                    <td><?= h($display->created) ?></td>
                    <!-- <td> -->
                        <?php // h($display->modified) ?>
                    <!-- </td> -->
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $display->id]) ?>
                        <?php //$this->Html->link(__('Edit'), ['action' => 'edit', $display->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $display->id], ['confirm' => __('Are you sure you want to delete # {0}?', $display->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
