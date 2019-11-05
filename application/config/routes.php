<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Category Routes Start
$route['categorys'] = "CategoryController/index";
$route['categoryCreate']['post'] = "CategoryController/store";
$route['categoryCreate'] = "CategoryController/create";
$route['categoryEdit/(:any)'] = "CategoryController/edit/$1";
$route['categoryUpdate/(:any)']['POST'] = "CategoryController/update/$1";
$route['categoryDelete/(:any)'] = "CategoryController/delete/$1";
//Category Routes End

$route['api/authentication/login'] = 'api/authentication/login';
$route['api/authentication/registration'] = 'api/authentication/registration';
$route['api/authentication/user/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/authentication/user/id/$1/format/$3$4';


//Authentication URL
$route['authentication'] = 'AuthController/index';
$route['registration'] = 'AuthController/registration';
$route['sallerregistration'] = 'AuthController/sallerregistration';
//$route['api/authentication/registration'] = 'api/authentication/registration';
//$route['api/authentication/user/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/authentication/user/id/$1/format/$3$4';

// //Product's
// $route['products'] = 'ProductController/index';
// $route['addnewproduct'] = 'ProductController/AddNewPeoduct';

// $route['myform'] = 'ProductController/getAllCategory';

// $route['myform/ajax/(:any)'] = 'ProductController/getSubCategoryById/$1';



//Saller
$route['SallerDashboard'] = 'saller/DashboardController/index';
$route['ManageShop'] = 'ShopController/index';
$route['CreateShop'] = 'ShopController/createNew';


//User Related
$route['CreateNewUser'] = 'UsersController/createNewUser';
$route['ManageUsers'] = 'UsersController/index';

//User Role Related
$route['CreateNewUserRole'] = 'RoleController/createNewUserRole';
$route['ManageUsersRole'] = 'RoleController/index';


//City Role Related
$route['CreateNewCity'] = 'CityController/createNewCity';
$route['ManageCity'] = 'CityController/index';


//City Role Related
$route['CreateNewBrand'] = 'BrandController/createNewBrand';
$route['ManageBrand'] = 'BrandController/index';

//Weight Unit Related
$route['CreateNewWeightUnit'] = 'WeightUnitController/createNewWeightUnit';
$route['ManageWeightUnit'] = 'WeightUnitController/index';



//State Role Related
$route['CreateNewState'] = 'StateController/createNewState';
$route['ManageState'] = 'StateController/index';

//State Role Related
$route['CreateNewAddressType'] = 'AddressTypeController/createNewAddressType';
$route['ManageAddressType'] = 'AddressTypeController/index';

//Main Category Related
$route['CreateNewMainCategory'] = 'MainCategoryController/createNewMainCategory';
$route['ManageMainCategory'] = 'MainCategoryController/index';

//Sub Category Category Related
$route['CreateNewSubCategory'] = 'SubCategoryController/createNewSubCategory';
$route['ManageSubCategory'] = 'SubCategoryController/index';

//Address Related
$route['CreateNewAddress'] = 'AddressController/createNewAddress';
$route['ManageAddress'] = 'AddressController/index';

//Coupan Related
$route['CreateNewProduct'] = 'ProductController/createNewProduct';
$route['ManageProduct'] = 'ProductController/index';


//Coupan Related
$route['CreateNewCoupan'] = 'CoupanController/createNewCoupan';
$route['ManageCoupan'] = 'CoupanController/index';


//Product Review Related
$route['CreateNewProductReview'] = 'ProductReviewController/createNewProductReview';
$route['ManageProductReview'] = 'ProductReviewController/index';

//Product Review Related
$route['CreateNewProductOffer'] = 'ProductOfferController/createNewProductOffer';
$route['ManageProductOffer'] = 'ProductOfferController/index';


//Product Review Related
$route['CreateNewProductWeightUnit'] = 'ProductWeightUnitController/createNewProductWeightUnit';
$route['ManageProductWeightUnit'] = 'ProductWeightUnitController/index';


//Product Review Related
$route['CreateNewCart'] = 'CartController/createNewCart';
$route['ManageCart'] = 'CartController/index';

//Product Related
$route['CreateNewProduct'] = 'ProductController/createNewProduct';
$route['ManageProduct'] = 'ProductController/index';
