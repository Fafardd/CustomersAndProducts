<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Types Controller
 *
 * @property \App\Model\Table\TypesTable $Types
 *
 * @method \App\Model\Entity\Type[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypesController extends AppController
{

    
    
    public function isAuthorized($user) {
        // By default deny access.
        $action = $this->request->getParam('action');
        
        if(in_array($action, ['edit', 'delete', 'add', 'getTypes'])){
            if(strpos(($user['email']), 'admin') !==false ){
                return true;
            }
        } else if(in_array($action, ['view', 'add', 'getTypes'])){
            if(strpos(($user['email']), 'vendeur') !==false){
            return true;
            }
        } else if(in_array($action, ['autocomplete', 'findTypes', 'getTypes'])){
            return true;
        }else {
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
        $types = $this->paginate($this->Types);

        $this->set(compact('types'));
    }

    public function findTypes() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $description = $this->request->query['term'];
            $results = $this->Types->find('all', array(
                'conditions' => array('Types.description LIKE ' => '%' . $description . '%')
            ));
            
            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['description'], 'value' => $result['description']);
            }
            echo json_encode($resultArr);
        }
    }

    public function autocomplete() {
        
    }

    /**
     * View method
     *
     * @param string|null $id Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $type = $this->Types->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('type', $type);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $type = $this->Types->newEntity();
        if ($this->request->is('post')) {
            $type = $this->Types->patchEntity($type, $this->request->getData());
            if ($this->Types->save($type)) {
                $this->Flash->success(__('The type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type could not be saved. Please, try again.'));
        }
        $this->set(compact('type'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $type = $this->Types->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $type = $this->Types->patchEntity($type, $this->request->getData());
            if ($this->Types->save($type)) {
                $this->Flash->success(__('The type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type could not be saved. Please, try again.'));
        }
        $this->set(compact('type'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $type = $this->Types->get($id);
        if ($this->Types->delete($type)) {
            $this->Flash->success(__('The type has been deleted.'));
        } else {
            $this->Flash->error(__('The type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getTypes() {
        $this->autoRender = false; // avoid to render view

        $types = $this->Types->find('all', [
            'contain' => ['Products'],
        ]);

        $typesJ = json_encode($types);
        $this->response->type('json');
        $this->response->body($typesJ);

    }
}
