<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Display $display
 * @var string[]|\Cake\Collection\CollectionInterface $readers
 * @var string[]|\Cake\Collection\CollectionInterface $cards
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $display->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $display->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Displays'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="displays form content">
            <?= $this->Form->create($display) ?>
            <fieldset>
                <legend><?= __('Edit Display') ?></legend>
                <?php
                    echo $this->Form->control('reader_id', ['options' => $readers]);
                    echo $this->Form->control('card_id', ['options' => $cards]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
