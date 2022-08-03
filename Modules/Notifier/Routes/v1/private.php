<?php

    Route::resource('notifications','NotificationController');
    Route::resource('emails','EmailNotificationController');
    Route::resource('push-notifications','PushNotificationController');
    Route::resource('sms-notifications','SmsNotificationController');

