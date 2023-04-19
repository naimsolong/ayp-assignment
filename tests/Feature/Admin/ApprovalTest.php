<?php

use App\Enums\ClaimStatusEnum;
use App\Models\Claim;

test('Admin able to approve or reject claim', function () {
    $claim = Claim::factory()->create([
        'status' => ClaimStatusEnum::DRAFT,
        'submitted_at' => now()
    ]);

    $response = $this->post('/api/dashboard/admin/claim/'.$claim->id.'/approve');
    $response->assertStatus(200);
    $this->assertDatabaseHas('claims', [
        'id' => $claim->id,
        'status' => ClaimStatusEnum::APPROVED->value,
    ]);
    
    $claim = Claim::factory()->create([
        'status' => ClaimStatusEnum::DRAFT,
        'submitted_at' => now()
    ]);

    $response = $this->post('/api/dashboard/admin/claim/'.$claim->id.'/reject');
    $response->assertStatus(200);
    $this->assertDatabaseHas('claims', [
        'id' => $claim->id,
        'status' => ClaimStatusEnum::REJECTED->value,
    ]);
});
