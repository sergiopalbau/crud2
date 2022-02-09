<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DisplaysFixture
 */
class DisplaysFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'reader_id' => 1,
                'card_id' => 1,
                'created' => '2022-02-09 18:08:37',
                'modified' => '2022-02-09 18:08:37',
            ],
        ];
        parent::init();
    }
}
