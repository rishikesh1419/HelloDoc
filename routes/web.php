<?php

Route::get('/', 'DPController@index');

Route::get('/patdash','DPController@patdash');

Route::get('/patpastapt','DPController@patpastapt');

Route::get('/patlogin','DPController@patlogin');

Route::get('/patsignup','DPController@patsignup');

Route::post('/newpat','DPController@newpat');

Route::post('/logincheck','DPController@logincheck');

Route::get('/plogout','DPController@plogout');

Route::post('/drsearch','DPController@drsearch');

Route::get('/searchres','DPController@searchres');

Route::post('/bkint','DPController@bkint');

Route::get('/bkint2','DPController@bkint2');

Route::post('/bkint3','DPController@bkint3');





Route::get('/docsignup','DPController@docsignup');

Route::post('/newdoc','DPController@newdoc');

Route::get('/doclogin','DPController@doclogin');

Route::post('/logincheckd','DPController@logincheckd');

Route::get('/dlogout', 'DPController@dlogout');

Route::get('/docdash','DPController@docdash');

Route::get('/docpastapt','DPController@docpastapt');