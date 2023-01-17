<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Resources\PollutionsCollection;
use App\Models\ImageCoords;
use App\Models\Pollution;
use Illuminate\Http\Request;

class PollutionController extends Controller
{
    protected $responseHelper;

    public function __construct()
    {
        $this->responseHelper = new ResponseHelper;
    }

    public function index()
    {
        $pollutions = Pollution::get();

        return $this->responseHelper->payload($pollutions);
    }

    public function showPollution($pollution_id)
    {
        $pollution = Pollution::where('id', $pollution_id)->first();

        return $this->responseHelper->payload($pollution);
    }

    public function showAllPollutions()
    {
        $allPollutions = ImageCoords::get();

        return $this->responseHelper->payload($allPollutions);
    }
}
