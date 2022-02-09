<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Displays Model
 *
 * @property \App\Model\Table\ReadersTable&\Cake\ORM\Association\BelongsTo $Readers
 * @property \App\Model\Table\CardsTable&\Cake\ORM\Association\BelongsTo $Cards
 *
 * @method \App\Model\Entity\Display newEmptyEntity()
 * @method \App\Model\Entity\Display newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Display[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Display get($primaryKey, $options = [])
 * @method \App\Model\Entity\Display findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Display patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Display[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Display|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Display saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Display[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Display[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Display[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Display[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DisplaysTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('displays');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Readers', [
            'foreignKey' => 'reader_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Cards', [
            'foreignKey' => 'card_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('reader_id', 'Readers'), ['errorField' => 'reader_id']);
        $rules->add($rules->existsIn('card_id', 'Cards'), ['errorField' => 'card_id']);

        return $rules;
    }
}
