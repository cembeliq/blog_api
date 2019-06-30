<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Templates;

use League\Fractal;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;



class TemplatesController extends Controller {

    const MODEL = "App\Templates";
    const TRANSFORMER = "App\Transformers\TemplateTransformer";

    use RESTActions;

    function createChecklistsTemplates(Request $request){
    	$data = $request->data;
    	$attributes = $data['attributes'];
    	// var_dump($data); die();
    	$this->validate($request, [
		    'data.attributes.name' => 'required|max:255',
		    'data.attributes.checklist.description' => 'required',
		    'data.attributes.items' => 'required|array',
		    'data.attributes.items.*.description' => 'required|string',

		 ]);


    	try{
    		$transformer = self::TRANSFORMER;
    		$model = Templates::create(['name' => $attributes['name'], 'checklist' => json_encode($attributes['checklist']), 'item' => serialize($attributes['items'])]);
    		$resource = new Item($model, new $transformer);
        return $this->fractal->createData($resource)->toArray();

    	}catch(\Illuminate\Database\Query $e){
    		return response(['status' =>  '500', 'message' => $e->getMessage()], '500');
    	}
    }
}
