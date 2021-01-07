<?php

namespace App\Http\Controllers\Stuff;

use App\Http\Controllers\Controller;
use App\Item\Stuff\StuffDetailItem;
use App\Model\Stuff\StuffDetail;
use App\Http\Requests\Stuff\StuffDetailRequest;
use App\Services\Stuff\StuffDetailService;
use App\Services\Stuff\StuffService;
use App\Utils\ResponseHandler;
use Illuminate\Support\Facades\Response;
use JWTAuth;

class StuffDetailController extends Controller
{
    public function getAll()
    {
        // Get all data here
        $stuffDetails = StuffDetailService::getAll();

        // Validate stuff
        if (request('stuffId') != null) {
            // Get all data here
            StuffService::getById(request('stuffId'));
            $stuffDetails = StuffDetailService::getAllByStuffId(request('stuffId'));
        }
        
    	$response = array();

    	// Loop all data then parsing on item
        foreach ($stuffDetails as $detail) {
            $response[] = new StuffDetailItem($detail);
        }

    	return Response::json($response, 200);
    }

    public function create(StuffDetailRequest $request)
    {
    	$current = JWTAuth::parseToken()->authenticate();

        // Find stuff
        $stuff = StuffService::getById($request->stuffId);

        // Check duplicate
        StuffDetailService::isExists($stuff->id, $request->size);

    	// Create factory here
        $stuffDetail = new StuffDetail();
        $stuffDetail->created_by = $current->id;
        $stuffDetail->stuff_id = $stuff->id;
        $stuffDetail->size = $request->size;
        $stuffDetail->stock = $request->stock;

    	// Save object
        $stuffDetail = StuffDetailService::save($stuffDetail);

    	return Response::json(new StuffDetailItem($stuffDetail), 201);
    }

    public function detail($id)
    {
    	return Response::json(new StuffDetailItem(StuffDetailService::getById($id)), 200);
    }

    public function update(StuffDetailRequest $request, $detailId)
    {
    	// Find object
        $stuff = StuffService::getById($request->stuffId);

        $stuffDetail = StuffDetailService::getById($detailId);

        // Check duplicate
        StuffDetailService::isExistsIgnoreId($stuff->id, $request->size, $stuffDetail->id);

    	// Update using factory update
        $stuffDetail->size = $request->size;
        $stuffDetail->stock = $request->stock;

    	// Save object
        $stuffDetail = StuffDetailService::save($stuffDetail);

    	return Response::json(new StuffDetailItem($stuffDetail), 200);
    }

    public function delete($stuffId, $id)
    {
    	// Find object
        $stuff = StuffService::getById($stuffId);

        $stuffDetail = StuffDetailService::getById($stuff->id, $id);

    	// Delete object
    	StuffDetailService::delete($stuffDetail);
    	return ResponseHandler::ok();
    }

}
