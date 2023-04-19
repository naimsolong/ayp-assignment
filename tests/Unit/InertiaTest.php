<?php

use Inertia\Testing\AssertableInertia as Assert;

test('Base page return correct Svelte file', function () {
    $this->get('/')->assertInertia(fn (Assert $page) => $page->component('Base'));
});

test('Employee Dashboard page return correct Svelte file', function () {
    $this->get('/dashboard/employee')->assertInertia(fn (Assert $page) => $page->component('Employee/Dashboard'));
});

test('Admin Dashboard page return correct Svelte file', function () {
    $this->get('/dashboard/admin')->assertInertia(fn (Assert $page) => $page->component('Admin/Dashboard'));
});
