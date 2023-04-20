<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClaimSubmissionRequest;
use App\Models\Claim;
use App\Services\ClaimService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    public function __construct(
        protected $_service = new ClaimService()
    ) { }

    // Had to transform due Svelte will return null if value is empty string *facepalm*
    protected function transformDraftData(Collection $data)
    {
        return $data->transform(function($item, $key) {
            if($key == 'description' && is_null($item)) 
                return '';
            else
                return $item;
        })->only([
            'type', 'date', 'description', 'amount'
        ])->toArray();
    }

    // Had to transform due Svelte will return null if value is empty string *facepalm*
    protected function transformSubmitData(Collection $data)
    {
        return $data->transform(function($item, $key) {
            if($key == 'description' && is_null($item)) 
                return '';
            else
                return $item;
        })->only([
            'type', 'date', 'description', 'amount'
        ])->merge([
            'submitted_at' => now()
        ])->toArray();
    }

    public function dashboard()
    {
        return Inertia::render('Employee/Dashboard', [
            'claims' => $this->_service->selectModel()->orderByModel(order: 'desc')->paginateModel()
        ]);
    }

    public function claimDrafting(ClaimSubmissionRequest $request)
    {
        $this->_service->createModel($this->transformDraftData($request->collect()));

        // TODO: Redirect back
        return redirect('/dashboard/employee');
    }

    public function claimSubmission(ClaimSubmissionRequest $request)
    {
        $this->_service->createModel($this->transformSubmitData($request->collect()));

        // TODO: Redirect back
        return redirect('/dashboard/employee');
    }
    
    public function submit()
    {
        return Inertia::render('Employee/Submit', [
            'types' => $this->_service->getTypeDropdown()
        ]);
    }

    public function claimRedraft(Claim $claim, ClaimSubmissionRequest $request)
    {
        $this->_service->setModel($claim)->updateModel($this->transformDraftData($request->collect()));

        // TODO: Redirect back
        return redirect('/dashboard/employee');
    }

    public function claimResubmit(Claim $claim, ClaimSubmissionRequest $request)
    {
        $this->_service->setModel($claim)->updateModel($this->transformSubmitData($request->collect()));

        // TODO: Redirect back
        return redirect('/dashboard/employee');
    }
    
    public function edit(Claim $claim)
    {
        return Inertia::render('Employee/Edit', [
            'claim' => $claim,
            'types' => $this->_service->getTypeDropdown()
        ]);
    }
}
