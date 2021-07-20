<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\encuestas;

use App\Models\preguntas;

use App\Models\opciones_respuestas;

use App\Models\usuarios_respuestas;

use App\Models\usuarios_encuestas;

use App\Models\tramites;


class HomeEncuestaController extends Controller
{
    public function homeEncuesta($categoria,$encuesta, $municipio = null){

        $idEncuesta = $encuesta;

        $idMunicipio = $municipio;

        $idCategoria = $categoria;

        $idUsuario = session('user_id');

        if($municipio == null){

            $tramites = tramites::where('id_categoria', '=', $idCategoria)
                            ->orderBy('nombre_tramite','asc')->get();

            $contestado = usuarios_encuestas::where('id_usuario', '=', $idUsuario)
                                            ->where('id_encuesta', '=', $idEncuesta)->get();

        }else{

            $tramites = tramites::where('id_categoria', '=', $idCategoria)
                            ->where('id_municipio', '=', $idMunicipio)
                            ->orderBy('nombre_tramite','asc')->get();

            $contestado = usuarios_encuestas::where('id_usuario', '=', $idUsuario)
                                            ->where('id_encuesta', '=', $idEncuesta)
                                            ->where('id_municipio', '=', $idMunicipio)->get();

        }

        if(count($contestado) > 0){

            if($municipio != null){

                return redirect()->route('home.categorias.show',['id' => 2])->with('error','0');

            }else{

                return redirect()->route('home.categorias')->with('error','0');

            }

        }else{

            $preguntas = preguntas::select('preguntas.*')
                        ->join('encuestas', 'preguntas.id_encuesta', '=', 'encuestas.id')
                        ->where('preguntas.id_encuesta', '=', $idEncuesta)
                        ->orderBy('preguntas.id')->get();

            $encuesta = encuestas::find($idEncuesta);

            $opciones = opciones_respuestas::select('opciones_respuestas.*')
                        ->join('preguntas', 'opciones_respuestas.id_pregunta', '=', 'preguntas.id')
                        ->join('encuestas', 'preguntas.id_encuesta', '=', 'encuestas.id')
                        ->where('encuestas.id', '=', $idEncuesta)
                        ->orderBy('opciones_respuestas.orden_opcion')->get();

            return view('frontend.homeEncuesta', compact('preguntas','encuesta','opciones','tramites','idEncuesta','idMunicipio','contestado','idUsuario'));
        }
    }

    public function showEncuesta($categoria, $municipio){

        $idCategoria = $categoria;

        $idMunicipio = $municipio;

        $encuestas = encuestas::where('encuestas.id_categoria', '=', $categoria)
                                ->where('encuestas.estado', '=', '1' )->get();

        return view('frontend.showEncuestas', compact('encuestas','idCategoria','idMunicipio'));

    }

    public function storeRespuesta(Request $request){

        $datos = $request->all();

        foreach ($datos['data'] as $dato) {
            // echo $dato['id_pregunta'];

            if($dato['tipo_pregunta'] == 'variasOpciones' || 
                $dato['tipo_pregunta'] == 'casillas'){

                    usuarios_respuestas::create([
                        'id_pregunta' => $dato['id_pregunta'],
                        'id_opcion' => $dato['id_opcion'],
                        'id_usuario' => $dato['id_usuario']
                    ]);

            }
            if($dato['tipo_pregunta'] == 'respuestaCorta' ||
            $dato['tipo_pregunta'] == 'respuestaLarga' ||
            $dato['tipo_pregunta'] == 'buscador'){

                usuarios_respuestas::create([
                    'id_pregunta' => $dato['id_pregunta'],
                    'respuesta_texto' => $dato['respuesta_texto'],
                    'id_usuario' => $dato['id_usuario']
                ]);

            }
        }

        usuarios_encuestas::create([
            'id_usuario' => $datos['idUsuario'],
            'id_encuesta' => $datos['idEncuesta'],
            'id_municipio' => $datos['idMunicipio']
        ]);

        return response()->json('ok');

    }

    public function agradecimiento($id){

        $encuesta = encuestas::where('id', '=', $id)->get();

        if($encuesta[0]->id_categoria == 2){

            $encuestas = encuestas::where('id_categoria','=', '1')
                                    ->where('estado', '=', '1' )->get();
            
        }else{

            $encuestas = encuestas::where('id_categoria','=', '2')
                                    ->where('estado', '=', '1' )->get();

        }

        return view('frontend.agradecimientos', compact('encuesta','encuestas'));

    }
}

