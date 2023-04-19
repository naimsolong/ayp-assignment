<?php

namespace App\Http\Controllers;

use App\Enums\ClaimTypeEnum;
use App\Http\Requests\ClaimSubmissionRequest;
use App\Models\Claim;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    public function dashboard()
    {
        $claim = Claim::select('id', 'type', 'description', 'date', 'status', 'submitted_at')->orderByDesc('date')->paginate(5);
        
        return Inertia::render('Employee/Dashboard', [
            'claims' => $claim
        ]);
    }

    public function claimSubmission(ClaimSubmissionRequest $request)
    {
        Claim::create($request->only([
            'type', 'date', 'description'
        ]));

        return redirect('/dashboard/employee');
    }
    
    public function submit()
    {
        $types = ClaimTypeEnum::dropdown();

        return Inertia::render('Employee/Submit', [
            'types' => $types
        ]);
    }
}
