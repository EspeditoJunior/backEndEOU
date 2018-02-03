<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function Buscar($id = null)
    {
        try 
        {

            if($id)
            {
                $resposta = User::where('id','=',$id)->get()->toArray();
            }
            else
            {
                $resposta = User::get()->toArray();
            }
            

            foreach($resposta as $i=>$r)
            {
                $local = self::buscarLocal($r['latitude'],$r['longitude']);

                
                if($local)
                {
                    $resposta[$i]['local'] = $local;
                }
                else
                {
                    $resposta[$i]['local'] = "Coordenadas inválidas";
                }

            }


            return response()->json($resposta);   
        
        } catch(\Exception $e){

            return response()->json(['erro' => $e->getMessage()], 500);
        
        }       
    }
    
    public function Inserir(Request  $request)
    {

        try
        {
            $conteudo = json_decode($request->getContent(),true);

          
            $rules = [
                'nome' => 'required|max:50',
                'email' => 'required|max:50|email',
                'cpf' => 'required|max:50',
                'telefone' => 'required|max:50',
                'latitude' => 'required|max:50',
                'longitude' => 'required|max:50'
            ];

            $messages = [
                'required' => 'O campo :attribute é obrigatorio.',
                'email' => 'O campo :attribute deve ser no formato de e-mail.',
                'max' => 'O campo :attribute ultrapassou o limite de :max caracteres.',
            ];

        
            $validator = Validator::make($conteudo, $rules, $messages);
            if (!$validator->passes()) {
                return response()->json($validator->errors()->all(),400);
            }


            $user = new User;
            $user->nome = $conteudo['nome'];
            $user->email = $conteudo['email'];
            $user->cpf = $conteudo['cpf'];
            $user->telefone = $conteudo['telefone'];
            $user->latitude = $conteudo['latitude'];
            $user->longitude = $conteudo['longitude'];
    
            $user->save();

            return response()->json($user);

        } catch(\Exception $e){
            
            return response()->json(['erro' => $e->getMessage()], 500);

        }  

    }

    public function InserirCSV(Request $request)
    {
        try
        {
 
            $arquivo = $request->file();
            $arquivo = reset($arquivo);


            if (!$arquivo)
            {
                return response()->json(['Erro' => 'Um arquivo CSV deve ser enviado'],400);
            }

            if($arquivo->clientExtension() != 'csv')
            {
                return response()->json(['Erro' => 'O arquivo enviado deve estar no formato CSV'],400);
            }
           

            $arquivo = fopen($arquivo->path(),"r");
            $i = 0;
    
            while ( ($data = fgetcsv($arquivo, null, ",")) !==FALSE )
            {
                
                if ($i != 0)
                {
                    if(count($data) == 6)
                    {
                        $user = new User;
                        $user->nome = $data[0];
                        $user->email = $data[1];
                        $user->cpf = $data[2];
                        $user->telefone = $data[3];
                        $user->latitude = $data[4];
                        $user->longitude = $data[5];
                
                        $user->save();
                    }
                    else
                    {
                        return response()->json(['Erro' => 'CSV no formato incorreto'],400);
                    }

                }
                
                $i++;
            }

            return response()->json(['Sucesso' => 'Usuários cadastrados com sucesso' ]);
  
        } catch(\Exception $e){
                
            return response()->json(['erro' => $e->getMessage()], 500);

        }  
    }
    
    public function buscarLocal($latitude,$longitude)
    {
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$latitude.','.$longitude.'&key=AIzaSyDi3M1OFam6pXA0AIxheRs6xo0ES2OsG4o';
        
        try 
        {

            $respostaApi = json_decode(file_get_contents($url), true);
            
            $local = '';
        
            foreach($respostaApi['results'][0]['address_components'] as $r)
            {
                $local .= $r['short_name'].", ";
            }
            
            return $local;

        } catch (\Exception $e) {
            return "Geolocalização cadastrada é inválida";
        }

    }

}