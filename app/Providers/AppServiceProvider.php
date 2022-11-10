<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Training;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Source of the images in project => storage for teachers 
        $StorageSourcePathTeachers ='/storage/images/teachers';
        \View::share('StorageSourcePathTeachers', $StorageSourcePathTeachers);
        
        $StorageSourcePathRooms ='/storage/images/rooms';
        \View::share('StorageSourcePathRooms', $StorageSourcePathRooms);

        $StorageSourcePathBlogs ='/storage/images/blogs';
        \View::share('StorageSourcePathBlogs', $StorageSourcePathBlogs);

        $StorageSourcePathStudents='/storage/images/students';
        \View::share('StorageSourcePathStudents', $StorageSourcePathStudents);
        // sharing for navbar training  and side 

        $StorageSourcePathFeedbacks='/storage/images/feedbacks';
        \View::share('StorageSourcePathFeedbacks', $StorageSourcePathFeedbacks);
        // sharing for navbar training  and side 

        $StorageSourcePathRentals='/storage/images/rentals';
        \View::share('StorageSourcePathRentals', $StorageSourcePathRentals);
        // sharing for navbar training  and side 

        $StorageSourcePathAdmin='/storage/images/admins';
        \View::share('StorageSourcePathAdmin', $StorageSourcePathAdmin);


        // if
        if(Schema::hasTable('trainings')){
            $selectTrainingNavbar     = Training::where('status',true)->get();
             \View::share('selectTrainingNavbar', $selectTrainingNavbar);
        }
        
        // $startTime   = "Juin 28, 2022 12:00:00";
        // \View::share('startTime', $startTime);

    }

}
