<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Brand::class, 'brands');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BrandResource::collection(Brand::select()->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $book = Brand::create([
            'name' => $request->name,
        ]);
        if (Cache::has('brands')) {
            $brands = Cache::get('brands');
        } else {
            $brands = (new BrandResource($book))->response()->setStatusCode(201);
            Cache::put('brands', $brands, 3600);
        }
        return $brands;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        if (Cache::has('brand' . $brand->id)) {
            $brand = Cache::get('brands');
        } else {
            $brandId = $brand->id;
            $brand = (new BrandResource($brand))->response()->setStatusCode(200);
            Cache::put('brand' . $brandId, $brand, 3600);
        }
        return $brand;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $brand->update($request->only(['name']));
        Cache::forget('brands');
        Cache::forget('brand' . $brand->id);
        return new BrandResource($brand);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        Cache::forget('brands');
        Cache::forget('brand' . $brand->id);
        return response()->json(null, 204);
    }
}
