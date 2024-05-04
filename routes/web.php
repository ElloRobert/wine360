<?php

use App\Http\Controllers\QrCodeController;

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

/* Sending mail */
Route::get('/sendMail', [
	'as' => 'cron_send_mail',
	'uses' => 'RemindersController@cronSendMail'
]);

Route::group(['middleware' => ['auth', 'locale']], function () {
	Route::get('/home', [
		'as' => 'home',
		'uses' => 'HomeController@index'
	]);

	Route::get('/users', [
		'as' => 'users',
		'uses' => 'HomeController@users'
	]);

	Route::get('/monitoringReminder', [
		'as' => 'monitoring.reminders',
		'uses' => 'HomeController@monitoringReminder'
	]);

	Route::delete('users/{id}', [
        'as' => 'delete.user',
        'uses' => 'UserController@adminDeleteUser'
    ]);

	Route::post('users/Archive/{id}', [
        'as' => 'adminArchiveUser.user',
        'uses' => 'UserController@adminArchiveUser'
    ]);

	Route::post('users/Activate/{id}', [
        'as' => 'adminActivateUser.user',
        'uses' => 'UserController@adminActivateUser'
    ]);

	/**
	 * User
	 */
	Route::group(['prefix' => 'user'], function() {
		/**
	     * Edit any user by admin
	     */
	    Route::post('/admin/edit', [
	        'as' => 'user.details.edit',
	        'uses' => 'UserController@adminEditUser'
	    ]);
	    /**
	     * Edit any user role by admin
	     */
	    Route::post('/admin/{id}/edit/role', [
	    	'as' => 'admin.user.edit.role',
	    	'uses' => 'UserController@adminEditUserRole'
	    ]);

		/**
		 * User image insert
		 */
	    Route::post('/image/edit', [
	        'as' => 'user.image.edit',
	        'uses' => 'UserController@updateUserImage'
	    ]);
	    /**
	     * User image remove
	     */
	    Route::delete('/image/remove', [
	        'as' => 'user.image.remove',
	        'uses' => 'UserController@removeUserImage'
	    ]);

	    /**
	     * Edit auth user details
	     */
	    Route::get('/{id}/edit', [
	        'as' => 'user-settings.edit',
	        'uses' => 'UserController@edit'
	    ]);
	    Route::post('/{id}/edit', [
	        'as' => 'user-settings.update',
	        'uses' => 'UserController@update'
	    ]);
	    Route::delete('/{id}/deleteEmployee', [
            'as' => 'delete.employee',
            'uses' => 'UserController@deleteEmployee'
        ]);
	    Route::post('/{id}/activateEmployee', [
            'as' => 'activate.employee',
            'uses' => 'UserController@activateEmployee'
        ]);

		/**
		 * Register employ
		 */
		Route::post('/registerEmployee', [
			'as' => 'registerEmployee',
			'uses' => 'UserController@insertEmployee'
		]);
	});


	Route::group(['prefix' => 'wines'], function() {
		Route::get('/', [
			'as' => 'wines.index',
			'uses' => 'WineController@index'
		]);

		Route::post('/', [
			'as' => 'wines.store',
			'uses' => 'WineController@store'
		]);

		Route::post('/details', [
			'as' => 'wines.details',
			'uses' => 'WineController@details'
		]);

		Route::post('/{id}', [
			'as' => 'wines.update',
			'uses' => 'WineController@update'
		]);

		Route::get('/product/{wine}', [
			'as' => 'product.page',
			'uses' => 'WineController@product'
		]);

		Route::get('/qr/{wine}', [
			'as' => 'qr',
			'uses' => 'WineController@qr'
		]);

		Route::delete('/{id}', [
			'as' => 'wines.delete',
			'uses' => 'WineController@delete'
		]);

		Route::get('/getVineyards', [
			'as' => 'winery.getVineyards',
			'uses' => 'WineController@getVineyards'
		]);

		Route::get('/getVariety', [
			'as' => 'wine.getVariety',
			'uses' => 'WineController@getVariety'
		]);

		Route::get('/get-wines', [
			'as' => 'getWines',
			'uses' => 'WineController@getWines'
		]);

		Route::get('/archive', [
			'as' => 'wine.archive',
			'uses' => 'WineController@archive'
		]);


	});

	Route::group(['prefix' => 'winery'], function() {
		Route::get('/', [
			'as' => 'winery.index',
			'uses' => 'ConfigurationController@winery'
		]);

		Route::post('/', [
			'as' => 'winery.store',
			'uses' => 'ConfigurationController@wineryStore'
		]);

		Route::post('/details', [
			'as' => 'winery.details',
			'uses' => 'ConfigurationController@details'
		]);

		Route::get('/product/{wine}', [
			'as' => 'winery.product.page',
			'uses' => 'ConfigurationController@product'
		]);

		Route::delete('/{id}', [
			'as' => 'winery.delete',
			'uses' => 'ConfigurationController@delete'
		]);

		Route::get('/qr/{winery}', [
			'as' => 'winery.qr',
			'uses' => 'ConfigurationController@qr'
		]);

		Route::get('/archive', [
			'as' => 'winery.archive',
			'uses' => 'ConfigurationController@archive'
		]);

		Route::get('/get-wineries', [
			'as' => 'getWineries',
			'uses' => 'ConfigurationController@getWineries'
		]);


	});


	Route::group(['prefix' => 'messages'], function() {
		Route::get('/', [
			'as' => 'messages.index',
			'uses' => 'MessageController@index'
		]);

		// Route::post('/details', [
		// 	'as' => 'messages.details',
		// 	'uses' => 'ConfigurationController@details'
		// ]);

		// Route::delete('/{id}', [
		// 	'as' => 'winery.delete',
		// 	'uses' => 'ConfigurationController@delete'
		// ]);

	

		Route::get('/get-messages', [
			'as' => 'getMessages',
			'uses' => 'MessageController@getMessages'
		]);


	});
    
    /**
     * Reminders
     */
    Route::group(['prefix' => 'reminders'], function() {
    	Route::get('/', [
    		'as' => 'reminders.index',
    		'uses' => 'RemindersController@index'
    	]);
    	Route::post('/', [
    		'as' => 'reminders.store',
    		'uses' => 'RemindersController@store'
    	]);
    	Route::get('/edit', [
    		'as' => 'reminders.edit',
    		'uses' => 'RemindersController@edit'
    	]);
		
    	Route::post('/{id}', [
    		'as' => 'reminders.update',
    		'uses' => 'RemindersController@update'
    	]);

    	Route::delete('/{id}', [
    		'as' => 'reminders.delete',
    		'uses' => 'RemindersController@delete'
    	]);

    	/**
		 * Ajax complete reminder
		 */
		Route::get('/complete/{id}', [
			'as' => 'reminders.complete',
			'uses' => 'RemindersController@completeReminder'
		]);
    });

	/**
	 * Configuration
	 */
	Route::group(['prefix' => 'configuration'], function() {
		Route::get('/', [
			'as' => 'configuration',
			'uses' => 'ConfigurationController@index'
		]);
		Route::post('/', [
			'as' => 'configurationUpdate',
			'uses' => 'ConfigurationController@update'
		]);

		Route::get('/subcategory/{id}', [
			'as' => 'configuration.subcategory',
			'uses' => 'VehicleGroupController@subcategory'
		]);

		Route::post('/subcategory/store/{id}', [
			'as' => 'configuration.subcategory.store',
			'uses' => 'VehicleGroupController@store'
		]);

		Route::delete('/subcategory/destroy/{id}', [
			'as' => 'configuration.subcategory.destroy',
			'uses' => 'VehicleGroupController@destroy'
		]);

		/**
		 * Ajax edit configuration name
		 */
	    Route::post('/{id}/name', [
	        'as' => 'configuration.name',
	        'uses' => 'ConfigurationController@updateConfigurationName'
	    ]);
	    /**
		 * Ajax edit configuration image
		 */
	    Route::post('/{id}/image', [
	        'as' => 'configuration.image',
	        'uses' => 'ConfigurationController@updateConfigurationImage'
	    ]);
	    /**
		 * Ajax edit configuration image
		 */
	    Route::delete('/{id}/image/remove', [
	        'as' => 'configuration.image.remove',
	        'uses' => 'ConfigurationController@removeConfigurationImage'
	    ]);
    });


	
	Route::get('/getReminders',[
		'as' => 'getReminders',
		'uses' => 'RemindersController@getReminders'
	]);

	Route:: get('/getReminder',[
		'as' => 'getReminder',
		'uses' => 'RemindersController@getReminder'
	]);

	

	Route::get('/getActiveUsers',[
		'as' => 'getActiveUsers',
		'uses' => 'UserController@getActiveUsers'
	]);
	
	Route::get('/getInactiveUsers',[
		'as' => 'getInactiveUsers',
		'uses' => 'UserController@getInactiveUsers'
	]);

	Route::get('/qrcode', [QrCodeController::class, 'index']);

	Route::get('/path/to/download/qrcode', [QRCodeController::class, 'download']);

	Route::post('/messages', 'MessageController@store')->name('messages.store');

	
});

