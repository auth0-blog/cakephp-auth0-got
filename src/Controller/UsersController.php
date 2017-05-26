<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller' => 'list', 'action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }


    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add', 'logout']);
    }

    public function login()
    {
        $authCode = $this->request->query('code', null);
        if(!is_null($authCode)) {
          $user = $this->Auth->identify();
          if($user) {
            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
          }
        }

        // if ($this->request->is('post')) {
        //     $user = $this->Auth->identify();
        //     if ($user) {
        //         $this->Auth->setUser($user);
        //         return $this->redirect($this->Auth->redirectUrl());
        //     }

        //     $this->Flash->error(__('Invalid email or password, try again'));
        // }
    }

    public function logout()
    {
        $url = $this->Auth->logout();
        $this->request->session()->destroy();
        return $this->redirect($url);
        // $session = $this->request->session();
        // $session->destroy();
        // return $this->redirect($this->Auth->logout());
    }
}
