<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('search page loads with a query string', function () {
    $response = $this->get('/search?q=hello');

    $response->assertOk();
});
