<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\frozenTime;
use Cake\ORM\Locator\LocatorAwareTrait;


/**
 * Cards Controller
 *
 * @property \App\Model\Table\CardsTable $Cards
 * @method \App\Model\Entity\Card[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CardsController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->Auth->allow(['envia','sendAll','cardImage']);
       // $this->Auth->allow(['logout', 'add']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $cards = $this->paginate($this->Cards);

        $this->set(compact('cards'));
    }

    /**
     * View method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $card = $this->Cards->get($id, [
            'contain' => ['Users', 'Displays'],
        ]);

        $this->set(compact('card'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $card = $this->Cards->newEmptyEntity();
        if ($this->request->is('post')) {
            $card = $this->Cards->patchEntity($card, $this->request->getData());

            //add image

            $image = $this->request->getData ('img');
           
            if ($image) {
                $tiempo = FrozenTime::now()->toUnixString();
                $nombreImagen = $tiempo."_".$image->getClientFileName();
                $destino=WWW_ROOT."img/cards/".$nombreImagen;
                $image->moveTo($destino);
                $card->img = $nombreImagen;               
            }
            



            if ($this->Cards->save($card)) {
                $this->Flash->success(__('The card has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The card could not be saved. Please, try again.'));
        }
        $users = $this->Cards->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('card', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $card = $this->Cards->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nombreImagenAnterior = $card->img;

            $card = $this->Cards->patchEntity($card, $this->request->getData());
            $image = $this->request->getData('img');  //recuperar lo que vino del form
            $card->img= $nombreImagenAnterior;
               
            if ($image->getClientFileName()){

                if (file_exists(WWW_ROOT.'img/cards/'.$card['img'])){
                    unlink(WWW_ROOT.'img/cards/'.$nombreImagenAnterior);
                }
                $tiempo = FrozenTime::now()->toUnixString();
                $nombreImagen = $tiempo."_".$image->getClientFileName();
                $destino=WWW_ROOT."img/cards/".$nombreImagen;
                $image->moveTo($destino);
                $card->img = $nombreImagen;  

            }



            if ($this->Cards->save($card)) {
                $this->Flash->success(__('The card has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The card could not be saved. Please, try again.'));
        }
        $users = $this->Cards->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('card', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $card = $this->Cards->get($id);
        
        //delete img
        if (file_exists((WWW_ROOT.'img/cards/'.$card['img']))){
            
            unlink(WWW_ROOT.'img/cards/'.$card['img']);

        }

        if ($this->Cards->delete($card)) {
            $this->Flash->success(__('The card has been deleted.'));
        } else {
            $this->Flash->error(__('The card could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function sendAll (){
        $cards = $this->paginate($this->Cards);
        echo json_encode($cards);
        exit();

        /*
        if ($id == null){
            $this->Flash->success(__('The card no existe.'));
            return;
        }
        $card = $this->Cards->get($id);

        $this->set(compact('card'));
        */

    
    }
    public function cardImage ($id=null, $txt=null){

              
        print "id ". $id . "  - txt ". $txt . "<br><hr><br>";

        $query = $this->getTableLocator()->get('Readers')
                    ->find()
                    ->select(['id','email'])
                    ->where(['email'=>"$txt"])
                    ->toList();
        
        
        if (sizeof($query) == 1){
               echo "<hr> Existe el lector ... <br>" . $query[0]['id'] ."-> ". $query[0]['email']."<br>";
              // $sql = "INSERT INTO displays (reader_id, card_id, created, modified) VALUES (1, 12, NULL, NULL);";
              
           }

        //}
        // $query = $this->getTableLocator()->get('Readers')
        // ->find()
        // ->select(['id','email'])
        // ->where(['email'=>'lector@lector1.com'])
        // ->toList();



       

        // $query = $this->getTableLocator()->get('Readers')->find();
        // $query->where(['email'=>'lector1@lector1.com']);



        // debug ($query->all());
        // $query = $this->getTableLocator()->get('Readers')->find();
        // $query->where(['email'=>'lector2@gmail.com']);
        // $reader = $query->all();
        // echo $reader->id;
        // debug ($query->all());
       
        // foreach ($query->all() as $article) {
        //     debug($article->email);
        // }
        exit();
        $card = $this->Cards->get($id);
        //print_r ($card);
        echo $card['img'];
        $uri = WWW_ROOT.'img/cards/'.$card['img'];
        //echo $uri;
        echo "<img src='$uri' alt=''>";
        //echo json_encode ($card);
        exit();

    }
}
