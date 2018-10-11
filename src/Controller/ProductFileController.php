<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductFile Controller
 *
 * @property \App\Model\Table\ProductFileTable $ProductFile
 *
 * @method \App\Model\Entity\ProductFile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductFileController extends AppController
{

    public function isAuthorized($user) {
        // By default deny access.
        $action = $this->request->getParam('action');
        
        if(in_array($action, ['edit', 'delete'])){
            if(strpos(($user['email']), 'admin') !==false ){
                return true;
            }
        } else if(in_array($action, ['view', 'add'])){
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
            'contain' => ['Products', 'Files']
        ];
        $productFile = $this->paginate($this->ProductFile);

        $this->set(compact('productFile'));
    }

    /**
     * View method
     *
     * @param string|null $id Product File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productFile = $this->ProductFile->get($id, [
            'contain' => ['Products', 'Files']
        ]);

        $this->set('productFile', $productFile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productFile = $this->ProductFile->newEntity();
        if ($this->request->is('post')) {
            $productFile = $this->ProductFile->patchEntity($productFile, $this->request->getData());
            if ($this->ProductFile->save($productFile)) {
                $this->Flash->success(__('The product file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product file could not be saved. Please, try again.'));
        }
        $products = $this->ProductFile->Products->find('list', ['limit' => 200]);
        $files = $this->ProductFile->Files->find('list', ['limit' => 200]);
        $this->set(compact('productFile', 'products', 'files'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productFile = $this->ProductFile->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productFile = $this->ProductFile->patchEntity($productFile, $this->request->getData());
            if ($this->ProductFile->save($productFile)) {
                $this->Flash->success(__('The product file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product file could not be saved. Please, try again.'));
        }
        $products = $this->ProductFile->Products->find('list', ['limit' => 200]);
        $files = $this->ProductFile->Files->find('list', ['limit' => 200]);
        $this->set(compact('productFile', 'products', 'files'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productFile = $this->ProductFile->get($id);
        if ($this->ProductFile->delete($productFile)) {
            $this->Flash->success(__('The product file has been deleted.'));
        } else {
            $this->Flash->error(__('The product file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
