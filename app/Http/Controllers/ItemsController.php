<?php namespace App\Http\Controllers;
use App\Items;

class ItemsController extends Controller {

    const MODEL = "App\Items";
    const TRANSFORMER = "App\Transformers\ItemTransformer";

    use RESTActions;

    // function all(){
    // 	$data = [];
    // 	$data = Items::paginate(10);
    // 	$paginator = Items::paginate();
    //     $items = $paginator->getCollection();
    //     $resource = new Collection($products);
    //     $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));
    // 	var_dump($resource); die();
    // 	$res['data'] = $data;
    // 	return response()->json($data); 
    // }

}
