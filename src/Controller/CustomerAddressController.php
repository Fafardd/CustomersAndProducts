<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustomerAddress Controller
 *
 * @property \App\Model\Table\CustomerAddressTable $CustomerAddress
 *
 * @method \App\Model\Entity\CustomerAddres[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomerAddressController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Addresses']
        ];
        $customerAddress = $this->paginate($this->CustomerAddress);

        $this->set(compact('customerAddress'));
    }

    /**
     * View method
     *
     * @param string|null $id Customer Addres id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customerAddres = $this->CustomerAddress->get($id, [
            'contain' => ['Customers', 'Addresses']
        ]);

        $this->set('customerAddres', $customerAddres);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customerAddres = $this->CustomerAddress->newEntity();
        if ($this->request->is('post')) {
            $customerAddres = $this->CustomerAddress->patchEntity($customerAddres, $this->request->getData());
            if ($this->CustomerAddress->save($customerAddres)) {
                $this->Flash->success(__('The customer addres has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer addres could not be saved. Please, try again.'));
        }
        $customers = $this->CustomerAddress->Customers->find('list', ['limit' => 200]);
        $addresses = $this->CustomerAddress->Addresses->find('list', ['limit' => 200]);
        $this->set(compact('customerAddres', 'customers', 'addresses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer Addres id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customerAddres = $this->CustomerAddress->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customerAddres = $this->CustomerAddress->patchEntity($customerAddres, $this->request->getData());
            if ($this->CustomerAddress->save($customerAddres)) {
                $this->Flash->success(__('The customer addres has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer addres could not be saved. Please, try again.'));
        }
        $customers = $this->CustomerAddress->Customers->find('list', ['limit' => 200]);
        $addresses = $this->CustomerAddress->Addresses->find('list', ['limit' => 200]);
        $this->set(compact('customerAddres', 'customers', 'addresses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer Addres id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customerAddres = $this->CustomerAddress->get($id);
        if ($this->CustomerAddress->delete($customerAddres)) {
            $this->Flash->success(__('The customer addres has been deleted.'));
        } else {
            $this->Flash->error(__('The customer addres could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
