<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use Illuminate\Http\Request;

use App\Models\encuestas;

use App\Models\preguntas;

use App\Models\opciones_respuestas;
use App\Models\participantes;
use App\Models\usuarios_respuestas;


use App\Models\tramites;
use Illuminate\Support\Facades\DB;

class HomeEncuestaController extends Controller
{
    public function homeEncuesta($categoria, $municipio = null){

     

        $idMunicipio = $municipio;

        $idCategoria = $categoria;

        $idUsuario = session('user_id');

        if($municipio == null){

            $tramites = tramites::where('id_categoria', '=', $idCategoria)
                            ->orderBy('nombre_tramite','asc')->get();

           

        }else{

            $tramites = tramites::where('id_categoria', '=', $idCategoria)
                            ->where('id_municipio', '=', $idMunicipio)
                            ->orderBy('nombre_tramite','asc')->get();

           
        }     



            return view('frontend.homeEncuesta', compact('tramites','idCategoria','idMunicipio','idUsuario'));
   
    }

    public function showEncuesta($categoria, $municipio){

        $idCategoria = $categoria;

        $idMunicipio = $municipio;

       

        return view('frontend.showEncuestas', compact('idCategoria','idMunicipio'));

    }

    public function storeRespuesta(Request $request){

       $datos = $request->all();
              
        $idCategoria=DB::table('categorias')
        ->select('id')
        ->where('id','=', $datos['idCategoria'])
        ->first()
        ->id;

        if($datos['participante']['nombreu'] || $datos['participante']['email'] || $datos['participante']['edad'] || $datos['participante']['estudio'] != null){
            participantes::create([
                'nombre'=>$datos['participante']['nombreu'],
                'email' => $datos['participante']['email'],
                'edad' => $datos['participante']['edad'],
                'estudio' => $datos['participante']['estudio']
            ]);

            $lastId = participantes::latest('id')->first();

            foreach ($datos['data'] as $dato) {
                //echo $dato['idpregunta'];
               // echo $dato;
               if($request['idMunicipio']!=null){        
                     usuarios_respuestas::create([
                       'pregunta' => $dato['idPregunta'],
                       'respuesta_texto' => $dato['respuesta_texto'],
                       'id_categoria'=> $idCategoria,
                       'id_municipio'=>$request['idMunicipio'],
                       'id_participante'  => $lastId->id
                   ]);       
               }else{
                   usuarios_respuestas::create([
                       'pregunta' => $dato['idPregunta'],
                       'respuesta_texto' => $dato['respuesta_texto'],
                       'id_categoria'=> $idCategoria,   
                       'id_participante'  => $lastId->id                 
                   ]);             
               } 
                          
        }

        }
        else{
            foreach ($datos['data'] as $dato) {
                //echo $dato['idpregunta'];
               // echo $dato;
               if($request['idMunicipio']!=null){        
                     usuarios_respuestas::create([
                       'pregunta' => $dato['idPregunta'],
                       'respuesta_texto' => $dato['respuesta_texto'],
                       'id_categoria'=> $idCategoria,
                       'id_municipio'=>$request['idMunicipio'],
                       'id_participante' => '1'
                   ]);       
               }else{
                   usuarios_respuestas::create([
                       'pregunta' => $dato['idPregunta'],
                       'respuesta_texto' => $dato['respuesta_texto'],                       
                       'id_categoria'=> $idCategoria,  
                       'id_participante' => '1'                  
                   ]);             
               } 
                          
           }            
        }            
        
        

        return response()->json($datos['participante']);

    }

    public function agradecimiento($id){

        $idCategoria = $id;

        $encuesta = encuestas::where('id', '=', $id)->get();       

        if($id== 2){

            $encuestas = categorias::where('id','=', '1')
                                     ->get();
            
        }else{

            $encuestas = categorias::where('id','=', '2')
                                     ->get();

        }


        return view('frontend.agradecimientos', compact('encuestas','idCategoria'));

    }
}

