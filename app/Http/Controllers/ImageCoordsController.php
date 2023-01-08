<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Resources\ImageCoordsCollection;
use App\Models\ImageCoords;
use Illuminate\Http\Request;

class ImageCoordsController extends Controller
{
    protected $responseHelper;

    public function __construct()
    {
        $this->responseHelper = new ResponseHelper();
    }

    public function store(Request $request)
    {
        if (!$request->file('image')) {
            return $this->responseHelper->payload(['error' => 'Invalid Image'], 401);
        }

        $imageExtension = $request->image->getClientOriginalExtension();
        $imageName = 'image_' . time() . '.' . $imageExtension;

        $request->file('image')->storeAs('uploads', $imageName, 'public');

        ImageCoords::create([
            'user_id' => auth()->user()->id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'unfixed_image' => $imageName,
            'x' => $request->x,
            'y' => $request->y,
            'w' => $request->w,
            'z' => $request->z,
            'pollution_id' => $request->pollution_id,
            'is_auto_uploaded' => $request->is_auto_uploaded
        ]);

        return $this->responseHelper->success();
    }

    public function showUser()
    {
        $images = ImageCoords::whereUserId(auth()->user()->id)->get();

        return new ImageCoordsCollection($images);
    }
}
