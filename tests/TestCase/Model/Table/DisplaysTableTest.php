<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DisplaysTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DisplaysTable Test Case
 */
class DisplaysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DisplaysTable
     */
    protected $Displays;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Displays',
        'app.Readers',
        'app.Cards',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Displays') ? [] : ['className' => DisplaysTable::class];
        $this->Displays = $this->getTableLocator()->get('Displays', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Displays);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DisplaysTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DisplaysTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
