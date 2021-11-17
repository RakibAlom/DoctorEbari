<?php

use App\Http\Controllers\AmbulanceController;
use App\Http\Controllers\AppoinmentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DiagnosticController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PostcategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SocialorganizeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\UpzilaController;
use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\Front\PublicController;
use App\Http\Controllers\Front\PublicActionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [HomeController::class,'index'])->name('home');

Route::post('/store-appointment', [AppoinmentController::class,'store'])->name('store.appointment');
Route::get('get/department/{department}',[AppoinmentController::class,'getDepartment']);
Auth::routes();

Route::get('/logout',[HomeController::class,'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [HomeController::class,'admin'])->name('admin.dashboard');

    //DEPARTMENT ROUTE ARE HERE
    Route::get('/department-list', [DepartmentController::class,'index'])->name('list.department');
    Route::get('/department-create', [DepartmentController::class,'create'])->name('create.department');
    Route::post('/store-department', [DepartmentController::class,'store'])->name('store.department');
    Route::get('/edit-department/{department}', [DepartmentController::class,'edit'])->name('edit.department');
    Route::post('/update-department/{department}', [DepartmentController::class,'update'])->name('update.department');
    Route::get('/active-department/{department}', [DepartmentController::class,'active'])->name('active.department');
    Route::get('/deactive-department/{department}', [DepartmentController::class,'deactive'])->name('deactive.department');
    Route::get('/delete-department/{department}', [DepartmentController::class,'delete'])->name('delete.department');

    //DOCTOR ROUTE ARE HERE
    Route::get('/doctor-list', [DoctorController::class,'index'])->name('list.doctor');
    Route::get('/active-doctor-list', [DoctorController::class,'activeList'])->name('active.list.doctor');
    Route::get('/deactive-doctor-list', [DoctorController::class,'deactiveList'])->name('deactive.list.doctor');
    Route::get('/new-doctor', [DoctorController::class,'create'])->name('new.doctor');
    Route::post('/store-doctor', [DoctorController::class,'store'])->name('store.doctor');
    Route::get('/edit-doctor/{doctor}', [DoctorController::class,'edit'])->name('edit.doctor');
    Route::post('/update-doctor/{doctor}', [DoctorController::class,'update'])->name('update.doctor');
    Route::get('/active-doctor/{doctor}', [DoctorController::class,'active'])->name('active.doctor');
    Route::get('/home-active-doctor/{doctor}', [DoctorController::class,'homeactive'])->name('homeactive.doctor');
    Route::get('/deactive-doctor/{doctor}', [DoctorController::class,'deactive'])->name('deactive.doctor');
    Route::get('/home-deactive-doctor/{doctor}', [DoctorController::class,'homedeactive'])->name('homedeactive.doctor');
    Route::get('/delete-doctor/{doctor}', [DoctorController::class,'delete'])->name('delete.doctor');

    //HOSPTIAL ROUTE ARE HERE
    Route::get('/hospital-list', [HospitalController::class,'index'])->name('list.hospital');
    Route::get('/active-hospital-list', [HospitalController::class,'activeList'])->name('active.list.hospital');
    Route::get('/deactive-hospital-list', [HospitalController::class,'deactiveList'])->name('deactive.list.hospital');
    Route::get('/new-hospital', [HospitalController::class,'create'])->name('new.hospital');
    Route::post('/store-hospital', [HospitalController::class,'store'])->name('store.hospital');
    Route::get('/edit-hospital/{hospital}', [HospitalController::class,'edit'])->name('edit.hospital');
    Route::post('/update-hospital/{hospital}', [HospitalController::class,'update'])->name('update.hospital');
    Route::get('/active-hospital/{hospital}', [HospitalController::class,'active'])->name('active.hospital');
    Route::get('/deactive-hospital/{hospital}', [HospitalController::class,'deactive'])->name('deactive.hospital');
    Route::get('/delete-hospital/{hospital}', [HospitalController::class,'delete'])->name('delete.hospital');

    //DIAGNOSTIC ROUTE ARE HERE
    Route::get('/diagnostic-list', [DiagnosticController::class,'index'])->name('list.diagnostic');
    Route::get('/active-diagnostic-list', [DiagnosticController::class,'activeList'])->name('active.list.diagnostic');
    Route::get('/deactive-diagnostic-list', [DiagnosticController::class,'deactiveList'])->name('deactive.list.diagnostic');
    Route::get('/new-diagnostic', [DiagnosticController::class,'create'])->name('new.diagnostic');
    Route::post('/store-diagnostic', [DiagnosticController::class,'store'])->name('store.diagnostic');
    Route::get('/edit-diagnostic/{diagnostic}', [DiagnosticController::class,'edit'])->name('edit.diagnostic');
    Route::post('/update-diagnostic/{diagnostic}', [DiagnosticController::class,'update'])->name('update.diagnostic');
    Route::get('/active-diagnostic/{diagnostic}', [DiagnosticController::class,'active'])->name('active.diagnostic');
    Route::get('/deactive-diagnostic/{diagnostic}', [DiagnosticController::class,'deactive'])->name('deactive.diagnostic');
    Route::get('/delete-diagnostic/{diagnostic}', [DiagnosticController::class,'delete'])->name('delete.diagnostic');

    //AMBULANCE ROUTE ARE HERE
    Route::get('/ambulance-list', [AmbulanceController::class,'index'])->name('list.ambulance');
    Route::get('/active-ambulance-list', [AmbulanceController::class,'activeList'])->name('active.list.ambulance');
    Route::get('/deactive-ambulance-list', [AmbulanceController::class,'deactiveList'])->name('deactive.list.ambulance');
    Route::get('/new-ambulance', [AmbulanceController::class,'create'])->name('new.ambulance');
    Route::post('/store-ambulance', [AmbulanceController::class,'store'])->name('store.ambulance');
    Route::get('/edit-ambulance/{ambulance}', [AmbulanceController::class,'edit'])->name('edit.ambulance');
    Route::post('/update-ambulance/{ambulance}', [AmbulanceController::class,'update'])->name('update.ambulance');
    Route::get('/active-ambulance/{ambulance}', [AmbulanceController::class,'active'])->name('active.ambulance');
    Route::get('/deactive-ambulance/{ambulance}', [AmbulanceController::class,'deactive'])->name('deactive.ambulance');
    Route::get('/delete-ambulance/{ambulance}', [AmbulanceController::class,'delete'])->name('delete.ambulance');

    //SOCIAL ORGANIZE ROUTE ARE HERE
    Route::get('/social-organize-list', [SocialorganizeController::class,'index'])->name('list.social');
    Route::get('/active-social-organize-list', [SocialorganizeController::class,'activeList'])->name('active.list.social');
    Route::get('/deactive-social-organize-list', [SocialorganizeController::class,'deactiveList'])->name('deactive.list.social');
    Route::get('/new-social-organize', [SocialorganizeController::class,'create'])->name('new.social');
    Route::post('/store-social', [SocialorganizeController::class,'store'])->name('store.social');
    Route::get('/edit-social-organize/{social}', [SocialorganizeController::class,'edit'])->name('edit.social');
    Route::post('/update-social/{social}', [SocialorganizeController::class,'update'])->name('update.social');
    Route::get('/active-social/{social}', [SocialorganizeController::class,'active'])->name('active.social');
    Route::get('/deactive-social/{social}', [SocialorganizeController::class,'deactive'])->name('deactive.social');
    Route::get('/delete-social/{social}', [SocialorganizeController::class,'delete'])->name('delete.social');

    // OUR SHOP ROUTE ARE HERE
    Route::get('/product-list', [ShopController::class,'index'])->name('list.product');
    Route::get('/product-grid', [ShopController::class,'grid'])->name('grid.product');
    Route::get('/active-product-list', [ShopController::class,'activeList'])->name('active.list.product');
    Route::get('/deactive-product-list', [ShopController::class,'deactiveList'])->name('deactive.list.product');
    Route::get('/new-product', [ShopController::class,'create'])->name('new.product');
    Route::post('/store-product', [ShopController::class,'store'])->name('store.product');
    Route::get('/edit-product/{product}', [ShopController::class,'edit'])->name('edit.product');
    Route::post('/update-product/{product}', [ShopController::class,'update'])->name('update.product');
    Route::get('/active-product/{product}', [ShopController::class,'active'])->name('active.product');
    Route::get('/deactive-product/{product}', [ShopController::class,'deactive'])->name('deactive.product');
    Route::get('/delete-product/{product}', [ShopController::class,'delete'])->name('delete.product');
    Route::get('/product/{slug}', [ShopController::class,'show'])->name('show.product');

    //SETTING ROUTE ARE HERE
    Route::get('setting', [SettingController::class,'index'])->name('setting');
    Route::post('setting-store',[SettingController::class,'store'])->name('store.setting');
    Route::post('setting-update',[SettingController::class,'update'])->name('update.setting');

    //ClIENT REVIEW ROUTE ARE HERE
    Route::get('/client-list', [ClientController::class,'index'])->name('list.client');
    Route::get('/active-client-list', [ClientController::class,'activeList'])->name('active.list.client');
    Route::get('/deactive-client-list', [ClientController::class,'deactiveList'])->name('deactive.list.client');
    Route::get('/new-client', [ClientController::class,'create'])->name('new.client');
    Route::post('/store-client', [ClientController::class,'store'])->name('store.client');
    Route::get('/edit-client/{client}', [ClientController::class,'edit'])->name('edit.client');
    Route::post('/update-client/{client}', [ClientController::class,'update'])->name('update.client');
    Route::get('/active-client/{client}', [ClientController::class,'active'])->name('active.client');
    Route::get('/deactive-client/{client}', [ClientController::class,'deactive'])->name('deactive.client');
    Route::get('/delete-client/{client}', [ClientController::class,'delete'])->name('delete.client');

    //GALLERY ROUTE ARE HERE
    Route::get('/gallery-list', [GalleryController::class,'index'])->name('list.gallery');
    Route::get('/active-gallery-list', [GalleryController::class,'activeList'])->name('active.list.gallery');
    Route::get('/deactive-gallery-list', [GalleryController::class,'deactiveList'])->name('deactive.list.gallery');
    Route::get('/new-gallery', [GalleryController::class,'create'])->name('new.gallery');
    Route::post('/store-gallery', [GalleryController::class,'store'])->name('store.gallery');
    Route::get('/edit-gallery/{gallery}', [GalleryController::class,'edit'])->name('edit.gallery');
    Route::post('/update-gallery/{gallery}', [GalleryController::class,'update'])->name('update.gallery');
    Route::get('/active-gallery/{gallery}', [GalleryController::class,'active'])->name('active.gallery');
    Route::get('/deactive-gallery/{gallery}', [GalleryController::class,'deactive'])->name('deactive.gallery');
    Route::get('/delete-gallery/{gallery}', [GalleryController::class,'delete'])->name('delete.gallery');

    //BLOG POST CATEGORY ROUTE ARE HERE
    Route::get('/category-list', [PostcategoryController::class,'index'])->name('list.category');
    Route::post('/store-category', [PostcategoryController::class,'store'])->name('store.category');
    Route::get('/edit-category/{category}', [PostcategoryController::class,'edit'])->name('edit.category');
    Route::post('/update-category/{category}', [PostcategoryController::class,'update'])->name('update.category');
    Route::get('/active-category/{category}', [PostcategoryController::class,'active'])->name('active.category');
    Route::get('/deactive-category/{category}', [PostcategoryController::class,'deactive'])->name('deactive.category');
    Route::get('/delete-category/{category}', [PostcategoryController::class,'delete'])->name('delete.category');

    //BLOG POST ROUTE ARE HERE
    Route::get('/post-list', [PostController::class,'index'])->name('list.post');
    Route::get('/post-grid', [PostController::class,'grid'])->name('grid.post');
    Route::get('/active-post-list', [PostController::class,'activeList'])->name('active.list.post');
    Route::get('/deactive-post-list', [PostController::class,'deactiveList'])->name('deactive.list.post');
    Route::get('/new-post', [PostController::class,'create'])->name('new.post');
    Route::post('/store-post', [PostController::class,'store'])->name('store.post');
    Route::get('/edit-post/{post}', [PostController::class,'edit'])->name('edit.post');
    Route::post('/update-post/{post}', [PostController::class,'update'])->name('update.post');
    Route::get('/active-post/{post}', [PostController::class,'active'])->name('active.post');
    Route::get('/deactive-post/{post}', [PostController::class,'deactive'])->name('deactive.post');
    Route::get('/delete-post/{post}', [PostController::class,'delete'])->name('delete.post');
    Route::get('/post/{slug}', [PostController::class,'show'])->name('show.post');

    //BOOKING APPOINT ROUTE ARE HERE
    Route::get('/appointment-list', [AppoinmentController::class,'index'])->name('list.appointment');
    Route::get('/confirm-appointment-list', [AppoinmentController::class,'confirmList'])->name('confirm.list.appointment');
    Route::get('/pending-appointment-list', [AppoinmentController::class,'pendingList'])->name('pending.list.appointment');
    Route::get('/current-month-appointment-list', [AppoinmentController::class,'currentMonth'])->name('currentmonth.list.appointment');
    Route::get('/yearly-appointment-list', [AppoinmentController::class,'yearly'])->name('yearly.list.appointment');
    Route::get('/new-appointment', [AppoinmentController::class,'create'])->name('new.appointment');

    Route::get('/edit-appointment/{appointment}', [AppoinmentController::class,'edit'])->name('edit.appointment');
    Route::post('/update-appointment/{appointment}', [AppoinmentController::class,'update'])->name('update.appointment');
    Route::get('/active-appointment/{appointment}', [AppoinmentController::class,'active'])->name('active.appointment');
    Route::get('/deactive-appointment/{appointment}', [AppoinmentController::class,'deactive'])->name('deactive.appointment');
    Route::get('/delete-appointment/{appointment}', [AppoinmentController::class,'delete'])->name('delete.appointment');

    //SLIDER ROUTE ARE HERE
    Route::get('/slider-list', [SliderController::class,'index'])->name('list.slider');
    Route::get('/new-slider', [SliderController::class,'create'])->name('new.slider');
    Route::post('/store-slider', [SliderController::class,'store'])->name('store.slider');
    Route::get('/edit-slider/{slider}', [SliderController::class,'edit'])->name('edit.slider');
    Route::post('/update-slider/{slider}', [SliderController::class,'update'])->name('update.slider');
    Route::get('/active-slider/{slider}', [SliderController::class,'active'])->name('active.slider');
    Route::get('/deactive-slider/{slider}', [SliderController::class,'deactive'])->name('deactive.slider');
    Route::get('/delete-slider/{slider}', [SliderController::class,'delete'])->name('delete.slider');

    //STAFF ROUTE ARE HERE
    Route::get('/staff-list', [StaffController::class,'index'])->name('list.staff');
    Route::get('/active-staff-list', [StaffController::class,'activeList'])->name('active.list.staff');
    Route::get('/deactive-staff-list', [StaffController::class,'deactiveList'])->name('deactive.list.staff');
    Route::get('/new-staff', [StaffController::class,'create'])->name('new.staff');
    Route::post('/store-staff', [StaffController::class,'store'])->name('store.staff');
    Route::get('/edit-staff/{staff}', [StaffController::class,'edit'])->name('edit.staff');
    Route::post('/update-staff/{staff}', [StaffController::class,'update'])->name('update.staff');
    Route::get('/active-staff/{staff}', [StaffController::class,'active'])->name('active.staff');
    Route::get('/deactive-staff/{staff}', [StaffController::class,'deactive'])->name('deactive.staff');
    Route::get('/delete-staff/{staff}', [StaffController::class,'delete'])->name('delete.staff');
    Route::get('/messages', [SettingController::class,'messages'])->name('messages');


    
    //DIVISION ROUTE ARE HERE
    Route::get('/division-list', [DivisionController::class,'index'])->name('list.division');
    Route::get('/division-create', [DivisionController::class,'create'])->name('create.division');
    Route::post('/store-division', [DivisionController::class,'store'])->name('store.division');
    Route::get('/edit-division/{division}', [DivisionController::class,'edit'])->name('edit.division');
    Route::post('/update-division/{division}', [DivisionController::class,'update'])->name('update.division');
    Route::get('/delete-division/{division}', [DivisionController::class,'delete'])->name('delete.division');
    
    
    
    //DISTRICT ROUTE ARE HERE
    Route::get('/district-list', [DistrictController::class,'index'])->name('list.district');
    Route::get('/district-create', [DistrictController::class,'create'])->name('create.district');
    Route::post('/store-district', [DistrictController::class,'store'])->name('store.district');
    Route::get('/edit-district/{district}', [DistrictController::class,'edit'])->name('edit.district');
    Route::post('/update-district/{district}', [DistrictController::class,'update'])->name('update.district');
    Route::get('/delete-district/{district}', [DistrictController::class,'delete'])->name('delete.district');

    //upzila routes are here
    Route::get('/upzila-list', [UpzilaController::class,'index'])->name('list.upzila');
    Route::get('/upzila-create', [UpzilaController::class,'create'])->name('create.upzila');
    Route::post('/store-upzila', [UpzilaController::class,'store'])->name('store.upzila');
    Route::get('/edit-upzila/{upzila}', [UpzilaController::class,'edit'])->name('edit.upzila');
    Route::post('/update-upzila/{upzila}', [UpzilaController::class,'update'])->name('update.upzila');
    Route::get('/delete-upzila/{upzila}', [DistrictController::class,'delete'])->name('delete.upzila');


    //ADVERTISE ROUTE ARE HERE
    Route::get('/advertise-list', [AdvertiseController::class,'index'])->name('list.advertise');
    Route::get('/active-advertise-list', [AdvertiseController::class,'activeList'])->name('active.list.advertise');
    Route::get('/deactive-advertise-list', [AdvertiseController::class,'deactiveList'])->name('deactive.list.advertise');
    Route::get('/new-advertise', [AdvertiseController::class,'create'])->name('new.advertise');
    Route::post('/store-advertise', [AdvertiseController::class,'store'])->name('store.advertise');
    Route::get('/edit-advertise/{advertise}', [AdvertiseController::class,'edit'])->name('edit.advertise');
    Route::post('/update-advertise/{advertise}', [AdvertiseController::class,'update'])->name('update.advertise');
    Route::get('/active-advertise/{advertise}', [AdvertiseController::class,'active'])->name('active.advertise');
    Route::get('/deactive-advertise/{advertise}', [AdvertiseController::class,'deactive'])->name('deactive.advertise');
    Route::get('/delete-advertise/{advertise}', [AdvertiseController::class,'delete'])->name('delete.advertise');

    //user info change
    Route::get('/admin/add',[StaffController::class,'addAdmin'])->name('admin.add');
    Route::get('/admin/all',[StaffController::class,'allAdmin'])->name('admin.all');
    Route::get('/admin/edit/{id}',[StaffController::class,'editProfile'])->name('admin.profile');
    Route::post('/admin/new',[StaffController::class,'newAdmin'])->name('admin.new');
    Route::post('/admin/update/{id}',[StaffController::class,'updateProfile'])->name('admin.update');
    Route::post('/admin/update/pass/{id}',[StaffController::class,'updatePass'])->name('admin.update.pass');
});


Route::get('/doctors/', [PublicController::class,'doctors'])->name('all.doctors');
Route::get('/departments/', [PublicController::class,'departments'])->name('all.departments');
Route::get('/posts/', [PublicController::class,'posts'])->name('blog.posts');
Route::get('/single_post/{post}', [PublicController::class,'singlePost'])->name('blog.singlepost');
Route::get('/cate_post/{postcate}', [PublicController::class,'catePost'])->name('blog.catepost');
Route::get('/services', [PublicController::class,'services'])->name('our.services');
Route::get('/ambulances', [PublicController::class,'ambulances'])->name('all.ambulances');
Route::get('/diagnostics', [PublicController::class,'diagnostics'])->name('all.diagnostics');
Route::get('/organizes', [PublicController::class,'organizes'])->name('all.organizes');
Route::get('/social-organizes', [PublicController::class,'socialOrganizes'])->name('all.socialorganizes');
Route::get('/corporate-organizes', [PublicController::class,'corporateOrganizes'])->name('all.corporateorganizes');
Route::get('/hospitals', [PublicController::class,'hospitals'])->name('all.hospitals');
Route::get('/staffs', [PublicController::class,'staffs'])->name('all.staffs');
Route::get('/shops', [PublicController::class,'shops'])->name('all.shops');
Route::get('/galleries', [PublicController::class,'galleries'])->name('galleries');

Route::get('/ambulance/details/{slug}', [PublicController::class,'ambulanceDetails'])->name('ambulance.details');
Route::get('/diagnostic/details/{slug}', [PublicController::class,'diagnosticDetails'])->name('diagnostic.details');
Route::get('/hospital/details/{slug}', [PublicController::class,'hospitalDetails'])->name('hospital.details');
Route::get('/shop/details/{slug}', [PublicController::class,'shopDetails'])->name('shop.details');
Route::get('/social-organize/details/{slug}', [PublicController::class,'organizeDetails'])->name('social_organize.details');
Route::get('/doctor/details/{slug}', [PublicController::class,'doctorDetails'])->name('doctor.details');
Route::get('/staff/details/{slug}', [PublicController::class,'staffDetails'])->name('staff.details');
Route::get('/department-doctors/{slug}', [PublicController::class,'departmentDoctors'])->name('department.doctors');

Route::get('/contact', [PublicController::class,'contact'])->name('contact');
Route::post('/create/message', [PublicController::class,'createMessage'])->name('message.create');

Route::get('/about', [PublicController::class,'about'])->name('about');
Route::get('/search', [PublicController::class,'search'])->name('search');
Route::get('/search/doctor', [PublicController::class,'searchDoctor'])->name('search.doctor');

Route::get('/terms-and-condition', [PublicController::class,'terms'])->name('terms');
Route::get('/privacy-policy', [PublicController::class,'privacy'])->name('privacy');

Route::get('/book_now/{slug}', [PublicActionController::class,'book_now'])->name('book_now');
Route::post('/book_now/singledoctor', [PublicActionController::class,'book_nowSingle'])->name('book_now.thisdoctor');

//fetch division
Route::get('/fetch-district/{id}', [PublicController::class,'fetchDist']);
Route::get('/fetch-upzila/{id}', [PublicController::class,'fetchupzila']);

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    // return what you want
});

Route::get('/sorry-goodni8', function() {
    $exitCode = Artisan::call('down');
    // return what you want
});
Route::get('/good-morning', function() {
    $exitCode = Artisan::call('up');
    // return what you want
});