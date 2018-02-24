<?php

Route::group(['prefix' => 'siswa'], function() {
    Route::get('demo', 'Bantenprov\Siswa\Http\Controllers\SiswaController@demo');
});
