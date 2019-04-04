<?php

Route::post('{comment}/delete', 'CommentController@destroy')->name('comments.delete');