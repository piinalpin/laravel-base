<?php

namespace App\Http\Controllers\Stuff;

use App\Factory\Stuff\StuffFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Stuff\StuffRequest;
use App\Item\Stuff\StuffItem;
use App\Model\Stuff\Stuff;
use App\Model\Stuff\StuffDetail;
use App\Services\Stuff\StuffService;
use App\Services\Stuff\StuffDetailService;
use App\Utils\ResponseHandler;
use DB;
use Illuminate\Support\Facades\Response;
use JWTAuth;

class StuffController extends Controller
{
    public function getAll()
    {
    	// Get all data here
        $stuffs = StuffService::getAll();
    	$response = array();

    	// Loop all data then parsing on item
        foreach ($stuffs as $stuff) {
            $response[] = new StuffItem($stuff);
        }

    	return Response::json($response, 200);
    }

    public function create(StuffRequest $request)
    {
    	$current = JWTAuth::parseToken()->authenticate();

    	// Create factory here
        $stuff = StuffFactory::factory($request, new Stuff(), $current->id, config('constants.FACTORY.CREATE'));

    	// Save object using SQL Transaction
        DB::beginTransaction();
        try {
            $stuff = StuffService::save($stuff);
            foreach ($request->detail as $detail) {
                StuffDetailService::isExists($stuff->id, $detail['size']);

                $model = new StuffDetail();
                $model->created_by = $current->id;
                $model->stuff_id = $stuff->id;
                $model->size = $detail['size'];
                $model->stock = $detail['stock'];
                StuffDetailService::save($model);
            }
            DB::commit();    
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
    	return Response::json(new StuffItem($stuff), 201);
    }

    public function detail($id)
    {
    	return Response::json(new StuffItem(StuffService::getById($id)), 200);
    }

    public function update(StuffRequest $request, $id)
    {
    	// Find object
        $stuff = StuffService::getById($id);

    	// Update using factory update
        $stuff = StuffFactory::factory($request, $stuff, null, config('constants.FACTORY.UPDATE'));

    	// Save object
        $stuff = StuffService::save($stuff);

    	return Response::json(new StuffItem($stuff), 200);
    }

    public function delete($id)
    {
    	// Find object
        $stuff = StuffService::getById($id);

    	// Delete object
    	StuffService::delete($stuff);
    	return ResponseHandler::ok();
    }

}
