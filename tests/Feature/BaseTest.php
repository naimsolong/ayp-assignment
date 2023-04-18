<?php

test('Base app getting 200 response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
