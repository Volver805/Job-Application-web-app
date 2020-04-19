<?php

    Route::set("index.php",function() {
        Controller::view("home");
    });

    Route::set("records",function() {
        RecordController::index();
    });

    Route::set("manage",function() {
        RecordController::manage();
    });

    Route::set("insert",function() {
        RecordController::add();
    });


    Route::set("update",function() {
        RecordController::update();
    });

    Route::set("destroy",function() {
        RecordController::remove();
    });

    Route::validateUrl();

?>