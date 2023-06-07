<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\FabricsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RepairFabricsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RetributionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleFabricsController;
use App\Http\Controllers\SeamoerController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SellDressController;
use App\Http\Controllers\SellingPointController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TradeMarkController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('admin.login');
// });


// Route::group(['middleware'=>'guest:admin'],function(){
//     Route::get('login',[AdminUserControler::class,'index'])->name('login');
//     Route::post('LOGIN',[AdminUserControler::class,'login'])->name('login.login');




// Route::get('/', function () {
//     return view('admin.login');
// });
// Route::get('logout', function () {
//     auth()->logout();
// });

// });
// // Route::get('/dashboard', function () {
// //     return view('home');
// // })->middleware(['auth'])->name('dashboard');

// Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth'])->name('home');
// Route::get('Setting',[SettingController::class,'index'])->name('setting');
// Route::post('Setting-create',[SettingController::class,'create'])->name('setting.create');
// Route::post('Setting-update',[SettingController::class,'updateSetting'])->name('Setting.update');
// Route::post('Setting-delete',[SettingController::class,'deleteSetting'])->name('setting.delete');

// //Route Employees
// Route::resource('Employees',EmployeController::class);
// Route::post('/Employees/ajax_search',[EmployeController::class,'ajax_search'])->name('ajax_search');
// Route::get('/edit-employee/{id}',[EmployeController::class,'editEmployess']);
// Route::post('Employees-update',[EmployeController::class,'updateEmployees'])->name('Employees-update');
// Route::post('Employees-delete',[EmployeController::class,'deleteEmployees'])->name('Employees-delete');
// Route::post('editProfile',[EmployeController::class,'editprofile'])->name('editProfile');
// //Route Seamoer
// Route::resource('Seamoer-create',SeamoerController::class);
// Route::get('edit-Seamoer/{id}',[SeamoerController::class,'editSeamoer']);
// Route::post('Seamoer-update',[SeamoerController::class,'updateSeamoer'])->name('Seamoer-update');
// Route::post('Seamoer-delete',[SeamoerController::class,'deleteSeamoer'])->name('Seamoer-delete');
// Route::get('Seamoer-checkup/{id}',[SeamoerController::class,'deletecheckup'])->name('Seamoer-checkup');
// //Routes Retribution
// Route::resource('Retribution',RetributionController::class);
// Route::get('edit-Retribution/{id}',[RetributionController::class,'editRetribution']);
// Route::post('Retribution-update',[RetributionController::class,'updateRetribution'])->name('Retribution-update');
// Route::post('Retribution-delete',[RetributionController::class,'deleteRetribution'])->name('Retribution-delete');
// Route::get('Retribution-checkup/{id}',[RetributionController::class,'deletecheckup'])->name('Retribution-checkup');
// // Route Supplier
// Route::get('Supplier/index',[SupplierController::class,'index'])->name('Supplier-index');
// Route::get('Supplier/create',[SupplierController::class,'create'])->name('Supplier-create');
// Route::post('Supplier/store',[SupplierController::class,'store'])->name('Supplier-store');
// Route::get('Supplier/edit/{id}',[SupplierController::class,'edit'])->name('Supplier-edit');
// Route::post('Supplier/update',[SupplierController::class,'update'])->name('Supplier-update');
// Route::post('Supplier/delete/',[SupplierController::class,'delete'])->name('Supplier-delete');

// //route custmoer
// Route::resource('Customer',CustomerController::class);
// Route::get('Customercode/{id}',[CustomerController::class,'getCustomercode']);
// Route::get('Customer-detail/{id}',[CustomerController::class,'detailCustomer'])->name('customer-detail');
// Route::post('Customer-update',[CustomerController::class,'updateCustomer'])->name('Customer-update');
// Route::post('Customer-delete',[CustomerController::class,'delete'])->name('Customer-delete');

// //Route design
// Route::resource('Products-design',DesignController::class);
// Route::post('design-update',[DesignController::class,'updatedesign'])->name('design-update');
// Route::post('design-delete',[DesignController::class,'deletedesign'])->name('design-delete');
// //Route section
// Route::resource('Products-section',SectionController::class);
// Route::post('section-update',[SectionController::class,'updatesection'])->name('section-update');
// Route::post('section-delete',[SectionController::class,'deletesection'])->name('section-delete');
// //Route fabrice
// Route::get('fabrice-index',[FabricsController::class,'index'])->name('fabrice-index');
// Route::get('fabrice-create',[FabricsController::class,'create'])->name('fabrice-create');
// Route::post('fabrice-store',[FabricsController::class,'store'])->name('fabrice-store');
// Route::get('fabrice-edit/{id}',[FabricsController::class,'edit'])->name('fabrice-edit');
// Route::post('fabrice-update',[FabricsController::class,'update'])->name('fabrice-update');
// Route::post('fabrice-delete',[FabricsController::class,'delete'])->name('fabrice-delete');
// //Route unit
// Route::resource('Products-unit',UnitController::class);
// Route::post('unit-update',[UnitController::class,'updateunit'])->name('unit-update');
// Route::post('unit-delete',[UnitController::class,'deleteunit'])->name('unit-delete');
// //Route Products-tradeMark
// Route::resource('Products-tradeMark',TradeMarkController::class);
// Route::post('tradeMark-update',[TradeMarkController::class,'updatetradeMark'])->name('tradeMark-update');
// Route::post('tradeMark-delete',[TradeMarkController::class,'deletetradeMark'])->name('tradeMark-delete');
// // Route start saleFabrics
// Route::get('saleFabrics-index',[SaleFabricsController::class,'index'])->name('saleFabrics-index');
// Route::post('saleFabrics-store',[SaleFabricsController::class,'store'])->name('saleFabrics-store');
// Route::post('saleFabrics-update',[SaleFabricsController::class,'update'])->name('saleFabrics-update');
// Route::post('saleFabrics-delete',[SaleFabricsController::class,'delete'])->name('saleFabrics-delete');
// Route::post('saleFabrics-ajax_fabrics',[SaleFabricsController::class,'ajax_fabrics'])->name('saleFabrics-ajax_fabrics');
// // end sale Fabrics
// // Route start SellDress
// Route::get('SellDress-index',[SellDressController::class,'index'])->name('SellDress-index');
// Route::post('SellDress-store',[SellDressController::class,'store'])->name('SellDress-store');
// Route::post('SellDress-update',[SellDressController::class,'update'])->name('SellDress-update');
// Route::post('SellDress-delete',[SellDressController::class,'delete'])->name('SellDress-delete');
// // Route start Repairfabrics
// Route::get('Repairfabrics-index',[RepairFabricsController::class,'index'])->name('Repairfabrics-index');
// Route::post('Repairfabrics-store',[RepairFabricsController::class,'store'])->name('Repairfabrics-store');
// Route::post('Repairfabrics-update',[RepairFabricsController::class,'update'])->name('Repairfabrics-update');
// Route::post('Repairfabrics-delete',[RepairFabricsController::class,'delete'])->name('Repairfabrics-delete');
// // Route end Repairfabrics

// //Route start Report
// Route::get('report-customer',[ReportController::class,'getCustomer'])->name('report-customer');
// Route::post('report-customerAjax',[ReportController::class,'ajaxCustomer'])->name('report-customerAjax');
// Route::get('report-invoice',[ReportController::class,'getInvoice'])->name('report-invoice');
// Route::post('report-invoiceAjax',[ReportController::class,'ajaxInvoice'])->name('report-invoiceAjax');
// Route::get('report-fabrice',[ReportController::class,'getFabrice'])->name('report-fabrice');
// Route::post('report-fabriceAjax',[ReportController::class,'ajaxFabrice'])->name('report-fabriceAjax');
// // Route end Report

// // Route Products
// Route::resource('Products-create',ProductController::class);
// Route::get('/edit-Products/{id}',[ProductController::class,'editProducts'])->name('edit-Products');
// Route::post('Products-update',[ProductController::class,'updateProducts'])->name('Products-update');
// Route::post('Products-delete',[ProductController::class,'deleteProducts'])->name('Products-delete');
// Route::get('sectionSub/{id}',[ProductController::class,'getSectionSub']);
// Route::get('unitSub/{id}',[ProductController::class,'getUnitSub']);
// //
// Route::resource('Sale-point',SellingPointController::class);
// Route::post('Sale-point-ajax_color',[SellingPointController::class,'ajax_color'])->name('Sale-point-ajax_color');
// Route::resource('Sale-menu',SaleController::class);
// Route::get('edit-Sale-menu/{id}',[SaleController::class,'editSale']);
// Route::post('Sale-menu-updateCal',[SaleController::class,'updateCal'])->name('Sale-menu-updateCal');
// Route::post('Sale-menu-update',[SaleController::class,'updateSale'])->name('Sale-menu-update');
// Route::post('Sale-menu-delete',[SaleController::class,'deleteSale'])->name('Sale-menu-delete');
// Route::post('Sale-menu-create',[SaleController::class,'createSale'])->name('Sale-menu-create');

// Route::resource('Sale-reference',SaleController::class);
// Route::get('/print-invoice/{id}',[SaleController::class,'printInvoice'])->name('printInvoices');
// //Route purchases
// Route::resource('users',UserController::class);
// Route::resource('roles',RoleController::class);


// Route::resource('purchases-menu',PurchaseController::class);
// Route::get('edit-purchases/{id}',[PurchaseController::class,'editpurchases']);
// Route::post('purchases-update',[PurchaseController::class,'updatepurchases'])->name('purchases-update');
// Route::post('purchases-delete',[PurchaseController::class,'deletepurchases'])->name('purchases-delete');
// Route::get('/{page}', [AdminController::class,'index']);


