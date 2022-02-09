<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Display Entity
 *
 * @property int $id
 * @property int $reader_id
 * @property int $card_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Reader $reader
 * @property \App\Model\Entity\Card $card
 */
class Display extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'reader_id' => true,
        'card_id' => true,
        'created' => true,
        'modified' => true,
        'reader' => true,
        'card' => true,
    ];
}
