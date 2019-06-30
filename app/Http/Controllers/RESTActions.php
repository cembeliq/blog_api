<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use League\Fractal;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

trait RESTActions {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $fractal;

    public function __construct()
    {
        $this->fractal = new Manager();  
    }


    public function all()
    {
        $m = self::MODEL;
        $transformer = self::TRANSFORMER;
        $paginator = $m::paginate();
        $data = $paginator->getCollection();
        $resource = new Collection($data, new $transformer);
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));
        return $this->fractal->createData($resource)->toArray();
        // return $this->respond(Response::HTTP_OK, $m::all());
    }

    public function get($id)
    {
        $m = self::MODEL;
        $transformer = self::TRANSFORMER;
        $model = $m::find($id);
        if(is_null($model)){
            // return $this->respond(Response::HTTP_NOT_FOUND);
            return $this->customResponse('Item not found!', 404);
        }
        $resource = new Item($model, new $transformer);
        return $this->fractal->createData($resource)->toArray();
        // return $this->respond(Response::HTTP_OK, $model);
    }

    public function add(Request $request)
    {
        $m = self::MODEL;
        $transformer = self::TRANSFORMER;
        $this->validate($request, $m::$rules);
        $model = $m::create($request->all());
        $resource = new Item($model, new $transformer);
        return $this->fractal->createData($resource)->toArray();
        // return $this->respond(Response::HTTP_CREATED, $m::create($request->all()));
    }

    public function put(Request $request, $id)
    {
        $m = self::MODEL;
        $transformer = self::TRANSFORMER;
        $this->validate($request, $m::$rules);
        $model = $m::find($id);
        if(is_null($model)){
            // return $this->respond(Response::HTTP_NOT_FOUND);
            return $this->customResponse('Item not found!', 404);
        }
        $model->update($request->all());
        $resource = new Item($m::find($id), new $transformer); 
        return $this->fractal->createData($resource)->toArray();
        // return $this->respond(Response::HTTP_OK, $model);
    }

    public function remove($id)
    {
        $m = self::MODEL;
        if(is_null($m::find($id))){
            return $this->customResponse('Item not found!', 404);
            // return $this->respond(Response::HTTP_NOT_FOUND);
        }
        //Return 410(done) success response if delete was successful
        if($m::find($id)->delete()){
            return $this->customResponse('Item deleted successfully!', 410);
        }
        //Return error 400 response if delete was not successful
        return $this->errorResponse('Failed to delete item!', 400);
        // return $this->respond(Response::HTTP_NO_CONTENT);
    }

    // protected function respond($status, $data = [])
    // {
    //     return response()->json($data, $status);
    // }

    public function customResponse($message = 'success', $status = 200)
    {
        return response(['status' =>  $status, 'message' => $message], $status);
    }

}
