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
    public $successStatus = 200;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $seller = Seller::all();

        return response()->json([
            'success' => $seller],
            $this-> successStatus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @param Seller $seller
     * @param StoreAction $action
     * @return JsonResponse
     */
    public function store(StoreRequest $request, Seller $seller, StoreAction $action)
    {
        return response()->json([
            'message' => 'Seller successfully created.',
            'success' => $action->execute($seller, $request)],
            $this-> successStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param Seller $seller
     * @return JsonResponse
     */
    public function show(Seller $seller)
    {
        return response()->json([
            'success' => $seller],
            $this-> successStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Seller $seller
     * @param UpdateAction $action
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Seller $seller, UpdateAction $action)
    {
        return response()->json([
            'message' => 'Seller successfully updated.',
            'success' => $action->execute($seller, $request)],
            $this-> successStatus);
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

        return response()->json([
            'message' => 'Seller successfully deleted.'],
            $this-> successStatus);
    }
}

