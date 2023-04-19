<?php

use App\Enums\ClaimStatusEnum;
use App\Enums\ClaimTypeEnum;
use App\Models\Claim;
use Carbon\Carbon;

test('Employee able to draft claim', function () {
    $type = collect(ClaimTypeEnum::values())->random();
    $date = Carbon::now()->format('Y-m-d');
    $amount = rand(50,100);

    $response = $this->post('/dashboard/employee/draft', [
        'type' => $type,
        'date' => $date,
        'description' => '',
        'amount' => $amount,
    ]);

    $response->assertRedirect('/dashboard/employee');

    $this->assertDatabaseHas('claims', [
        'type' => $type,
        'date' => $date,
        'amount' => $amount,
        'status' => ClaimStatusEnum::DRAFT->value,
        'submitted_at' => null
    ]);
});

test('Employee able to submit claim', function () {
    $type = collect(ClaimTypeEnum::values())->random();
    $date = Carbon::now()->format('Y-m-d');
    $amount = rand(50,100);

    $response = $this->post('/dashboard/employee/submit', [
        'type' => $type,
        'date' => $date,
        'description' => '',
        'amount' => $amount,
    ]);

    $response->assertRedirect('/dashboard/employee');

    $this->assertDatabaseMissing('claims', [
        'type' => $type,
        'date' => $date,
        'amount' => $amount,
        'status' => ClaimStatusEnum::DRAFT->value,
        'submitted_at' => null
    ]);
});

test('Employee able to redraft claim', function () {
    $claim = Claim::factory()->create([
        'status' => ClaimStatusEnum::DRAFT->value,
        'submitted_at' => null
    ]);
    
    $type = collect(ClaimTypeEnum::values())->random();
    $amount = rand(50,100);

    $response = $this->put('/dashboard/employee/draft/'.$claim->id, [
        'type' => $type,
        'date' => $claim->date,
        'description' => '',
        'amount' => $amount,
    ]);

    $response->assertRedirect('/dashboard/employee');

    $this->assertDatabaseHas('claims', [
        'id' => $claim->id,
        'type' => $type,
        'amount' => $amount,
        'status' => ClaimStatusEnum::DRAFT->value,
        'submitted_at' => null
    ]);
});

test('Employee able to resubmit claim', function () {
    $claim = Claim::factory()->create([
        'status' => ClaimStatusEnum::DRAFT->value,
        'submitted_at' => null
    ]);
    
    $type = collect(ClaimTypeEnum::values())->random();
    $amount = rand(50,100);

    $response = $this->put('/dashboard/employee/submit/'.$claim->id, [
        'type' => $type,
        'date' => $claim->date,
        'description' => '',
        'amount' => $amount,
    ]);

    $response->assertRedirect('/dashboard/employee');

    $this->assertDatabaseMissing('claims', [
        'id' => $claim->id,
        'type' => $type,
        'amount' => $amount,
        'status' => ClaimStatusEnum::DRAFT->value,
        'submitted_at' => null
    ]);
});
