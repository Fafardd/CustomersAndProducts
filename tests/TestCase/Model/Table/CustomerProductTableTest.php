<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomerProductTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomerProductTable Test Case
 */
class CustomerProductTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomerProductTable
     */
    public $CustomerProduct;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.customer_product',
        'app.customers',
        'app.products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CustomerProduct') ? [] : ['className' => CustomerProductTable::class];
        $this->CustomerProduct = TableRegistry::getTableLocator()->get('CustomerProduct', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustomerProduct);

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
