<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Card Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $img
 * @property string|null $descriptionEs
 * @property string|null $descriptionEn
 * @property string|null $descriptionFr
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Display[] $displays
 */
class Card extends Entity
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
        'user_id' => true,
        'img' => true,
        'descriptionEs' => true,
        'descriptionEn' => true,
        'descriptionFr' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'displays' => true,
    ];
}
