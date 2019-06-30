<?php namespace App\Http\Controllers;
use App\Items;

use League\Fractal;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class ItemsController extends Controller {

    const MODEL = "App\Items";
    const TRANSFORMER = "App\Transformers\ItemTransformer";

    use RESTActions;

    function all(){
        $transformer = self::TRANSFORMER;
        $paginator = Items::paginate();

        $data = $paginator->getCollection();
        $resource = new Collection($data, new $transformer);
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));
        return $this->fractal->createData($resource)->toArray();
    }
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
