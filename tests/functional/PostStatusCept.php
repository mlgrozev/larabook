<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('I want to post statuses to my profile');

$I->signIn();

$I->amOnPage('statuses');

$I->postAStatus('my first post!');

$I->seeCurrentUrlEquals('/statuses');

$I->see('my first post!');