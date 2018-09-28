<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductsFiles Controller
 *
 * @property \App\Model\Table\ProductsFilesTable $ProductsFiles
 *
 * @method \App\Model\Entity\ProductsFile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsFilesController extends AppController
{

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
        $productsFiles = $this->paginate($this->ProductsFiles);

        $this->set(compact('productsFiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Products File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productsFile = $this->ProductsFiles->get($id, [
            'contain' => ['Products', 'Files']
        ]);

        $this->set('productsFile', $productsFile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productsFile = $this->ProductsFiles->newEntity();
        if ($this->request->is('post')) {
            $productsFile = $this->ProductsFiles->patchEntity($productsFile, $this->request->getData());
            if ($this->ProductsFiles->save($productsFile)) {
                $this->Flash->success(__('The products file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products file could not be saved. Please, try again.'));
        }
        $products = $this->ProductsFiles->Products->find('list', ['limit' => 200]);
        $files = $this->ProductsFiles->Files->find('list', ['limit' => 200]);
        $this->set(compact('productsFile', 'products', 'files'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Products File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productsFile = $this->ProductsFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productsFile = $this->ProductsFiles->patchEntity($productsFile, $this->request->getData());
            if ($this->ProductsFiles->save($productsFile)) {
                $this->Flash->success(__('The products file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products file could not be saved. Please, try again.'));
        }
        $products = $this->ProductsFiles->Products->find('list', ['limit' => 200]);
        $files = $this->ProductsFiles->Files->find('list', ['limit' => 200]);
        $this->set(compact('productsFile', 'products', 'files'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Products File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productsFile = $this->ProductsFiles->get($id);
        if ($this->ProductsFiles->delete($productsFile)) {
            $this->Flash->success(__('The products file has been deleted.'));
        } else {
            $this->Flash->error(__('The products file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
