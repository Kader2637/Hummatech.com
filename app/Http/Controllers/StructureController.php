<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\StructureInterface;
use App\Models\Structure;
use App\Http\Requests\StoreStructureRequest;
use App\Http\Requests\UpdateStructureRequest;
use App\Services\StructureService;

class StructureController extends Controller
{

    private StructureInterface $structure;
    private StructureService $service;

    public function __construct(StructureInterface $structure , StructureService $service)
    {
        $this->structure = $structure;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $structures = $this->structure->get();
        return view('' , compact('structures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStructureRequest $request)
    {
        $data = $this->service->store($request);
        $this->structure->store($data);
        return back()->with('success' , 'Team berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Structure $structure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Structure $structure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStructureRequest $request, Structure $structure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Structure $structure)
    {
        //
    }
}
