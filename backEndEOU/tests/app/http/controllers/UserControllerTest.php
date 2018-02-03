<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserControllerTest extends TestCase
{
    
    public function testGetUser()
    {
        
        $user = factory(App\Models\User::class)->create();

        $this->get('user/'.$user->id)->seeStatusCode(200);
        $this->seeJson(['nome' => $user->nome]);

    } 
    
    public function testGetAllUsers()
    {
        
        $users = factory(App\Models\User::class,2)->create();

        $this->get('user')->seeStatusCode(200);

        foreach($users as $user)
        {
            $this->seeJson(['nome' => $user->nome]);
        }

    }
    
    public function testCreateUser()
    {
        $this->json('POST', 'user', [
            'nome' => 'Joao',
            'email' => 'joao@joao.com',
            'telefone' => '1',
            'cpf' => '2',
            'latitude' => '3',
            'longitude' => '4'
        ])
        ->seeStatusCode(200)
        ->seeJson(['nome' => 'Joao'])
        ->seeJson(['email' => 'joao@joao.com'])
        ->seeJson(['telefone' => '1'])
        ->seeJson(['cpf' => '2'])
        ->seeJson(['latitude' => '3'])
        ->seeJson(['longitude' => '4']);
    }

    /*
    public function testCSV()
    {

        $arquivo = new UploadedFile(base_path('storage\listaUsuarios.csv'), 'listaUsuarios',null,null,null,true);


        var_dump($arquivo);

        var_dump($this->post('user/upload/csv',[
            'listaUsuarios' => $arquivo
        ])->response->getContent());

        $this->post('user/upload/csv',[
            'listaUsuarios' => $arquivo
        ])
        ->seeStatusCode(200);
    }
    */

}