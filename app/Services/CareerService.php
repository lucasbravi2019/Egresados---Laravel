<?php

namespace App\Services;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerService
{

    public function getCareers()
    {
        return Career::all();
    }

    public function create(Request $request)
    {
        $request->validate([
            'career' => ['required', 'string', 'max:255']
        ]);

        Career::create([
            'description' => $request->career
        ]);
    }

    public function findById($id)
    {
        return Career::find($id);
    }

    public function update(Request $request, $id)
    {
        $career = Career::findOrFail($id);
        $request->validate([
            'description' => ['required', 'string', 'max:255']
        ]);

        $career->update($request->only(['description']));
    }

    public function delete($id)
    {
        $career = Career::findOrFail($id);
        $career->delete();
    }

}
