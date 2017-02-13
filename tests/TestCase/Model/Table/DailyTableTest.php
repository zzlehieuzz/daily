<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DailyTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DailyTable Test Case
 */
class DailyTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DailyTable
     */
    public $Daily;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.daily',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Daily') ? [] : ['className' => 'App\Model\Table\DailyTable'];
        $this->Daily = TableRegistry::get('Daily', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Daily);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
