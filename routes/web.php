<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\TutorMiddleware;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TutionsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\admin\TutionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\StudyMaterialController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\ContactController;

Route::get('hash', function () {
    dd(Hash::make('12345678'));
});

Route::get('check-user', function () {
    dd(Auth::user()->role);
});

Route::middleware('guest')->group(function () {
    // User Routes
    Route::get('/account/register', [AccountController::class, 'registration'])->name('account.registration');
    Route::post('/account/process-register', [AccountController::class, 'processRegistration'])->name('account.processregistration');
    Route::get('/account/login', [AccountController::class, 'login'])->name('account.login');
    Route::post('/account/authenticate', [AccountController::class, 'authenticate'])->name('account.authenticate');

    // Tutor Routes
    Route::get('/tutor/register', [TutorController::class, 'register'])->name('tutor.register');
    Route::post('/tutor/store', [TutorController::class, 'store'])->name('tutor.store');
});

Route::get('/get-subjects', [TutorController::class, 'getSubjects']);
Route::post('/update-subjects', [TutorController::class, 'update_subjects'])->name('account.update-subjects');


Route::middleware(Authenticate::class)->group(function () {
    Route::get('/account/profile', [AccountController::class, 'profile'])->name('account.profile');
    Route::get('/account/logout', [AccountController::class, 'logout'])->name('account.logout');
    Route::post('account/updateProfile', [AccountController::class, 'updateProfile'])->name('account.updateProfile');
    Route::post('account/update-profile-pic', [AccountController::class, 'updateProfilePic'])->name('account.updateProfilePic');

    // Messages
    Route::get('/messages', [MessageController::class, 'index'])->name('message.index');
    Route::post('/message/send', [MessageController::class, 'store'])->name('message.store');
    Route::post('/message/reply', [MessageController::class, 'reply'])->name('message.reply');
    Route::get('/message/show/{id}', [MessageController::class, 'show'])->name('message.show');
    Route::get('/message/mark-as-read/{id}', [MessageController::class, 'mark_as_read'])->name('message.read');
    Route::get('/message/delete/{id}', [MessageController::class, 'destroy'])->name('message.destroy');

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/mark-as-read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::get('/mark-all-as-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.all-read');
    Route::get('/clear-all-notifications', [NotificationController::class, 'clearAll'])->name('notifications.all-clear');
});

Route::middleware(TutorMiddleware::class)->group(function () {
    Route::get('/tutor/profile', [TutorController::class, 'profile'])->name('tutor.profile');
    Route::get('/tutor/bookings', [BookingController::class, 'bookings'])->name('tutor.booking');
    Route::get('/tutor/tutions', [TutorController::class, 'tutions'])->name('tutor.tution');
    Route::get('/tutor/messages', [TutorController::class, 'messages'])->name('tutor.message');
    Route::get('/tutor/subjects', [TutorController::class, 'subjects'])->name('tutor.subject');
    Route::get('/tutor/subjects/destroy/{id}', [TutorController::class, 'destroySubject'])->name('tutor.subject.destroy');
});


Route::middleware(UserMiddleware::class)->group(function () {
    Route::post('review', [RatingController::class, 'store'])->name('rating.store');
    Route::post('booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/tution/create/{id}', [TutionController::class, 'create'])->name('tution.create');
    Route::post('/tution/store', [TutionController::class, 'store'])->name('tution.store');
    Route::post('/tution/save', [AccountController::class, 'store'])->name('tution.save');
    Route::post('/tution/save', [AccountController::class, 'store'])->name('tution.save');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/study-materials', [StudyMaterialController::class, 'study_materials'])->name('study-materials');
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'afterpayment'])->name('checkout.credit-card');

// Route::get('checkout','App\Http\Controllers\CheckoutController@checkout');
// Route::post('checkout','App\Http\Controllers\CheckoutController@afterpayment')->name('checkout.credit-card');

// tutors
Route::get('/tutors', [TutorController::class, 'tutors'])->name('tutors');
Route::get('/tutor/detail/{id}', [TutorController::class, 'show'])->name('tutor.show');
Route::post('/tutor/search', [TutorController::class, 'search'])->name('tutor.search');
Route::post('/apply-tution', [TutionsController::class, 'applyTution'])->name('applyTution');
Route::post('/save-tution', [TutionsController::class, 'saveTution'])->name('saveTution');

Route::get('/courses', [SubjectController::class, 'courses'])->name('courses');
Route::get('/subjects', [SubjectController::class, 'subjects'])->name('subjects');
Route::get('/about-us', [HomeController::class, 'about_us'])->name('about-us');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/faqs', [HomeController::class, 'faqs'])->name('faqs');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact-messages', [ContactController::class, 'index'])->name('contact.index');
Route::get('/contact/destroy/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
Route::get('/contact/all-delete', [ContactController::class, 'deleteAll'])->name('contact.delete-all');


// tutions
Route::get('/tutions', [TutionsController::class, 'index'])->name('tutions');
Route::get('/account/my-tutions', [AccountController::class, 'myTution'])->name('account.myTution');
Route::get('/account/my-tutions/edit/{tutionId}', [AccountController::class, 'editTution'])->name('account.editTution');
Route::post('/account/update-tution/{tutionId}', [AccountController::class, 'updateJob'])->name('account.updateJob');
Route::post('/account/delete-tution', [AccountController::class, 'deleteTution'])->name('account.deleteTution');
Route::get('/account/my-tution-applications', [AccountController::class, 'myTutionApplications'])->name('account.myTutionApplications');
Route::post('/account/remove-tution-application', [AccountController::class, 'removeTutions'])->name('account.removeTutions');
Route::get('/account/saved-tutions', [AccountController::class, 'saveTutions'])->name('tution.stores');
Route::post('/account/remove-saved-tution', [AccountController::class, 'removeSavedJob'])->name('account.removeSavedJob');
Route::post('/account/update-password', [AccountController::class, 'updatePassword'])->name('account.updatePassword');



//Allroute are well: Thanks God



//admin
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('admin/users/{id}', [UserController::class, 'updateProfile'])->name('admin.updateProfile');
    Route::delete('admin/users/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/tutions', [TutionController::class, 'index'])->name('admin.tutions');
    Route::get('/admin/tutions/edit/{id}', [TutionController::class, 'edit'])->name('admin.tutions.edit');
    Route::post('/admin/tutions/edit/{id}', [TutionController::class, 'update'])->name('admin.tutions.update');

    // tutor
    Route::get('/admin/tutors', [TutorController::class, 'index'])->name('tutor.index');
    Route::get('/admin/tutor/create', [TutorController::class, 'create'])->name('tutor.create');
    Route::post('/admin/tutor/save', [TutorController::class, 'save'])->name('tutor.save');
    Route::get('/admin/tutor/edit/{id}', [TutorController::class, 'edit'])->name('tutor.edit');
    Route::post('/admin/tutor/update/{id}', [TutorController::class, 'update'])->name('tutor.update');
    Route::get('/admin/tutor/approve/{id}', [TutorController::class, 'approve'])->name('tutor.approve');
    Route::get('/admin/tutor/reject/{id}', [TutorController::class, 'reject'])->name('tutor.reject');

    // course
    Route::get('/admin/subjects', [SubjectController::class, 'index'])->name('subject.index');
    Route::get('/admin/subject/create', [SubjectController::class, 'create'])->name('subject.create');
    Route::post('/admin/subject/save', [SubjectController::class, 'save'])->name('subject.save');
    Route::get('/admin/subject/edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit');
    Route::post('/admin/subject/update/{id}', [SubjectController::class, 'update'])->name('subject.update');

    // discipline
    Route::get('/admin/disciplines', [DisciplineController::class, 'index'])->name('discipline.index');
    Route::get('/admin/discipline/create', [DisciplineController::class, 'create'])->name('discipline.create');
    Route::post('/admin/discipline/store', [DisciplineController::class, 'store'])->name('discipline.store');
    Route::get('/admin/discipline/edit/{id}', [DisciplineController::class, 'edit'])->name('discipline.edit');
    Route::post('/admin/discipline/update/{id}', [DisciplineController::class, 'update'])->name('discipline.update');
    Route::get('/admin/discipline/delete/{id}', [DisciplineController::class, 'destroy'])->name('discipline.destroy');

    // discipline
    Route::get('/admin/subjects', [SubjectController::class, 'index'])->name('subject.index');
    Route::get('/admin/subject/create', [SubjectController::class, 'create'])->name('subject.create');
    Route::post('/admin/subject/store', [SubjectController::class, 'store'])->name('subject.store');
    Route::get('/admin/subject/edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit');
    Route::post('/admin/subject/update/{id}', [SubjectController::class, 'update'])->name('subject.update');
    Route::get('/admin/subject/delete/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy');

    // bookings
    Route::get('/admin/bookings', [BookingController::class, 'index'])->name('booking.index');
});
