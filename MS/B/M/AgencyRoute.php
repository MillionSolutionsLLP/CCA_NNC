<?php



Route::prefix('APanel')->group(function () { \MS\Core\Helper\Comman::loadRoute('APanel',true,''); });

Route::prefix('ATMS')->group(function () { \MS\Core\Helper\Comman::loadRoute('ATMS',true,''); });