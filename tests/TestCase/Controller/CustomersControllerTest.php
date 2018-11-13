<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CustomersController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\CustomersController Test Case
 */
class CustomersControllerTest extends IntegrationTestCase
{

public $AuthAdmin;
public $Customers;
public $AuthSuper;
    public function setUp()
    {
        parent::setUp();
        $this->Customers = TableRegistry::get('Customers');
        $usersTable = TableRegistry::get('Users');
        $userAdmin = $usersTable->find('all', ['conditions' => ['Users.email' => 'admin@admin.com']])->first()->toArray();
        $userSuper = $usersTable->find('all', ['conditions' => ['Users.email' => 'gfdsg@gmail.com']])->first()->toArray();
        $this->AuthAdmin = [
            'Auth' => [
                'User' => $userAdmin
            ]
        ];
        $this->AuthSuper = [
            'Auth' => [
                'User' => $userSuper
            ]
        ];
    }

    public function tearDown()
    {
        unset($this->AuthAdmin);
        unset($this->AuthSuper);
        unset($this->Customers);
        parent::tearDown();
    }
    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.customers',
        'app.customer_product'
    ];

    public function testIsAuthorized()
    {
        $this->session($this->AuthSuper);
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->delete('/clients/delete/1');
        $this->assertSession('You are not authorized to access that location.', 'Flash.flash.0.message');
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->session($this->AuthAdmin);
        $this->get('/customers');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->session($this->AuthAdmin);
        $this->get('/customers/view/1');
        //echo $this->_response->body();
        $this->assertResponseContains('Test Name One');
        $this->assertResponseOk();
    }

    public function testViewCustomers()
    {
        $this->session($this->AuthAdmin);
        $customers = $this->Customers->find('all', ['conditions' => ['Cars.client_id' => 1]]);
        $this->get('/customers/view-customers/1');
        foreach ($customers as $customer) {
            $this->assertResponseContains($customers->name);
        }
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->session($this->AuthAdmin);
        $this->get('/customers/add');
        $this->assertResponseOk();
        $data = [
            'id' => 10,
            'number' => 10,
            'name' => 'test10',
            'phone' => 'test10',
            'other_details' => 'test10',
            'created' => '2018-09-24 15:30:09',
            'modified' => '2018-09-24 15:30:09'
        ];
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/customers/add', $data);
        //echo $this->_response->body();
        $this->assertResponseSuccess();
        $query = $this->Customers->find('all', ['conditions' => ['Customers.id' => $data['id']]]);
        $this->assertNotEmpty($query);
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->session($this->AuthAdmin);
        $newName = 'Test Client Edit';
        $customer = $this->Customers->find('all')->first();
        $customer->name = $newName;
        $customerId = $customers->id;
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/customers/edit/' . $customerId, $customer->toArray());
        //echo $this->_response->body();
        $this->assertResponseSuccess();
        $query = $this->Customers->find('all', ['conditions' => ['Customers.id' => $customerId]])->first();
        $this->assertEquals($newName, $query->name);
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->session($this->AuthAdmin);
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->delete('/Customers/delete/1');
        $this->assertResponseSuccess();
        $query = $this->Customers->find('all', ['conditions' => ['Customers.id' => 1]])->first();
        $this->assertEmpty($query);
    }
}
