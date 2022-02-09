<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reader $reader
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Reader'), ['action' => 'edit', $reader->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Reader'), ['action' => 'delete', $reader->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reader->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Readers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Reader'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="readers view content">
            <h3><?= h($reader->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $reader->has('user') ? $this->Html->link($reader->user->name, ['controller' => 'Users', 'action' => 'view', $reader->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($reader->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($reader->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Empresa') ?></th>
                    <td><?= h($reader->empresa) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($reader->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($reader->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($reader->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Displays') ?></h4>
                <?php if (!empty($reader->displays)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Reader Id') ?></th>
                            <th><?= __('Card Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($reader->displays as $displays) : ?>
                        <tr>
                            <td><?= h($displays->id) ?></td>
                            <td><?= h($displays->reader_id) ?></td>
                            <td><?= h($displays->card_id) ?></td>
                            <td><?= h($displays->created) ?></td>
                            <td><?= h($displays->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Displays', 'action' => 'view', $displays->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Displays', 'action' => 'edit', $displays->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Displays', 'action' => 'delete', $displays->id], ['confirm' => __('Are you sure you want to delete # {0}?', $displays->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
