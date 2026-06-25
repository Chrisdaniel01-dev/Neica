<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| IMPORT CONTROLLERS
|--------------------------------------------------------------------------
| We separate Public and Admin controllers to avoid conflicts
*/

use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ProjectController as PublicProjectController;
use App\Http\Controllers\Public\PostController as PublicPostController;
use App\Http\Controllers\Public\DonationController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\VolunteerController;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\VolunteerController as AdminVolunteerController;


/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (FRONTEND)
|--------------------------------------------------------------------------
| These routes are accessible to everyone (visitors)
| They correspond to your NGO pages (from your project structure)
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
// Homepage: shows latest projects + posts

Route::get('/about', function () {
    return view('about');
})->name('about');
// Static page (no logic needed for now)

Route::get('/projects', [PublicProjectController::class, 'index'])->name('projects.index');
// List all projects (from database)

Route::get('/projects/{project}', [PublicProjectController::class, 'show'])->name('projects.show');
// Show single project details

Route::get('/blog', [PublicPostController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [PublicPostController::class, 'show'])->name('blog.show');
// Blog / news page

Route::get('/donate', [DonationController::class, 'create'])->name('donate.create');
// Donation form

Route::post('/donate', [DonationController::class, 'store'])->name('donate.store');
// Handle donation submission

Route::post('/volunteer', [VolunteerController::class, 'store'])->name('volunteer.store');
// Volunteer submission


Route::view('/become-volunteer', 'volunteer')->name('volunteer.page');

    
Route::get('/contact', function () {return view('contact');})->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
// Handle contact form submission

// Login route - redirects unauthenticated users to admin login
// This is required by Laravel's default authentication middleware
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');




/*
|--------------------------------------------------------------------------
| ADMIN AUTH ROUTES
|--------------------------------------------------------------------------
| These routes handle admin login/logout
| No middleware here (user must access login page)
*/

Route::prefix('admin')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');
    // Show login form

    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');
    // Handle login

    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    // Logout admin
});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (PROTECTED)
|--------------------------------------------------------------------------
| These routes require authentication + admin role
| All admin features go here
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin']) // VERY IMPORTANT SECURITY
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Admin main panel (stats, overview)


        /*
        |--------------------------------------------------------------------------
        | PROJECT MANAGEMENT (FULL CRUD)
        |--------------------------------------------------------------------------
        | resource() automatically creates:
        | index, create, store, show, edit, update, destroy
        */
        Route::resource('projects', AdminProjectController::class);
        Route::delete('/projects/{project}/volunteers/{volunteer}',[AdminProjectController::class, 'removeVolunteer'])->name('projects.remove-volunteer');



        /*
        |--------------------------------------------------------------------------
        | BLOG MANAGEMENT
        |--------------------------------------------------------------------------
        */
        Route::resource('posts', AdminPostController::class);


        /*
        |--------------------------------------------------------------------------
        | DONATIONS
        |--------------------------------------------------------------------------
        | View all donations (no create here, handled by public side)
        */
        Route::get('/donations', [DonationController::class, 'index'])->name('donations.index');


        /*
        |--------------------------------------------------------------------------
        | VOLUNTEERS
        |--------------------------------------------------------------------------
        */
        Route::get('/volunteers', [AdminVolunteerController::class, 'index'])->name('volunteers.index');
        Route::get('/volunteers/{volunteer}', [AdminVolunteerController::class, 'show'])->name('volunteers.show');
        Route::get('/volunteers/{volunteer}/edit', [AdminVolunteerController::class, 'edit'])->name('volunteers.edit');
        Route::put('/volunteers/{volunteer}', [AdminVolunteerController::class, 'update'])->name('volunteers.update');
        Route::delete('/volunteers/{volunteer}', [AdminVolunteerController::class, 'destroy'])->name('volunteers.destroy');
        Route::patch('/volunteers/{volunteer}/approve', [AdminVolunteerController::class, 'approve'])->name('volunteers.approve');
        Route::patch('/volunteers/{volunteer}/reject',[AdminVolunteerController::class, 'reject'])->name('volunteers.reject');
        Route::get('/volunteers/{volunteer}/assign-project',[AdminVolunteerController::class, 'showAssignProjectForm'])->name('volunteers.assign-project');
        Route::post('/volunteers/{volunteer}/assign-project',[AdminVolunteerController::class, 'assignProject'])->name('volunteers.assign-project.store');

        /*
        |--------------------------------------------------------------------------
        | CONTACT MESSAGES
        |--------------------------------------------------------------------------
        */
        Route::get('/messages', [ContactController::class, 'index'])->name('messages.index');
        Route::get('/messages/{message}',[ContactController::class, 'show'])->name('messages.show');
        Route::delete('/messages/{message}',[ContactController::class, 'destroy'])->name('messages.destroy');
        Route::patch('/messages/{message}/read',[ContactController::class, 'markAsRead'])->name('messages.read');


        /*
        |--------------------------------------------------------------------------
        | SETTINGS
        |--------------------------------------------------------------------------
        */
        Route::get('/settings', function () {
            return view('admin.settings.index');
        })->name('settings.index');

    });