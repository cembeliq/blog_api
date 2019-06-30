<?php namespace App\Http\Controllers;

use App\Checklists;

class ChecklistsController extends Controller {

    const MODEL = "App\Checklists";
    const TRANSFORMER = "App\Transformers\ChecklistTransformer";
    use RESTActions{
    	all as protected getAll;
    };

    function all(){
    	$data = [];
		$data['type'] = "checklists";
		$data['id'] = 1;
		$data['attributes'] = Checklists::where('object_id', $id)->get();
		$data['links'] = ["self" => "https://dev-kong.command-api.kw.com/checklists/50127"];
      
		$res['data'] = $data;
		return response()->json($res);
    }
	// function get($id){
	// 	$data = [];
	// 	$data['type'] = "checklists";
	// 	$data['id'] = 1;
	// 	$data['attributes'] = Checklists::where('object_id', $id)->get();
	// 	$data['links'] = ["self" => "https://dev-kong.command-api.kw.com/checklists/50127"];
      
	// 	$res['data'] = $data;
	// 	return response()->json($res);
	// }
}
