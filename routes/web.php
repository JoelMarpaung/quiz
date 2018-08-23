<?php
Route::get('/', function () {
    return redirect('/home');
});

// Auth::routes();

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');
$this->get('oauth2google', 'Auth\Oauth2Controller@oauth2google')->name('oauth2google');
$this->get('googlecallback', 'Auth\Oauth2Controller@googlecallback')->name('googlecallback');
$this->get('oauth2facebook', 'Auth\Oauth2Controller@oauth2facebook')->name('oauth2facebook');
$this->get('facebookcallback', 'Auth\Oauth2Controller@facebookcallback')->name('facebookcallback');
$this->get('oauth2github', 'Auth\Oauth2Controller@oauth2github')->name('oauth2github');
$this->get('githubcallback', 'Auth\Oauth2Controller@githubcallback')->name('githubcallback');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('auth.password.email');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('tests', 'TestsController');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('user_actions', 'UserActionsController');
    Route::resource('topics', 'TopicsController');
    Route::post('topics_mass_destroy', ['uses' => 'TopicsController@massDestroy', 'as' => 'topics.mass_destroy']);
    Route::resource('questions', 'QuestionsController');
    Route::post('questions_mass_destroy', ['uses' => 'QuestionsController@massDestroy', 'as' => 'questions.mass_destroy']);
    Route::resource('questions_options', 'QuestionsOptionsController');
    Route::post('questions_options_mass_destroy', ['uses' => 'QuestionsOptionsController@massDestroy', 'as' => 'questions_options.mass_destroy']);
    Route::resource('results', 'ResultsController');
    Route::post('results_mass_destroy', ['uses' => 'ResultsController@massDestroy', 'as' => 'results.mass_destroy']);

    // Route::resource('matematika', 'MatematikaController');
    Route::group(['prefix' => 'matematika'], function() {
        Route::get('/', 'MatematikaController@index')->name('matematika.index');
        Route::get('/addquiz', 'MatematikaController@create')->name('matematika.quiz');
        Route::post('/addquiz', 'MatematikaController@store')->name('matematika.store');

        Route::get('/edit/{id}', 'MatematikaController@edit')->name('matematika.edit');
        Route::post('/edit/{id}', 'MatematikaController@update')->name('matematika.update');
        Route::delete('/delete/{id}', 'MatematikaController@destroy')->name('matematika.destroy');
        Route::get('/show/{id}', 'MatematikaController@show')->name('matematika.show');

        Route::get('/addquestion/{id}', 'MatematikaController@createQuestion')->name('matematika.question');
        Route::post('/addquestion/{id}', 'MatematikaController@storeQuestion')->name('matematika.question.store');
        Route::get('/showquestion/{id}', 'MatematikaController@showQuestion')->name('matematika.question.show');
        Route::get('/editquestion/{id}', 'MatematikaController@editQuestion')->name('matematika.question.edit');
        Route::post('/editquestion/{id}', 'MatematikaController@updateQuestion')->name('matematika.question.update');

    });

    Route::group(['prefix' => 'quizmatematika'], function() {
        Route::get('/', 'MatematikaController@quizIndex')->name('quizmatematika.index');
        Route::get('/play/{id}', 'MatematikaController@quizPlay')->name('quizmatematika.play');

    });
});
