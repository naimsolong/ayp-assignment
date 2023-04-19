<?php

use App\Enums\ClaimStatusEnum;
use App\Models\Claim;
use Inertia\Testing\AssertableInertia as Assert;

test('Base page return correct Svelte file', function () {
    $this->get('/')->assertInertia(fn (Assert $page) => $page->component('Base'));
});

test('Employee Dashboard page return correct Svelte file', function () {
    $this->get('/dashboard/employee')->assertInertia(fn (Assert $page) => $page->component('Employee/Dashboard'));
    $this->get('/dashboard/employee/submit')->assertInertia(fn (Assert $page) => $page->component('Employee/Submit'));

    $claim = Claim::factory()->create([
        'status' => ClaimStatusEnum::DRAFT,
        'submitted_at' => null,
    ]);
    $this->get('/dashboard/employee/edit/'.$claim->id)->assertInertia(fn (Assert $page) => $page->component('Employee/Edit'));
});

test('Admin Dashboard page return correct Svelte file', function () {
    $this->get('/dashboard/admin')->assertInertia(fn (Assert $page) => $page->component('Admin/Dashboard'));
});
