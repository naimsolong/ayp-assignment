<?php

namespace App\Http\Controllers;

use App\Enums\ClaimStatusEnum;
use App\Models\Claim;
use App\Services\ClaimService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function __construct(
        protected $_service = new ClaimService()
    ) { }

    public function dashboard(Request $request)
    {
        $tab = $request->query('tab', 'all');
            
        return Inertia::render('Admin/Dashboard', [
            'tab' => $tab,
            'claims' => $this->_service->selectModel()->orderByModel(order: 'desc')->filterByStatusModel($tab)->paginateModel(append: ['tab' => $tab])
        ]);
    }
    
    public function approval()
    {
        return Inertia::render('Admin/Approval', [
            'claims' => $this->_service->selectModel()->orderByModel()->filterByStatusModel('draft')->filterNotNullModel('submitted_at')->getModel()
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
