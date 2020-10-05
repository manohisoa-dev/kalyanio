<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::resource('category','CategoryController');
    Route::resource('ingredient','IngredientController');
    Route::resource('nourriture','NourritureController');
    Route::resource('nourriture-ingredient','NourritureIngredientController');
    Route::resource('planning','PlanningController');
    Route::resource('sous-category','SousCategoryController');
    Route::resource('statistique','StatistiqueController');
    Route::resource('fournisseur','FournisseurController');
    Route::resource('ingredient-fournisseur','IngredientFournisseurController');
});
