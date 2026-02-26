<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permit;
use Illuminate\Http\Request;

class PermitController extends Controller
{
    /**
     * Display the admin dashboard with all permits.
     */
    public function index()
    {
        $permits = Permit::with('user')->latest()->get();
        return view('pages.admin.dashboard', compact('permits'));
    }

    /**
     * Update the status of a permit (approve/reject).
     */
    public function updateStatus(Request $request, Permit $permit)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $permit->update($validated);

        return back()->with('success', 'Status perizinan berhasil diperbarui.');
    }
}
