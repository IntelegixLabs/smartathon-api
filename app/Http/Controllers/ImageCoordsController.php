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
        $imageName = 'image_' . time();

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

    public function showAdmin()
    {
        $images = ImageCoords::all();

        return new ImageCoordsCollection($images);
    }

    public function showUser()
    {
        $images = ImageCoords::whereUserId(auth()->user()->id)->get();

        return new ImageCoordsCollection($images);
    }

    public function update(Request $request)
    {
        if (!$request->file('image')) {
            return $this->responseHelper->payload(['error' => 'Invalid Image'], 401);
        }

        $unfixedImage = ImageCoords::where('id', $request->image_id)->first();

        $imageExtension = $request->image->getClientOriginalExtension();
        $imageName =  'fixed_' . $unfixedImage->unfixed_image;

        $request->file('image')->storeAs('uploads', $imageName, 'public');

        ImageCoords::where('id', $request->image_id)->update([
            'is_fixed' => 1,
            'fixed_image' => $imageName,
            'admin_id' => auth()->user()->id
        ]);

        return $this->responseHelper->success();
    }

    public function showImageCoords($image_id)
    {
        $imageCoordsId = $image_id;

        $imageCoords = ImageCoords::where('id', $imageCoordsId)->first();

        return $this->responseHelper->payload([
            'id' => $imageCoords->id,
            'user_name' => $imageCoords->user->full_name,
            'latitude' => $imageCoords->latitude,
            'longitude' => $imageCoords->longitude,
            'unfixed_image' => $imageCoords->unfixed_image,
            'x' => $imageCoords->x,
            'y' => $imageCoords->y,
            'w' => $imageCoords->w,
            'z' => $imageCoords->z,
            'pollution_id' => $imageCoords->pollution_id,
            'type' => $imageCoords->pollution->type,
            'is_fixed' => $imageCoords->is_fixed,
            'fixed_image' => $imageCoords->fixed_image,
            'created_at' => $imageCoords->created_at,
            'updated_at' => $imageCoords->updated_at
        ]);
    }

    public function showAllImageCoords(Request $request)
    {
        $pollution_id = $request->pollution_id;

        $pollution = ImageCoords::where('pollution_id', $pollution_id)->get();

        return new ImageCoordsCollection($pollution);
    }
}
