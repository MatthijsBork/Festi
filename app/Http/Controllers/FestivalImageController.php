<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use App\Models\FestivalImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FestivalImageStoreRequest;

class FestivalImageController extends Controller
{
    public function edit(Festival $festival)
    {
        $festival_images = $festival->images()->get();
        return view('dashboard.festivals.editImages', compact('festival', 'festival_images'));
    }

    public function store(FestivalImageStoreRequest $request, Festival $festival)
    {
        foreach ($request->file('images') as $image) {

            $imageName = uniqid() . '_' . time() . '.' . $image->extension();

            $festival_image = new FestivalImage();
            $festival_image->festival_id = $festival->id;
            $festival_image->img = $imageName;
            $festival_image->save();
            $image->storeAs('festivals/' . $festival->id, $imageName);
        }

        return redirect()->back()->with('success', "Foto's geüpload!");
    }

    public function delete(Festival $festival, FestivalImage $image)
    {
        $image->delete();
        Storage::delete('festivals/' . $festival->id . '/' . $image->img);
        return redirect()->back()->with('success', 'Foto verwijderd!');
    }
}
