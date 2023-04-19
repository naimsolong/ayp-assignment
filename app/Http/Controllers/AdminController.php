<?php

namespace App\Http\Controllers;

use App\Enums\ClaimStatusEnum;
use App\Models\Claim;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $tab = $request->query('tab', 'all');

        $claim = Claim::select('id', 'type', 'description', 'date', 'amount', 'status', 'submitted_at')->orderByDesc('date');
        
        if($tab == 'draft')
            $claim->whereStatus(ClaimStatusEnum::DRAFT);
            
        if($tab == 'approved')
            $claim->whereStatus(ClaimStatusEnum::APPROVED);
        
        if($tab == 'rejected')
            $claim->whereStatus(ClaimStatusEnum::REJECTED);
            
        return Inertia::render('Admin/Dashboard', [
            'tab' => $tab,
            'claims' => $claim->paginate(10)->appends(['tab' => $tab])
        ]);
    }
    
    public function approval()
    {            
        $claims = Claim::select('id', 'type', 'description', 'date', 'amount', 'status', 'submitted_at')->orderBy('date')->whereStatus(ClaimStatusEnum::DRAFT)->whereNotNull('submitted_at')->get();

        return Inertia::render('Admin/Approval', [
            'claims' => $claims
        ]);
    }

    public function claimApprove(Claim $claim)
    {
        $claim->approved();

        return response()->json([
            'message' => 'ok'
        ]);
    }

    public function claimReject(Claim $claim)
    {
        $claim->rejected();

        return response()->json([
            'message' => 'ok'
        ]);
    }

}
