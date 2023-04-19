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
        $claim = Claim::select('id', 'type', 'description', 'date', 'status', 'submitted_at')->orderByDesc('date')->paginate(10);
        
        return Inertia::render('Employee/Dashboard', [
            'claims' => $claim
        ]);
    }

    public function claimSubmission(ClaimSubmissionRequest $request)
    {
        // Had to transform due Svelte will return null if value is empty string *facepalm*
        Claim::create($request->collect()->transform(function($item, $key) {
            if($key == 'description' && is_null($item)) 
                return '';
            else
                return $item;
        })->only([
            'type', 'date', 'description'
        ])->toArray());

        // TODO: Redirect back
        return redirect('/dashboard/employee');
    }
    
    public function submit()
    {
        $types = ClaimTypeEnum::dropdown();

        return Inertia::render('Employee/Submit', [
            'types' => $types
        ]);
    }

    public function claimResubmit(Claim $claim, ClaimSubmissionRequest $request)
    {
        // Had to transform due Svelte will return null if value is empty string *facepalm*
        $claim->update($request->collect()->transform(function($item, $key) {
            if($key == 'description' && is_null($item)) 
                return '';
            else
                return $item;
        })->only([
            'type', 'date', 'description'
        ])->toArray());

        // TODO: Redirect back
        return redirect('/dashboard/employee');
    }
    
    public function edit(Claim $claim)
    {
        $types = ClaimTypeEnum::dropdown();

        return Inertia::render('Employee/Edit', [
            'claim' => $claim,
            'types' => $types
        ]);
    }
}
