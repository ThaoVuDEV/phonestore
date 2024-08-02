<?php

namespace App\Http\Controllers;

use App\Services\CapacityService;
use Illuminate\Http\Request;


class CapacityController extends Controller
{
    protected $capacityService;

    public function __construct(CapacityService $capacityService)
    {
        $this->capacityService = $capacityService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $capacities = $this->capacityService->getAllCapacities();
        $title = "List Capacities";
        return view('admin.attributes.capacities.list', compact('capacities', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.attributes.capacities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'value' => 'required|string|max:255',
            
        ]);

        $this->capacityService->createCapacity($validatedData);
        return redirect()->route('capacities.index')->with('success', 'Capacity created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $capacity = $this->capacityService->getCapacityById($id);
        return view('admin.attributes.capacities.edit', compact('capacity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Validate other fields as necessary
        ]);

        $this->capacityService->updateCapacity($id, $validatedData);
        return redirect()->route('capacities.index')->with('success', 'Capacity updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->capacityService->deleteCapacityByID($id);
        return redirect()->route('capacities.index')->with('success', 'Capacity deleted successfully.');
    }
}
