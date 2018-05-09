<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'indexController@index');

//------data lapangan-----
// Route::get('/data_lapangan', 'TbLapanganController@data_lapangan');

// Route::get('/tambah_lapangan', 'TbLapanganController@tambah_lapangan');

// Route::post('/post_lapangan', 'TbLapanganController@store');

// Route::get('detaildatalapangan/{id}', 'TbLapanganController@show');

// Route::put('updatedatalapangan/{id}', 'TbLapanganController@update');

// Route::delete('deletedatalapangan/{id}', 'TbLapanganController@destroy');

// //----data jadwal------//

// Route::get('data_jadwal', 'TbJadwalController@index');

// //----------data Cutomer------//
// Route::get('/', 'Customer\HomesController@index');

// Route::get('/home', 'Customer\HomesController@home')->middleware('auth');

// Route::get('/book/{id}', 'Customer\HomesController@booking')->middleware('auth');

// //Route::get('/lobi', 'Customer\HomesController@lobi')->middleware('auth');

// Route::get('/detail/{id}', 'Customer\HomesController@show')->middleware('auth');

// Route::post('/post_book', 'Customer\CustomerTransactionController@store')->middleware('auth');

// Route::get('/booking/{code}', 'Customer\CustomerTransactionController@show')->middleware('auth');
// Route::get('/booked/{code}', 'Customer\CustomerTransactionController@book_show')->middleware('auth');

// Route::get('/lobby', 'Customer\HomesController@lobby')->middleware('auth');

// Route::get('/my-booking', 'Customer\HomesController@mybooks')->middleware('auth');

// Route::get('/topup', 'Customer\HomesController@topup_show')->middleware('auth');
// Route::get('/my-topup', 'Customer\HomesController@topup_my_show')->middleware('auth');
// Route::post('/topup/invoice/', 'Customer\HomesController@topup_invoice_show')->middleware('auth');
// Route::post('/topup_post', 'Customer\HomesController@topup_post')->middleware('auth');
// Route::post('/topup/order', 'Customer\HomesController@topup_order')->middleware('auth');

// Route::get('/payable/{code}', 'Customer\CustomerTransactionController@pay_booking')->middleware('auth');

/*
 * LANDING CUSTOMER VIEW
 */
Route::get('/', 'Customer\HomesController@index');

/*
 * LAPANGAN CUSTOMER VIEW
 */
Route::get('/lapangan', 'Customer\HomesController@data_lapangan');
Route::get('/lapangan/{id}', 'Customer\HomesController@show');
Route::get('/lapangan/{id}/book', 'Customer\HomesController@booking')->middleware('auth');
/*
 * LAPANGAN ADMIN VIEW
 */
Route::get('/admin/lapangan/new', 'LapanganController@tambah_lapangan');
Route::get('/admin/lapangan/new', 'LapanganController@tambah_lapangan');
Route::post('/admin/lapangan/create', 'LapanganController@store');
Route::get('/admin/lapangan/{$id}/edit', 'LapanganController@store');
Route::put('/admin/lapangan/{$id}/update', 'LapanganController@store');
Route::delete('/admin/lapangan/{$id}/delete', 'LapanganController@destroy');


/*
 * BOOK CUSTOMER VIEW
 */
Route::post('/post_book', 'Customer\CustomerTransactionController@store')->middleware('auth');
Route::get('/book/{id}/created', 'Customer\CustomerTransactionController@show');

//$json = '[
//	{
//	  "id": 1,
//	  "title": "IFI Futsal",
//	  "addr": "Jl. Sukabirus No.7, Citeureup, Dayeuhkolot, Kota Bandung, Jawa Barat 40257",
//	  "dist": 1,
//	  "icon": "cover.jpg",
//	  "seat": 8,
//	  "rate": 1,
//	  "price": 40000,
//	  "subscribed": false
//	},
//	{
//	  "id": 2,
//	  "title": "Bos Futsal",
//	  "addr": "Jl. Cikoneng, Bojongsoang, Bandung, Jawa Barat 40288",
//	  "dist": 2,
//	  "icon": "lap1.jpg",
//	  "seat": 0,
//	  "rate": 5,
//	  "price": 20000,
//	  "subscribed": false
//	},
//	{
//	  "id": 3,
//	  "title": "MU Futsal",
//	  "addr": "Jl. Sadang No.19-27, Margahayu Tengah, Margahayu, Bandung, Jawa Barat 40225",
//	  "dist": 3,
//	  "icon": "lap2.jpg",
//	  "seat": 3,
//	  "rate": 3,
//	  "price": 25000,
//	  "subscribed": true
//	},
//	{
//	  "id": 4,
//	  "title": "Centro Futsal",
//	  "addr": "Jl. Margacinta No.48, Cijaura, Buahbatu, Kota Bandung, Jawa Barat 40286",
//	  "dist": 2,
//	  "icon": "lap1.jpg",
//	  "seat": 2,
//	  "rate": 2,
//	  "price": 35000,
//	  "subscribed": false
//	},
//	{
//	  "id": 5,
//	  "title": "Bisoc Futsal",
//	  "addr": "Jl. Batununggal Lestari No.1, Batununggal, Bandung Kidul, Kota Bandung, Jawa Barat 40266",
//	  "dist": 4,
//	  "icon": "lap3.jpg",
//	  "seat": 1,
//	  "rate": 5,
//	  "price": 30000,
//	  "subscribed": true
//	},
//	{
//	  "id": 6,
//	  "title": "Rajawali Futsal",
//	  "addr": "Citeureup, Dayeuhkolot, Bandung, West Java 40257",
//	  "dist": 5,
//	  "icon": "lap4.jpg",
//	  "seat": 7,
//	  "rate": 4,
//	  "price": 40000,
//	  "subscribed": false
//	}
//	]';
//define("JSONDATA", $json);
//
//Route::get('/',function(){
//
//    $items = json_decode(JSONDATA);
//    //$items = $json;
//
//    return View::make('customer.home', ['items'=>$items]);
//}
//);

//Route::get('/detail/{id}',function($id){
//    $items = json_decode(JSONDATA);
//    $item = $items[$id];
//    return View::make('customer.detail_lapangan',['item'=>$item, 'ids'=>$id]);
//});

//Route::get('/book/{id}',function($id){
//    $items = json_decode(JSONDATA);
//    $item = $items[$id];
//    return View::make('customer.transaksi_1',['item'=>$item, 'ids'=>$id]);
//});
//
//Route::get('/lobby',function(){
//    return view('customer.lobby');
//});