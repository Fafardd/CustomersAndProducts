<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductFileTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductFileTable Test Case
 */
class ProductFileTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductFileTable
     */
    public $ProductFile;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_file',
        'app.products',
        'app.files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductFile') ? [] : ['className' => ProductFileTable::class];
        $this->ProductFile = TableRegistry::getTableLocator()->get('ProductFile', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductFile);

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
