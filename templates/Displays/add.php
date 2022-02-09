<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Display $display
 * @var \Cake\Collection\CollectionInterface|string[] $readers
 * @var \Cake\Collection\CollectionInterface|string[] $cards
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Displays'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="displays form content">
            <?= $this->Form->create($display) ?>
            <fieldset>
                <legend><?= __('Add Display') ?></legend>
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
