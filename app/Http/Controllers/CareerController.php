<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CareerService;
use Illuminate\Http\Request;

class CareerController extends Controller
{

    private $careerService;

    public function __construct(CareerService $careerService)
    {
        $this->careerService = $careerService;
    }

    public function showCareers()
    {
        $careers = $this->careerService->getCareers();
        return view('career', compact('careers'));
    }

    public function create()
    {
        return view('career.create');
    }

    public function storeNewCareer(Request $request)
    {
        $this->careerService->create($request);
        return redirect('career');
    }

    public function edit($id)
    {
        $career = $this->careerService->findById($id);
        return view('career.edit', ['career' => $career]);
    }

    public function update(Request $request, $id)
    {
        $this->careerService->update($request, $id);
        return redirect('career')->with('success', 'Carrera actualizada con éxito');
    }

    public function destroy($id)
    {
        $this->careerService->delete($id);
        return redirect('career')->with('success', 'Carrera borrada con éxito');
    }

}
