<?php

namespace App\Http\Controllers\Api;

use App\Ad;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdRequest;
use App\Http\Requests\APIAdRequest;
use App\Http\Requests\APIAdsRequest;
use App\Http\Resources\AdResource;
use App\Repositories\AdRepository;
use App\Http\Resources\AdsBaseResource;


class AdsController extends Controller
{

    /**
     * @var AdRepository
     */
    protected $repository;

    public function __construct(AdRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @SWG\Get(
     *     path="/ads",
     *     summary="Get list of ads",
     *     tags={"Ads"},
     *     @SWG\Response(
     *         response=200,
     *         description="successful operation",
     *         @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definitions/Ads")
     *         ),
     *     ),
     *     @SWG\Response(
     *         response="401",
     *         description="Unauthorized user",
     *     ),
     * )
     */

    public function index()
    {
        $result = (new AdRepository(new Ad()))->paginate();
        return new AdsBaseResource($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AdRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdRequest $request)
    {
        $ad = Ad::create($request->validated());
        return response($ad->id, 200);
    }

    /**
     * @SWG\Get(
     *     path="/ads/{ad_id}",
     *     summary="Get ad by id",
     *     tags={"Ads"},
     *     description="Get ad by id",
     *     @SWG\Parameter(
     *         name="ad_id",
     *         in="path",
     *         description="Ad id",
     *         required=true,
     *         type="integer",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="successful operation",
     *         @SWG\Schema(ref="#/definitions/Ad"),
     *     ),
     *     @SWG\Response(
     *         response="401",
     *         description="Unauthorized user",
     *     ),
     *     @SWG\Response(
     *         response="404",
     *         description="Ad is not found",
     *     )
     * )
     */
    public function show($id)
    {
        //return new AdRepository($id);
        return Ad::find($id);
    }

}
