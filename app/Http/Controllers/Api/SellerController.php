<?php

namespace App\Http\Controllers\Api;

use App\Actions\Sellers\StoreAction;
use App\Actions\Sellers\UpdateAction;
use App\Http\Requests\Seller\StoreRequest;
use App\Http\Requests\Seller\UpdateRequest;
use App\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Seller[]|Collection
     */
    public function index()
    {
        return Seller::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @param Seller $seller
     * @param StoreAction $action
     * @return Response
     */
    public function store(StoreRequest $request, Seller $seller, StoreAction $action)
    {
        return $action->execute($seller, $request);
    }

    /**
     * Display the specified resource.
     *
     * @param Seller $seller
     * @return Seller
     */
    public function show(Seller $seller)
    {
        return $seller;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Seller $seller
     * @param UpdateAction $action
     * @return Response
     */
    public function update(UpdateRequest $request, Seller $seller, UpdateAction $action)
    {
        return $action->execute($seller, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Seller $seller
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Seller $seller)
    {
        $seller->delete();

        return response()->json(__('The seller has been removed'));
    }
}

