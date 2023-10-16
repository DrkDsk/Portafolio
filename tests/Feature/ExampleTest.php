<?php
/*
it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});*/

it('can return the sum of two number', function (){
    $sum = 5 + 2;
    $this->assertEquals($sum, 7);
});
