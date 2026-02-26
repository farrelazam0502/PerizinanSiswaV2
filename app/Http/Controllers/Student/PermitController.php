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
        return view('pages.student.permits.index', compact('permits'));
    }

    /**
     * Show the form for creating a new permit.
     */
    public function create()
    {
        return view('pages.student.permits.create');
    }

    /**
     * Store a newly created permit in storage.
     */
    public function store(StorePermitRequest $request)
    {
        $request->user()->permits()->create($request->validated());

        return redirect()->route('student.permits.index')->with('success', 'Permohonan izin berhasil diajukan!');
    }

    /**
     * Remove the specified permit from storage.
     */
    public function destroy(Permit $permit)
    {
        // Ensure student only cancels their own pending permit
        if ($permit->user_id !== Auth::id()) {
            abort(403);
        }

        if ($permit->status !== 'pending') {
            return back()->with('error', 'Hanya perizinan yang masih pending yang dapat dibatalkan.');
        }

        $permit->delete();

        return redirect()->route('student.permits.index')->with('success', 'Permohonan izin berhasil dibatalkan.');
    }
}

