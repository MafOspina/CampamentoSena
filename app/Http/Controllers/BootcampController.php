<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;
use App\Http\Requests\StoreBootcampRequest;
//use Illuminate\Support\Facades\Validator;

class BootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //método json: transmite response en formato json
        //parametros json: datos a transmitir , código http del response

        return response()->json( ["success"=> true, "data"=> Bootcamp::all()], 200 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBootcampRequest $request)
    {   
        //crear el nuevo bootcamp
        /*$newBootcamp = new Bootcamp;
        $newBootcamp -> name = $request->name;
        $newBootcamp -> description = $request->description;
        $newBootcamp -> website = $request->website;
        $newBootcamp -> phone = $request->phone;
        $newBootcamp -> average_rating = $request->average_rating;
        $newBootcamp -> average_cost = $request->average_cost;
        $newBootcamp -> user_id = $request->user_id;

        $newBootcamp->save();*/

        //otra forma

        /*VALIDAR DESDE EL CONTROLADOR - segunda opción desde un com´ponente especifico REQUEST
        //1.establecer reglas de validación
        
        
        //crear el ibjetyo validador 
        $v = Validator::make($request->all(), $reglas);


       //validar
       if($v -> fails()){
        // si la vañlidación falla
        return response()->json([ "succes" => false, "error" => $v->errors()], 404);
       }*/

       
        
       return response()->json([ "success" => true, "data" => Bootcamp::create($request->all())], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        return response()->json([ "success" => true, "data"=>Bootcamp::find($id)  ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    
    {   
        $b=Bootcamp::find($id);
        $b->update($request->all());

        return response()->json(["success" => true, "data" => $b], 200 );
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {   $b=Bootcamp::find($id);
        $b->delete();
        return response()->json(["success" => true, "data" => $b], 200);

    }
}
