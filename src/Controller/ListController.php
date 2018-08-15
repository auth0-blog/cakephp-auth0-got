<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * List Controller
 *
 * @property \App\Model\Table\ListTable $List
 *
 * @method \App\Model\Entity\List[] paginate($object = null, array $settings = [])
 */
class ListController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        $characters = [
         'Daenerys Targaryen' => 'Emilia Clarke',
         'Jon Snow'           => 'Kit Harington',
         'Arya Stark'         => 'Maisie Williams',
         'Melisandre'         => 'Carice van Houten',
         'Khal Drogo'         => 'Jason Momoa',
         'Tyrion Lannister'   => 'Peter Dinklage',
         'Ramsay Bolton'      => 'Iwan Rheon',
         'Petyr Baelish'      => 'Aidan Gillen',
         'Brienne of Tarth'   => 'Gwendoline Christie',
         'Lord Varys'         => 'Conleth Hill'
       ];

        $this->set(compact('characters'));

        $this->initialize();
        $domain = $this->Auth->getAuthenticate('Auth0.Auth0')->getDomain();
        $clientId = $this->Auth->getAuthenticate('Auth0.Auth0')->getClientId();
        $redirectUrl = $this->Auth->getAuthenticate('Auth0.Auth0')->getRedirectUri();
        $loginUrl = sprintf('https://%s/authorize?client_id=%s&response_type=code&redirect_uri=%s', $domain, $clientId, $redirectUrl);

        $this->set(compact('loginUrl'));
    }

    /**
     * View method
     *
     * @param string|null $id List id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $characters = [
         'Daenerys Targaryen' => 'Emilia Clarke',
         'Jon Snow'           => 'Kit Harington',
         'Arya Stark'         => 'Maisie Williams',
         'Melisandre'         => 'Carice van Houten',
         'Khal Drogo'         => 'Jason Momoa',
         'Tyrion Lannister'   => 'Peter Dinklage',
         'Ramsay Bolton'      => 'Iwan Rheon',
         'Petyr Baelish'      => 'Aidan Gillen',
         'Brienne of Tarth'   => 'Gwendoline Christie',
         'Lord Varys'         => 'Conleth Hill'
       ];

        $this->set(compact('characters'));
    }
}
