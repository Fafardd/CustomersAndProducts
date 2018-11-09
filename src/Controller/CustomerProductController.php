<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustomerProduct Controller
 *
 * @property \App\Model\Table\CustomerProductTable $CustomerProduct
 *
 * @method \App\Model\Entity\CustomerProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomerProductController extends AppController
{
    public function isAuthorized($user) {
        // By default deny access.
        $action = $this->request->getParam('action');
        
        if(in_array($action, ['edit', 'delete', 'getByType'])){
            if(strpos(($user['email']), 'admin') !==false ){
                return true;
            }
        } else if(in_array($action, ['view', 'add', 'getByType'])){
            return true;
        } else {
            return false;
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Products']
        ];
        $customerProduct = $this->paginate($this->CustomerProduct);

        $this->set(compact('customerProduct'));
    }

    /**
     * View method
     *
     * @param string|null $id Customer Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customerProduct = $this->CustomerProduct->get($id, [
            'contain' => ['Customers', 'Products']
        ]);

        $this->set('customerProduct', $customerProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customerProduct = $this->CustomerProduct->newEntity();
        if ($this->request->is('post')) {
            $customerProduct = $this->CustomerProduct->patchEntity($customerProduct, $this->request->getData());
            if ($this->CustomerProduct->save($customerProduct)) {
                $this->Flash->success(__('The customer product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer product could not be saved. Please, try again.'));
        }
        $this->loadModel('Types');
        $types = $this->Types->find('list', ['limit' =>200]);

        $types = $types->toArray();
        reset($types);
        $type_id = key($types);

        $products = $this->CustomerProduct->Products->find('list',[
            'conditions' => ['Products.type_id' => $type_id],
        ]);

        $customers = $this->CustomerProduct->Customers->find('list', ['limit' => 200]);
        //$products = $this->CustomerProduct->Products->find('list', ['limit' => 200]);
        $this->set(compact('customerProduct', 'customers', 'products','types'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customerProduct = $this->CustomerProduct->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customerProduct = $this->CustomerProduct->patchEntity($customerProduct, $this->request->getData());
            if ($this->CustomerProduct->save($customerProduct)) {
                $this->Flash->success(__('The customer product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer product could not be saved. Please, try again.'));
        }
        $customers = $this->CustomerProduct->Customers->find('list', ['limit' => 200]);
        $products = $this->CustomerProduct->Products->find('list', ['limit' => 200]);
        $this->set(compact('customerProduct', 'customers', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customerProduct = $this->CustomerProduct->get($id);
        if ($this->CustomerProduct->delete($customerProduct)) {
            $this->Flash->success(__('The customer product has been deleted.'));
        } else {
            $this->Flash->error(__('The customer product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getByType() {
        $type_id = $this->request->query('type_id');

        $products = $this->products->find('all', [
            'conditions' => ['products.type_id' => $type_id],
        ]);
        $this->set('products', $products);
        $this->set('_serialize', ['products']);
    }
}
