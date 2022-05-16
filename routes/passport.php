<?php



Route::post("/oauth/token","AccessTokenController@issueToken")->name("passport.token");