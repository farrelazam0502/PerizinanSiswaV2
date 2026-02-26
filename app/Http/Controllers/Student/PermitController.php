<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Permit;
use App\Http\Requests\StorePermitRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermitController extends Controller
{
    /**
     * Display a listing of the user's permits.
     */
    public function index()
    {
        $permits = Auth::user()->permits()->latest()->get();
        return view('permits.index', compact('permits'));
    }

    /**
     * Show the form for creating a new permit.
     */
    public function create()
    {
        return view('permits.create');
    }

    /**
     * Store a newly created permit in storage.
     */
    public function store(StorePermitRequest $request)
    {
        $request->user()->permits()->create($request->validated());

        return redirect()->route('student.permits.index')->with('success', 'Permohonan izin berhasil diajukan!');
    }
}

