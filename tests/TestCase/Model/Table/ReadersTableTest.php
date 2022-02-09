<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReadersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReadersTable Test Case
 */
class ReadersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReadersTable
     */
    protected $Readers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Readers',
        'app.Users',
        'app.Displays',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Readers') ? [] : ['className' => ReadersTable::class];
        $this->Readers = $this->getTableLocator()->get('Readers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Readers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ReadersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ReadersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
