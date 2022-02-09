<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Display $display
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Display'), ['action' => 'edit', $display->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Display'), ['action' => 'delete', $display->id], ['confirm' => __('Are you sure you want to delete # {0}?', $display->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Displays'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Display'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="displays view content">
            <h3><?= h($display->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Reader') ?></th>
                    <td><?= $display->has('reader') ? $this->Html->link($display->reader->name, ['controller' => 'Readers', 'action' => 'view', $display->reader->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Card') ?></th>
                    <td><?= $display->has('card') ? $this->Html->link($display->card->id, ['controller' => 'Cards', 'action' => 'view', $display->card->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($display->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($display->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($display->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
