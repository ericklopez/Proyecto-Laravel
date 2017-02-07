<?php

namespace App\Http\Controllers;
use App\Chocolate;
use Illuminate\Http\Request;

class ChocolateController extends Controller
{

	public function __construct(){
		//
	}

    public function index(){
    	$chocolates = Chocolate::paginate(10);
    	return view('chocolate.index'),['chocolates'=>$chocolates]);
    }

    public function create(){
    	$c = Categoria::all();
    	$chocolate = new Chocolate;
    	return view('pelicula.create',['chocolate'=>$chocolate,'categoria'=>$id]);
    }

    public function store(Request $request){
    	$validate = Validator::make($request->all(),[
    		'nombre' => 'required',
    		'categoria_id' => 'required',
    		'marca' => 'required'
    		]);
    	if ($validate->fails()){
    		return redirect('peliculas/create')->withErrors($validate);
    	}else{
    		$chocolate = Chocolate::create([
    				'nombre' => $request->nombre,
    				'categoria_id' => $request->categoria_id,
    				'marca' => $request->marca
    			]);

    		if($chocolate){
    			return redirect('chocolate');
    		}else{
    			return view('chocolate.create',['errorGuardado'=>'Error al guardar en la base']);
    		}
    	}
    }

    public function edit($id){
    	$chocolate = Chocolate::find($id);
    	$c = Categoria::all();
    	return view('chocolate.edit',['categorias'=>$c,'chocolate'=>$chocolate]) ;
    }

    public function update($id, Request $request){
    	if($chocolate = Chocolate::find($id)){
    		$chocolate->nombre = $request->nombre;
    		$chocolate->categoria_id = $request->categoria_id;
    		$chocolate->maarca = $request->marca;
    		if($chocolate->save()){
    			return redirect('chocolate');
    		}
    	}else{
    		return "Error, no existe ese registro";
    	}
    }

    public function delete($id){
    	if($chocolate = Chocolate::find($id)){
    		$pelicula->delete();
    		return redirect('chocolates');
    	}else{
    		return "Error, no se encontró la película.";
    	}
    }

    public function categoria($id){
    	return view('chocolate.categoria',
    		['categoria'=>Categoria::find($id)]);
    }

    public function search(Request $request){
    	$chocolates = Chocolate::where('nombre','like','%'.$request->busqueda.'%')->paginate(10);
    	$chocolates->setPath('buscar?busqueda='.$request->busqueda);
    	return view('chocolate.index',['chocolate'=>$chocolates]);
    }

}
