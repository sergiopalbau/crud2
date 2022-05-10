<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Card $card
 */


?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Card'), ['action' => 'edit', $card->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Card'), ['action' => 'delete', $card->id], ['confirm' => __('Are you sure you want to delete # {0}?', $card->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cards'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Card'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cards view content">
            <h3><?= h($card->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $card->has('user') ? $this->Html->link($card->user->name, ['controller' => 'Users', 'action' => 'view', $card->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Img') ?></th>
                    <td>
                        <?= h($card->img); ?>
                        <br>
                        <?= $this->Html->image('cards/'.$card->img, array('width'=>300)) ?>

                
                </td>

                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($card->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($card->created) ?></td>
                </tr>
                <!-- <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($card->modified) ?></td>
                </tr> -->
            </table>
            <div class="text">
                <strong><?= __('DescriptionEs') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($card->descriptionEs)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('DescriptionEn') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($card->descriptionEn)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('DescriptionFr') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($card->descriptionFr)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Displays') ?></h4>
                <?php if (!empty($card->displays)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Reader Id') ?></th>
                            <th><?= __('Card Id') ?></th>
                            <th><?= __('Date (mm/dd/YY)') ?></th>
                            <!-- <th><?= __('Modified') ?></th> -->
                            <!-- <th class="actions"><?= __('Actions') ?></th> -->
                        </tr>
                        <?php foreach ($card->displays as $displays) : ?>
                        <tr>
                            <td><?= h($displays->id) ?></td>
                            <td><?= h($displays->reader_id) ?></td>
                            <td><?= h($displays->card_id) ?></td>
                            <td><?= h($displays->created) ?></td>
                            <!-- <td><?= h($displays->modified) ?></td> -->
                            <!-- <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Displays', 'action' => 'view', $displays->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Displays', 'action' => 'edit', $displays->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Displays', 'action' => 'delete', $displays->id], ['confirm' => __('Are you sure you want to delete # {0}?', $displays->id)]) ?>
                            </td> -->
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
