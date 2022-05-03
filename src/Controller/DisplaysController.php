<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Displays Controller
 *
 * @property \App\Model\Table\DisplaysTable $Displays
 * @method \App\Model\Entity\Display[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DisplaysController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Readers', 'Cards'],
        ];
        $displays = $this->paginate($this->Displays);

        $this->set(compact('displays'));
    }

    /**
     * View method
     *
     * @param string|null $id Display id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $display = $this->Displays->get($id, [
            'contain' => ['Readers', 'Cards'],
        ]);

        $this->set(compact('display'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $display = $this->Displays->newEmptyEntity();
        debug($display);
        echo "<br><hr>";
        

        if ($this->request->is('post')) {
            debug ($_POST);
            //array(2) { ["reader_id"]=> string(1) "1" ["card_id"]=> string(2) "11" } 
            $display = $this->Displays->patchEntity($display, $this->request->getData());
            debug ($display);
            if ($this->Displays->save($display)) {
                $this->Flash->success(__('The display has been saved.'));
                exit();
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The display could not be saved. Please, try again.'));
        }
        $readers = $this->Displays->Readers->find('list', ['limit' => 200])->all();
        $cards = $this->Displays->Cards->find('list', ['limit' => 200])->all();
        $this->set(compact('display', 'readers', 'cards'));
    }

    public function addGet($card=null, $reader = null)
    {
        if (!isset($card) || !isset ($reader)){
            echo " there isn't arguments";
            exit ();
        }

        $display = $this->Displays->newEmptyEntity();
        //debug($display);
        //echo "<br><hr>";
        $data = ["reader_id"=>$reader ,"card_id"=>$card];
        // debug($data);exit();
        $display = $this->Displays->patchEntity($display, $data, ['validate' => false]);
        //echo " despues de añadir <br><br><br>";
        //debug ($display);
        
        
            if ($this->Displays->save($display)) {
                //$this->Flash->success(__('The display has been saved.'));
                // exit();
                //return $this->redirect(['action' => 'index']);
                return $this->redirect("/cards/view/$card");
              
            }
            $this->Flash->error(__('The display could not be saved. Please, try again.'));
       
        
    }


    /**
     * Edit method
     *
     * @param string|null $id Display id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $display = $this->Displays->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $display = $this->Displays->patchEntity($display, $this->request->getData());
            if ($this->Displays->save($display)) {
                $this->Flash->success(__('The display has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The display could not be saved. Please, try again.'));
        }
        $readers = $this->Displays->Readers->find('list', ['limit' => 200])->all();
        $cards = $this->Displays->Cards->find('list', ['limit' => 200])->all();
        $this->set(compact('display', 'readers', 'cards'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Display id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $display = $this->Displays->get($id);
        if ($this->Displays->delete($display)) {
            $this->Flash->success(__('The display has been deleted.'));
        } else {
            $this->Flash->error(__('The display could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
