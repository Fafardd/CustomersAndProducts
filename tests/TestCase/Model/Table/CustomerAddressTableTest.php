<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomerAddressTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomerAddressTable Test Case
 */
class CustomerAddressTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomerAddressTable
     */
    public $CustomerAddress;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.customer_address',
        'app.customers',
        'app.addresses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CustomerAddress') ? [] : ['className' => CustomerAddressTable::class];
        $this->CustomerAddress = TableRegistry::getTableLocator()->get('CustomerAddress', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustomerAddress);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
