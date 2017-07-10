<?php

define('API_VERSION', 2.0);
require('includes/application_top.php');


$db->query($db->link, "CREATE TABLE IF NOT EXISTS " . "user_token_mob_api (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, user_id INT NOT NULL, token VARCHAR(32) NOT NULL )");
$db->query($db->link, "CREATE TABLE IF NOT EXISTS " . "user_device_mob_api (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, user_id INT NOT NULL, device_token VARCHAR(500) , os_type VARCHAR(20))");



$get = $_REQUEST;
global $db;

/**
 * @api {get} api.php?route=module/apimodule/delivery  ChangeOrderDelivery
 * @apiName ChangeOrderDelivery
 * @apiGroup All
 *
 * @apiParam {String} address New shipping address.
 * @apiParam {String} city New shipping city.
 * @apiParam {Number} order_id unique order ID.
 * @apiParam {Token} token your unique token.
 *
 * @apiSuccess {Number} version  Current API version.
 * @apiSuccess {Boolean} response Status of change address.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *   {
 *         "status": true,
 *         "version": 1.0
 *    }
 * @apiErrorExample Error-Response:
 *
 *     {
 *       "error": "Can not change address",
 *       "version": 1.0,
 *       "Status" : false
 *     }
 *
 */
if ($get['route'] == 'module/apimodule/delivery'){
    header('Content-Type: application/json');
    echo apiChangeOrderDelivery();
}

/**
 * @api {post} api.php?route=module/apimodule/deletedevicetoken  deleteUserDeviceToken
 * @apiName deleteUserDeviceToken
 * @apiGroup All
 *
 * @apiParam {String} old_token User's device's token for firebase notifications.
 *
 * @apiSuccess {Number} version  Current API version.
 * @apiSuccess {Boolean} status  true.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *   {
 *       "response":
 *       {
 *          "status": true,
 *          "version": 1.0
 *       }
 *   }
 *
 * @apiErrorExample Error-Response:
 *
 *     {
 *       "error": "Missing some params",
 *       "version": 1.0,
 *       "Status" : false
 *     }
 *
 */
if ($get['route'] == 'module/apimodule/deletedevicetoken'){
    header('Content-Type: application/json');
    echo apiDeleteDeviceToken();
}

/**
 * @api {post} api.php?route=module/apimodule/updatedevicetoken  updateUserDeviceToken
 * @apiName updateUserDeviceToken
 * @apiGroup All
 *
 * @apiParam {String} new_token User's device's new token for firebase notifications.
 * @apiParam {String} old_token User's device's old token for firebase notifications.
 *
 * @apiSuccess {Number} version  Current API version.
 * @apiSuccess {Boolean} status  true.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *   {
 *       "response":
 *       {
 *          "status": true,
 *          "version": 1.0
 *       }
 *   }
 *
 * @apiErrorExample Error-Response:
 *
 *     {
 *       "error": "Missing some params",
 *       "version": 1.0,
 *       "Status" : false
 *     }
 *
 */
if ($get['route'] == 'module/apimodule/updatedevicetoken' && isset($get['old_token']) && isset($get['new_token'])){
    header('Content-Type: application/json');
    echo apiUpdateDeviceToken();
}

/**
 * @api {get} api.php?route=module/apimodule/orders  getOrders
 * @apiName GetOrders
 * @apiGroup All
 *
 * @apiParam {Token} token your unique token.
 * @apiParam {Number} page number of the page.
 * @apiParam {Number} limit limit of the orders for the page.
 * @apiParam {Array} filter array of the filter params.
 * @apiParam {String} filter[fio] full name of the client.
 * @apiParam {Number} filter[order_status_id] unique id of the order.
 * @apiParam {Number} filter[min_price] min price of order.
 * @apiParam {Number} filter[max_price] max price of order.
 * @apiParam {Date} filter[date_min] min date adding of the order.
 * @apiParam {Date} filter[date_max] max date adding of the order.
 *
 * @apiSuccess {Number} version  Current API version.
 * @apiSuccess {Array} orders  Array of the orders.
 * @apiSuccess {Array} statuses  Array of the order statuses.
 * @apiSuccess {Number} order_id  ID of the order.
 * @apiSuccess {Number} order_number  Number of the order.
 * @apiSuccess {String} fio     Client's FIO.
 * @apiSuccess {String} status  Status of the order.
 * @apiSuccess {String} currency_code  Default currency of the shop.
 * @apiSuccess {String} order[currency_code] currency of the order.
 * @apiSuccess {Number} total  Total sum of the order.
 * @apiSuccess {Date} date_added  Date added of the order.
 * @apiSuccess {Date} total_quantity  Total quantity of the orders.
 *
 *
 *
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 * {
 *   "Response"
 *   {
 *      "orders":
 *      {
 *            {
 *             "order_id" : "1",
 *             "order_number" : "1",
 *             "fio" : "Anton Kiselev",
 *             "status" : "Сделка завершена",
 *             "total" : "106.00",
 *             "date_added" : "2016-12-09 16:17:02",
 *             "currency_code": "RUB"
 *             },
 *            {
 *             "order_id" : "2",
 *             "order_number" : "2",
 *             "fio" : "Vlad Kochergin",
 *             "status" : "В обработке",
 *             "total" : "506.00",
 *             "date_added" : "2016-10-19 16:00:00",
 *             "currency_code": "RUB"
 *             }
 *       },
 *       "statuses" :
 *       {
 *             {
 *              "name": "Отменено",
 *              "order_status_id": "7",
 *              "language_id": "1"
 *              },
 *             {
 *              "name": "Сделка завершена",
 *              "order_status_id": "5",
 *              "language_id": "1"
 *              },
 *              {
 *               "name": "Ожидание",
 *               "order_status_id": "1",
 *               "language_id": "1"
 *               }
 *       },
 *       "currency_code": "RUB",
 *       "total_quantity": 50,
 *       "total_sum": "2026.00",
 *       "max_price": "1405.00"
 *   },
 *   "Status" : true,
 *   "version": 1.0
 * }
 * @apiErrorExample Error-Response:
 *
 * {
 *      "version": 1.0,
 *      "Status" : false
 *
 * }
 *
 *
 */
if ($get['route'] == 'module/apimodule/orders'){
    header('Content-Type: application/json');
    echo apiGetOrders();
}

/**
 * @api {get} api.php?route=module/apimodule/statistic  getDashboardStatistic
 * @apiName getDashboardStatistic
 * @apiGroup All
 *
 * @apiParam {String} filter Period for filter(day/week/month/year).
 * @apiParam {Token} token your unique token.
 *
 * @apiSuccess {Number} version  Current API version.
 * @apiSuccess {Array} xAxis Period of the selected filter.
 * @apiSuccess {Array} Clients Clients for the selected period.
 * @apiSuccess {Array} Orders Orders for the selected period.
 * @apiSuccess {String} currency_code  Default currency of the shop.
 * @apiSuccess {Number} total_sales  Sum of sales of the shop.
 * @apiSuccess {Number} sale_year_total  Sum of sales of the current year.
 * @apiSuccess {Number} orders_total  Total orders of the shop.
 * @apiSuccess {Number} clients_total  Total clients of the shop.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *   {
 *           "response": {
 *               "xAxis": [
 *                  1,
 *                  2,
 *                  3,
 *                  4,
 *                  5,
 *                  6,
 *                  7
 *              ],
 *              "clients": [
 *                  0,
 *                  0,
 *                  0,
 *                  0,
 *                  0,
 *                  0,
 *                  0
 *              ],
 *              "orders": [
 *                  1,
 *                  0,
 *                  0,
 *                  0,
 *                  0,
 *                  0,
 *                  0
 *              ],
 *              "total_sales": "1920.00",
 *              "sale_year_total": "305.00",
 *              "currency_code": "UAH",
 *              "orders_total": "4",
 *              "clients_total": "3"
 *           },
 *           "status": true,
 *           "version": 1.0
 *  }
 *
 * @apiErrorExample Error-Response:
 *
 *     {
 *       "error": "Unknown filter set",
 *       "version": 1.0,
 *       "Status" : false
 *     }
 *
 */
if ($get['route'] == 'module/apimodule/statistic'){
    header('Content-Type: application/json');
    echo apiGetStatistic();
}

/**
 * @api {get} api.php?route=module/apimodule/getorderinfo  getOrderInfo
 * @apiName getOrderInfo
 * @apiGroup All
 *
 * @apiParam {Number} order_id unique order ID.
 * @apiParam {Token} token your unique token.
 *
 * @apiSuccess {Number} version  Current API version.
 * @apiSuccess {Number} order_number  Number of the order.
 * @apiSuccess {String} fio     Client's FIO.
 * @apiSuccess {String} status  Status of the order.
 * @apiSuccess {String} email  Client's email.
 * @apiSuccess {Number} phone  Client's phone.
 * @apiSuccess {Number} total  Total sum of the order.
 * @apiSuccess {String} currency_code  Default currency of the shop.
 * @apiSuccess {Date} date_added  Date added of the order.
 * @apiSuccess {Array} statuses  Statuses list for order.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 * {
 *      "response" :
 *          {
 *              "order_number" : "6",
 *              "currency_code": "RUB",
 *              "fio" : "Anton Kiselev",
 *              "email" : "client@mail.ru",
 *              "telephone" : "056 000-11-22",
 *              "date_added" : "2016-12-24 12:30:46",
 *              "total" : "1405.00",
 *              "status" : "Сделка завершена",
 *              "statuses" :
 *                  {
 *                         {
 *                             "name": "Отменено",
 *                             "order_status_id": "7",
 *                             "language_id": "1"
 *                         },
 *                         {
 *                             "name": "Сделка завершена",
 *                             "order_status_id": "5",
 *                             "language_id": "1"
 *                          },
 *                          {
 *                              "name": "Ожидание",
 *                              "order_status_id": "1",
 *                              "language_id": "1"
 *                           }
 *                    }
 *          },
 *      "status" : true,
 *      "version": 1.0
 * }
 *
 * @apiErrorExample Error-Response:
 *
 *     {
 *       "error" : "Can not found order with id = 5",
 *       "version": 1.0,
 *       "Status" : false
 *     }
 */
if ($get['route'] == 'module/apimodule/getorderinfo'){
    header('Content-Type: application/json');
    echo apiGetOrderInfo();
}

/**
 * @api {get} api.php?route=module/apimodule/paymentanddelivery  getOrderPaymentAndDelivery
 * @apiName getOrderPaymentAndDelivery
 * @apiGroup All
 *
 * @apiParam {Number} order_id unique order ID.
 * @apiParam {Token} token your unique token.
 *
 * @apiSuccess {Number} version  Current API version.
 * @apiSuccess {String} payment_method     Payment method.
 * @apiSuccess {String} shipping_method  Shipping method.
 * @apiSuccess {String} shipping_address  Shipping address.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *
 *      {
 *          "response":
 *              {
 *                  "payment_method" : "Оплата при доставке",
 *                  "shipping_method" : "Доставка с фиксированной стоимостью доставки",
 *                  "shipping_address" : "проспект Карла Маркса 1, Днепропетровск, Днепропетровская область, Украина."
 *              },
 *          "status": true,
 *          "version": 1.0
 *      }
 * @apiErrorExample Error-Response:
 *
 *    {
 *      "error": "Can not found order with id = 90",
 *      "version": 1.0,
 *      "Status" : false
 *   }
 *
 */
if ($get['route'] == 'module/apimodule/paymentanddelivery'){
    header('Content-Type: application/json');
    echo apiGetPaymentAndDelivery();
}

/**
 * @api {get} api.php?route=module/apimodule/orderproducts  getOrderProducts
 * @apiName getOrderProducts
 * @apiGroup All
 *
 * @apiParam {Token} token your unique token.
 * @apiParam {ID} order_id unique order id.
 *
 * @apiSuccess {Number} version  Current API version.
 * @apiSuccess {Url} image  Picture of the product.
 * @apiSuccess {Number} quantity  Quantity of the product.
 * @apiSuccess {String} name     Name of the product.
 * @apiSuccess {String} model  Model of the product.
 * @apiSuccess {Number} Price  Price of the product.
 * @apiSuccess {Number} total_order_price  Total sum of the order.
 * @apiSuccess {Number} total_price  Sum of product's prices.
 * @apiSuccess {String} currency_code  currency of the order.
 * @apiSuccess {Number} shipping_price  Cost of the shipping.
 * @apiSuccess {Number} total  Total order sum.
 * @apiSuccess {Number} product_id  unique product id.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 * {
 *      "response":
 *          {
 *              "products": [
 *              {
 *                  "image" : "http://opencart/image/catalog/demo/htc_touch_hd_1.jpg",
 *                  "name" : "HTC Touch HD",
 *                  "model" : "Product 1",
 *                  "quantity" : 3,
 *                  "price" : 100.00,
 *                  "product_id" : 90
 *              },
 *              {
 *                  "image" : "http://opencart/image/catalog/demo/iphone_1.jpg",
 *                  "name" : "iPhone",
 *                  "model" : "Product 11",
 *                  "quantity" : 1,
 *                  "price" : 500.00,
 *                  "product_id" : 97
 *               }
 *            ],
 *            "total_order_price":
 *              {
 *                   "total_discount": 0,
 *                   "total_price": 2250,
 *					 "currency_code": "RUB",
 *                   "shipping_price": 35,
 *                   "total": 2285
 *               }
 *
 *         },
 *      "status": true,
 *      "version": 1.0
 * }
 *
 *
 * @apiErrorExample Error-Response:
 *
 *     {
 *          "error": "Can not found any products in order with id = 10",
 *          "version": 1.0,
 *          "Status" : false
 *     }
 *
 */
if ($get['route'] == 'module/apimodule/orderproducts'){
    header('Content-Type: application/json');
    echo apiGetOrderProducts();
}

/**
 * @api {get} api.php?route=module/apimodule/orderhistory  getOrderHistory
 * @apiName getOrderHistory
 * @apiGroup All
 *
 * @apiParam {Number} order_id unique order ID.
 * @apiParam {Token} token your unique token.
 *
 * @apiSuccess {Number} version  Current API version.
 * @apiSuccess {String} name     Status of the order.
 * @apiSuccess {Number} order_status_id  ID of the status of the order.
 * @apiSuccess {Date} date_added  Date of adding status of the order.
 * @apiSuccess {String} comment  Some comment added from manager.
 * @apiSuccess {Array} statuses  Statuses list for order.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *       {
 *           "response":
 *               {
 *                   "orders":
 *                      {
 *                          {
 *                              "name": "Отменено",
 *                              "order_status_id": "7",
 *                              "date_added": "2016-12-13 08:27:48.",
 *                              "comment": "Some text"
 *                          },
 *                          {
 *                              "name": "Сделка завершена",
 *                              "order_status_id": "5",
 *                              "date_added": "2016-12-25 09:30:10.",
 *                              "comment": "Some text"
 *                          },
 *                          {
 *                              "name": "Ожидание",
 *                              "order_status_id": "1",
 *                              "date_added": "2016-12-01 11:25:18.",
 *                              "comment": "Some text"
 *                           }
 *                       },
 *                    "statuses":
 *                        {
 *                             {
 *                                  "name": "Отменено",
 *                                  "order_status_id": "7",
 *                                  "language_id": "1"
 *                             },
 *                             {
 *                                  "name": "Сделка завершена",
 *                                  "order_status_id": "5",
 *                                  "language_id": "1"
 *                              },
 *                              {
 *                                  "name": "Ожидание",
 *                                  "order_status_id": "1",
 *                                  "language_id": "1"
 *                              }
 *                         }
 *               },
 *           "status": true,
 *           "version": 1.0
 *       }
 * @apiErrorExample Error-Response:
 *
 *     {
 *          "error": "Can not found any statuses for order with id = 5",
 *          "version": 1.0,
 *          "Status" : false
 *     }
 */
if ($get['route'] == 'module/apimodule/orderhistory'){
    header('Content-Type: application/json');
    echo apiGetOrderHistory();
}

/**
 * @api {get} api.php?route=module/apimodule/clients  getClients
 * @apiName GetClients
 * @apiGroup All
 *
 * @apiParam {Token} token your unique token.
 * @apiParam {Number} page number of the page.
 * @apiParam {Number} limit limit of the orders for the page.
 * @apiParam {String} fio full name of the client.
 * @apiParam {String} sort param for sorting clients(sum/quantity/date_added).
 *
 * @apiSuccess {Number} version  Current API version.
 * @apiSuccess {Number} client_id  ID of the client.
 * @apiSuccess {String} fio     Client's FIO.
 * @apiSuccess {Number} total  Total sum of client's orders.
 * @apiSuccess {String} currency_code  Default currency of the shop.
 * @apiSuccess {Number} quantity  Total quantity of client's orders.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 * {
 *   "Response"
 *   {
 *     "clients"
 *      {
 *          {
 *              "client_id" : "88",
 *              "fio" : "Anton Kiselev",
 *              "total" : "1006.00",
 *              "currency_code": "UAH",
 *              "quantity" : "5"
 *          },
 *          {
 *              "client_id" : "10",
 *              "fio" : "Vlad Kochergin",
 *              "currency_code": "UAH",
 *              "total" : "555.00",
 *              "quantity" : "1"
 *          }
 *      }
 *    },
 *    "Status" : true,
 *    "version": 1.0
 * }
 * @apiErrorExample Error-Response:
 * {
 *      "Error" : "Not one client found",
 *      "version": 1.0,
 *      "Status" : false
 * }
 *
 *
 */
if ($get['route'] == 'module/apimodule/clients'){
    header('Content-Type: application/json');
    echo apiGetClients();
}

/**
 * @api {get} api.php?route=module/apimodule/clientinfo  getClientInfo
 * @apiName getClientInfo
 * @apiGroup All
 *
 * @apiParam {Token} token your unique token.
 * @apiParam {Number} client_id unique client ID.
 *
 * @apiSuccess {Number} version  Current API version.
 * @apiSuccess {Number} client_id  ID of the client.
 * @apiSuccess {String} fio     Client's FIO.
 * @apiSuccess {Number} total  Total sum of client's orders.
 * @apiSuccess {Number} quantity  Total quantity of client's orders.
 * @apiSuccess {String} email  Client's email.
 * @apiSuccess {String} telephone  Client's telephone.
 * @apiSuccess {String} currency_code  Default currency of the shop.
 * @apiSuccess {Number} cancelled  Total quantity of cancelled orders.
 * @apiSuccess {Number} completed  Total quantity of completed orders.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 * {
 *   "Response"
 *   {
 *         "client_id" : "88",
 *         "fio" : "Anton Kiselev",
 *         "total" : "1006.00",
 *         "quantity" : "5",
 *         "cancelled" : "1",
 *         "completed" : "2",
 *         "currency_code": "UAH",
 *         "email" : "client@mail.ru",
 *         "telephone" : "13456789"
 *   },
 *   "Status" : true,
 *   "version": 1.0
 * }
 * @apiErrorExample Error-Response:
 * {
 *      "Error" : "Not one client found",
 *      "version": 1.0,
 *      "Status" : false
 * }
 *
 *
 */
if ($get['route'] == 'module/apimodule/clientinfo'){
    header('Content-Type: application/json');
    echo apiGetClientInfo();
}

/**
 * @api {get} api.php?route=module/apimodule/clientorders  getClientOrders
 * @apiName getClientOrders
 * @apiGroup All
 *
 * @apiParam {Token} token your unique token.
 * @apiParam {Number} client_id unique client ID.
 * @apiParam {String} sort param for sorting orders(total/date_added/completed/cancelled).
 *
 * @apiSuccess {Number} version  Current API version.
 * @apiSuccess {Number} order_id  ID of the order.
 * @apiSuccess {Number} order_number  Number of the order.
 * @apiSuccess {String} status  Status of the order.
 * @apiSuccess {String} currency_code  Default currency of the shop.
 * @apiSuccess {Number} total  Total sum of the order.
 * @apiSuccess {Date} date_added  Date added of the order.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 * {
 *   "Response"
 *   {
 *       "orders":
 *          {
 *             "order_id" : "1",
 *             "order_number" : "1",
 *             "status" : "Сделка завершена",
 *             "currency_code": "UAH",
 *             "total" : "106.00",
 *             "date_added" : "2016-12-09 16:17:02"
 *          },
 *          {
 *             "order_id" : "2",
 *             "currency_code": "UAH",
 *             "order_number" : "2",
 *             "status" : "В обработке",
 *             "total" : "506.00",
 *             "date_added" : "2016-10-19 16:00:00"
 *          }
 *    },
 *    "Status" : true,
 *    "version": 1.0
 * }
 * @apiErrorExample Error-Response:
 * {
 *      "Error" : "You have not specified ID",
 *      "version": 1.0,
 *      "Status" : false
 * }
 *
 *
 */
if ($get['route'] == 'module/apimodule/clientorders'){
    header('Content-Type: application/json');
    echo apiGetClientOrders();
}

/**
 * @api {get} api.php?route=module/apimodule/products  getProductsList
 * @apiName getProductsList
 * @apiGroup All
 *
 * @apiParam {Token} token your unique token.
 * @apiParam {Number} page number of the page.
 * @apiParam {Number} limit limit of the orders for the page.
 * @apiParam {String} name name of the product for search.
 *
 * @apiSuccess {Number} version  Current API version.
 * @apiSuccess {Number} product_id  ID of the product.
 * @apiSuccess {String} model     Model of the product.
 * @apiSuccess {String} name  Name of the product.
 * @apiSuccess {String} currency_code  Default currency of the shop.
 * @apiSuccess {Number} price  Price of the product.
 * @apiSuccess {Number} quantity  Actual quantity of the product.
 * @apiSuccess {Url} image  Url to the product image.
 *
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 * {
 *   "Response":
 *   {
 *      "products":
 *      {
 *           {
 *             "product_id" : "1",
 *             "model" : "Black",
 *             "name" : "HTC Touch HD",
 *             "price" : "100.00",
 *             "currency_code": "UAH",
 *             "quantity" : "83",
 *             "image" : "http://site-url/image/catalog/demo/htc_touch_hd_1.jpg"
 *           },
 *           {
 *             "product_id" : "2",
 *             "model" : "White",
 *             "name" : "iPhone",
 *             "price" : "300.00",
 *             "currency_code": "UAH",
 *             "quantity" : "30",
 *             "image" : "http://site-url/image/catalog/demo/iphone_1.jpg"
 *           }
 *      }
 *   },
 *   "Status" : true,
 *   "version": 1.0
 * }
 * @apiErrorExample Error-Response:
 * {
 *      "Error" : "Not one product not found",
 *      "version": 1.0,
 *      "Status" : false
 * }
 *
 *
 */
if ($get['route'] == 'module/apimodule/products'){
    header('Content-Type: application/json');
    echo apiGetProducts();
}

/**
 * @api {get} api.php?route=module/apimodule/productinfo  getProductInfo
 * @apiName getProductInfo
 * @apiGroup All
 *
 * @apiParam {Token} token your unique token.
 * @apiParam {Number} product_id unique product ID.
 *
 * @apiSuccess {Number} version  Current API version.
 * @apiSuccess {Number} product_id  ID of the product.
 * @apiSuccess {String} model     Model of the product.
 * @apiSuccess {String} name  Name of the product.
 * @apiSuccess {Number} price  Price of the product.
 * @apiSuccess {String} currency_code  Default currency of the shop.
 * @apiSuccess {Number} quantity  Actual quantity of the product.
 * @apiSuccess {String} description     Detail description of the product.
 * @apiSuccess {Array} images  Array of the images of the product.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 * {
 *   "Response":
 *   {
 *       "product_id" : "1",
 *       "model" : "Black",
 *       "name" : "HTC Touch HD",
 *       "price" : "100.00",
 *       "currency_code": "UAH"
 *       "quantity" : "83",
 *       "main_image" : "http://site-url/image/catalog/demo/htc_iPhone_1.jpg",
 *       "description" : "Revolutionary multi-touch interface.↵	iPod touch features the same multi-touch screen technology as iPhone.",
 *       "images" :
 *       [
 *           "http://site-url/image/catalog/demo/htc_iPhone_1.jpg",
 *           "http://site-url/image/catalog/demo/htc_iPhone_2.jpg",
 *           "http://site-url/image/catalog/demo/htc_iPhone_3.jpg"
 *       ]
 *   },
 *   "Status" : true,
 *   "version": 1.0
 * }
 * @apiErrorExample Error-Response:
 * {
 *      "Error" : "Can not found product with id = 10",
 *      "version": 1.0,
 *      "Status" : false
 * }
 *
 *
 */
if ($get['route'] == 'module/apimodule/productinfo'){
    header('Content-Type: application/json');
    echo apiGetProductInfo();
}

/**
 * @api {get} api.php?route=module/apimodule/changestatus  ChangeStatus
 * @apiName ChangeStatus
 * @apiGroup All
 *
 * @apiParam {String} comment New comment for order status.
 * @apiParam {Number} order_id unique order ID.
 * @apiParam {Number} status_id unique status ID.
 * @apiParam {Token} token your unique token.
 * @apiParam {Boolean} inform status of the informing client.
 *
 * @apiSuccess {Number} version  Current API version.
 * @apiSuccess {String} name Name of the new status.
 * @apiSuccess {String} date_added Date of adding status.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *   {
 *          "response":
 *              {
 *                  "name" : "Сделка завершена",
 *                  "date_added" : "2016-12-27 12:01:51"
 *              },
 *          "status": true,
 *          "version": 1.0
 *   }
 *
 * @apiErrorExample Error-Response:
 *
 *     {
 *       "error" : "Missing some params",
 *       "version": 1.0,
 *       "Status" : false
 *     }
 *
 */
if ($get['route'] == 'module/apimodule/changestatus' && isset($get['token'])){
    header('Content-Type: application/json');
    echo apiChangeStatus();
}

/**
 * @api api.php?route=Login
 * @apiVersion 0.1.0
 * @apiName Login
 * @apiGroup All
 *
 * @apiParam {String} username User unique username.
 * @apiParam {Number} password User's  password.
 * @apiParam {String} os_type User's device's os_type for firebase notifications.
 * @apiParam {String} device_token User's device's token for firebase notifications.
 *
 * @apiSuccess {Number} version  Current API version.
 * @apiSuccess {String} token  Token.
 * @apiSuccess {String} token  Token.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *   {
 *       "response":
 *       {
 *          "token": "e9cf23a55429aa79c3c1651fe698ed7b",
 *          "version": 1.0,
 *          "status": true
 *       }
 *   }
 *
 * @apiErrorExample Error-Response:
 *
 *     {
 *       "error": "Incorrect username or password",
 *       "version": 1.0,
 *       "Status" : false
 *     }
 *
 */
if ($get['route'] == 'Login' && isset($get['username']) && isset($get['password']) && !isset($get['token']))
{

    $email_address = zen_db_prepare_input($get['username']);
    $password = zen_db_prepare_input($get['password']);
    $loginAuthorized = false;

    // Check if email exists
    $check_customer_query = "SELECT admin_id, admin_pass,
                                    admin_email
                           FROM " . TABLE_ADMIN . "
                           WHERE admin_email = :emailAddress";

    $check_customer_query = $db->bindVars($check_customer_query, ':emailAddress', $email_address, 'string');
    $check_customer = $db->Execute($check_customer_query);
    $customer_id = (int)$check_customer->fields['admin_id'];
    if (!$check_customer->RecordCount()) {
        $error = true;
        $messageStack->add('login', TEXT_LOGIN_ERROR);

        echo json_encode(['error' => 'Incorrect email or password', 'version' => API_VERSION, 'status' => false]);
        return json_encode(['error' => 'Incorrect email or password', 'version' => API_VERSION, 'status' => false]);

    }
    else {
        $dbPassword = $check_customer->fields['admin_pass'];

        // Check whether the password is good
        $check_user_has_token = mysqli_fetch_assoc(mysqli_query($db->link, "SELECT token FROM user_token_mob_api WHERE user_id=$customer_id"));
        if (zen_validate_password($password, $dbPassword)==true && !$check_user_has_token){

            $token = md5(mt_rand());

            $give_token_query = "INSERT INTO user_token_mob_api (user_id, token) VALUES ( $customer_id, '$token')";


            mysqli_query($db->link, $give_token_query);
            if (isset($get['os_type']) && isset($get['device_token'])){
                $os_type = $get['os_type'];
                $device_token =$get['device_token'];

                $device_token_exist_query = "SELECT device_token FROM user_device_mob_api WHERE device_token='$device_token'";
                $device_token_exist = mysqli_fetch_assoc(mysqli_query($db->link, $device_token_exist_query));

                if($device_token_exist == null){
                    $update_device_query = "INSERT INTO user_device_mob_api (user_id, device_token, os_type) VALUES ( $customer_id, '$device_token', '$os_type')";

                    mysqli_query($db->link, $update_device_query);
                }
            }

            echo json_encode(['response' => ['token' => $token], 'version' => API_VERSION, 'status' => true]);
            return json_encode(['response' => ['token' => $token], 'version' => API_VERSION, 'status' => true]);
        }
        elseif (zen_validate_password($password, $dbPassword)==true && $check_user_has_token){



            $update_token_query = "SELECT token FROM user_token_mob_api WHERE user_id='$customer_id'";


            $token = mysqli_fetch_array(mysqli_query($db->link, $update_token_query))[0];
            if (isset($get['os_type']) && isset($get['device_token'])){
                $os_type = $get['os_type'];
                $device_token =$get['device_token'];

                $device_token_exist_query = "SELECT device_token FROM user_device_mob_api WHERE device_token='$device_token'";
                $device_token_exist = mysqli_fetch_assoc(mysqli_query($db->link, $device_token_exist_query));

                if($device_token_exist == null){
                    $update_device_query = "INSERT INTO user_device_mob_api (user_id, device_token, os_type) VALUES ( $customer_id, '$device_token', '$os_type')";

                    mysqli_query($db->link, $update_device_query);
                }
            }

            echo json_encode(['response' => ['token' => $token], 'version' => API_VERSION, 'status' => true]);
            return json_encode(['response' => ['token' => $token], 'version' => API_VERSION, 'status' => true]);
        }
        else{
            echo json_encode(['error' => 'Incorrect email or password', 'version' => API_VERSION, 'status' => false]);
            return json_encode(['error' => 'Incorrect email or password', 'version' => API_VERSION, 'status' => false]);
        }


    }
}

/**
 * @api {get} api.php?route=module/apimodule/categories  GetCategories
 * @apiName GetCategories
 * @apiGroup All
 *
 * @apiParam {Token} token your unique token.
 *
 * @apiSuccess {Number} version  Current API version.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *   {
 *          "status": true,
 *          "version": 2.0
 *   }
 *
 * @apiErrorExample Error-Response:
 *
 *     {
 *       "error" : "Not any category found",
 *       "version": 2.0,
 *       "Status" : false
 *     }
 *
 */
if ($get['route'] == 'module/apimodule/categories'){
    header('Content-Type: application/json');
    echo apiGetCategories();
}

/**
 * @api {get} api.php?route=module/apimodule/updateproduct  updateProduct
 * @apiName updateProduct
 * @apiGroup All
 *
 * @apiParam {Token} token your unique token.
 * @apiParam {Number} product_id unique product ID.
 * @apiParam {Number} price price of the product.
 * @apiParam {String} name name of the product.
 * @apiParam {Number} quantity quantity of the product.
 * @apiParam {String} description description of the product.
 * @apiParam {String} model product model.
 * @apiParam {Number} client_id unique client ID.
 * @apiParam {Number} status product is enabled or disabled.
 * @apiParam {File} images main image of the product.
 *
 * @apiSuccess {Number} version  Current API version.
 * @apiSuccess {Boolean} status  status of the process.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 * {
 *   "Status" : true,
 *   "version": 2.0
 * }
 * @apiErrorExample Error-Response:
 * {
 *      "Error" : "Not one product found",
 *      "version": 2.0,
 *      "Status" : false
 * }
 *
 *
 */
if ($get['route'] == 'module/apimodule/updateproduct'){
    header('Content-Type: application/json');
    if ($get['product_id'] != 0){
        echo apiUpdateProduct();
    }
    else {
        echo apiCreateProduct();
    }
}

/**
 * @api {get} api.php?route=module/apimodule/mainImage  mainImage
 * @apiName mainImage
 * @apiGroup All
 *
 * @apiParam {Token} token your unique token.
 * @apiParam {Number} product_id unique product ID.
 * @apiParam {File} images main image of the product.
 *
 * @apiSuccess {Number} version  Current API version.
 * @apiSuccess {Boolean} status  status of the process.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 * {
 *   "Status" : true,
 *   "version": 2.0
 * }
 * @apiErrorExample Error-Response:
 * {
 *      "Error" : "No one product found",
 *      "version": 2.0,
 *      "Status" : false
 * }
 *
 *
 */
if ($get['route'] == 'module/apimodule/mainImage'){
    header('Content-Type: application/json');
    echo apiMainImage();
}

/**
 * @api {get} api.php?route=module/apimodule/deleteImage  deleteImage
 * @apiName deleteImage
 * @apiGroup All
 *
 * @apiParam {Token} token your unique token.
 * @apiParam {Number} product_id unique product ID.
 *
 * @apiSuccess {Number} version  Current API version.
 * @apiSuccess {Boolean} status  status of the process.
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 * {
 *   "Status" : true,
 *   "version": 2.0
 * }
 * @apiErrorExample Error-Response:
 * {
 *      "Error" : "No one product found",
 *      "version": 2.0,
 *      "Status" : false
 * }
 *
 *
 */
if ($get['route'] == 'module/apimodule/deleteImage'){
    header('Content-Type: application/json');
    echo apiDeleteImage();
}








function apiGetClients(){
    $get = $_REQUEST;
    global $db;

    if (validToken($get['token'])){
        //echo json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
        return json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
    }

    else {
        if(!isset($get['limit'])) {
            $get['limit'] = 10;
        }
        if(!isset($get['page'])){
            $get['page'] = 1;
        }

        $orders_on_page = $get['limit'] * $get['page'] - $get['limit'];
        $limit_per_page = $get['limit'];

        $filters = array();

        if (($get['fio']))
            $filters['fio'] = $get['fio'];
        if (($get['sort'])) {
            if($get['sort'] == 'sum'){
                $filters['sort'] = 'sum';
            }
            else if($get['sort'] == 'quantity'){
                $filters['sort'] = 'quantity';
            }
            else if($get['sort'] == 'date_added'){
                $filters['sort'] = 'c.customers_id';
            }

        }
        $clients = array();
        $sql = "SELECT c.customers_id as client_id, 
         CONCAT(c.customers_firstname, ' ', c.customers_lastname) as fio, 
         o.currency as currency_code 
        FROM customers c 
        INNER JOIN orders o ON c.customers_id=o.customers_id 
        WHERE c.customers_id>0 ";


        if (isset($filters['fio'])){
            $name = explode(' ', $filters['fio']);
            $sql .= "AND c.customers_firstname LIKE \"%$name[0]%\" AND c.customers_lastname LIKE \"%$name[1]%\" ";
        }

        if ($filters['sort'] == 'c.customers_id'){
            $sort = $filters['sort'];
            $sql .= "ORDER BY $sort ";
        }


        $sql .= "LIMIT $orders_on_page, $limit_per_page ";

        $orders_query = mysqli_query($db->link, $sql);

        $i = 0;
        while ($row = $orders_query->fetch_assoc()) {

            if($row['currency_code']){

                $client_id = $row['client_id'];
                $row['total'] = mysqli_fetch_row(mysqli_query($db->link, "SELECT SUM(order_total) FROM orders WHERE customers_id=$client_id"))[0];
                $row['quantity'] = mysqli_fetch_row(mysqli_query($db->link, "SELECT COUNT(order_total) FROM orders WHERE customers_id=$client_id"))[0];
                if ($client_id != $clients[$i-1]['client_id']) {
                    array_push($clients, $row);
                    $i++;
                }
            }

        }


    }
    if ($filters['sort'] == 'sum') {


        for ($j = 0; $j < count($clients) - 1; $j++){
            for ($i = 0; $i < count($clients) - $j - 1; $i++){

                if ($clients[$i]['total'] > $clients[$i+1]['total']){

                    $tmp_var = $clients[$i+1]['total'];
                    $clients[$i+1]['total'] = $clients[$i]['total'];
                    $clients[$i]['total'] = $tmp_var;
                }
            }
        }
    }
    else if ($filters['sort'] == 'quantity') {
        for ($j = 0; $j < count($clients) - 1; $j++){
            for ($i = 0; $i < count($clients) - $j - 1; $i++){

                if ($clients[$i]['quantity'] > $clients[$i+1]['quantity']){

                    $tmp_var = $clients[$i+1]['quantity'];
                    $clients[$i+1]['quantity'] = $clients[$i]['quantity'];
                    $clients[$i]['quantity'] = $tmp_var;
                }
            }
        }

    }

    if($clients[0]['client_id'] != null) {


        $response = (['response' => ['clients' => ($clients)],
            'status' => true,
            'version' => API_VERSION]);


        $end = json_encode($response);

        //header('Content-Type: application/json');
        //echo($end);
        return $end;
    }
    else {
        //header('Content-Type: application/json');
        //echo json_encode(['status' => false, 'version' => API_VERSION]);
        return json_encode(['status' => false, 'version' => API_VERSION]);
    }

}

function apiDeleteDeviceToken(){
    $get = $_REQUEST;
    global $db;

    $old_token = $get['old_token'];
    if(mysqli_fetch_array(mysqli_query($db->link, "SELECT * FROM user_device_mob_api WHERE device_token='$old_token'"))){
        mysqli_query($db->link, "DELETE FROM user_device_mob_api WHERE device_token='$old_token'");
        //echo json_encode(['response' => ["status" => true, 'version' => API_VERSION]]);
        return json_encode(['response' => ["status" => true, 'version' => API_VERSION]]);
    }
    else{
        //echo json_encode(['error' => 'Missing some params', 'version' => API_VERSION, 'status' => false]);
        return json_encode(['error' => 'Missing some params', 'version' => API_VERSION, 'status' => false]);
    }
}

function apiUpdateDeviceToken(){
    $get = $_REQUEST;
    global $db;

    $old_token = $get['old_token'];
    $new_token = $get['new_token'];
    if(mysqli_fetch_array(mysqli_query($db->link, "SELECT * FROM user_device_mob_api WHERE device_token='$old_token'"))){
        mysqli_query($db->link, "UPDATE user_device_mob_api SET device_token='$new_token' WHERE device_token='$old_token'");
        //echo json_encode(['response' => ["status" => true, 'version' => API_VERSION]]);
        return json_encode(['response' => ["status" => true, 'version' => API_VERSION]]);
    }
    else{
        //echo json_encode(['error' => 'Missing some params', 'version' => API_VERSION, 'status' => false]);
        return json_encode(['error' => 'Missing some params', 'version' => API_VERSION, 'status' => false]);
    }
}

function apiGetOrders(){
    $get = $_REQUEST;
    global $db;

    if (validToken($get['token'])){
        //echo json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
        return json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
    }

    else {
        if(!isset($get['limit'])) {
            $get['limit'] = 10;
        }
        if(!isset($get['page'])){
            $get['page'] = 1;
        }

        $orders_on_page = $get['limit'] * $get['page'] - $get['limit'];
        $limit_per_page = $get['limit'];

        $filters = array();
        $statuses = getStatuses();

        if (($get['fio']))
            $filters['fio'] = $get['fio'];
        if (($get['order_status_id']))
            $filters['order_status_id'] = $get['order_status_id'];
        if (($get['min_price']))
            $filters['min_price'] = $get['min_price'];
        if ($get['max_price'])
            $filters['max_price'] = $get['max_price'];
        if (($get['date_min']))
            $filters['date_min'] = $get['date_min'];
        if (($get['date_max']))
            $filters['date_max'] = $get['date_max'];

        $orders = array();
        $sql = "SELECT o.orders_id as order_id, 
        o.orders_id as order_number, 
        o.customers_name as fio, 
        s.orders_status_name as status, 
        o.order_total as total, 
        o.date_purchased as date_added, 
        o.currency as currency_code 
        FROM orders o ";
        $sql .= "INNER JOIN orders_status s ON o.orders_status=s.orders_status_id WHERE o.orders_id>0 ";


        if (($filters['fio'])){
            $name = $filters['fio'];
            $sql .= "AND o.customers_name LIKE '%$name%' ";
        }

        if (($filters['order_status_id'])){
            $status_name  = $filters['order_status_id'];
            //$status_id_to_name = mysqli_fetch_row(mysqli_query($db->link, "SELECT orders_status_id FROM orders_status WHERE orders_status_name='$status_name'"))[0];

            $sql .= "AND o.orders_status=$status_name ";
        }

        if (($filters['min_price'])){
            $filter_status_id = $filters['min_price'];
            $sql .= "AND o.order_total>$filter_status_id ";
        }

        if (($filters['max_price'])){
            $status_id = $filters['max_price'];
            $sql .= "AND o.order_total<$status_id ";
        }

        if (($filters['date_min'])){
            $status_id = date('y-m-d', strtotime($filters['date_min']));
            $sql .= "AND DATE_FORMAT(o.date_purchased,'%y-%m-%d') >= '$status_id' ";
        }

        if (($filters['date_max'])){
            $status_id = date('y-m-d', strtotime($filters['date_max']));
            $sql .= "AND DATE_FORMAT(o.date_purchased,'%y-%m-%d') <= '$status_id' ";
        }

        $sql .= "LIMIT $orders_on_page, $limit_per_page ";

        $orders_query = mysqli_query($db->link, $sql);



        while ($row = $orders_query->fetch_assoc()) {
            array_push($orders, $row);
        }

        if($orders) {

            $total_quantity = mysqli_fetch_row(mysqli_query($db->link, "SELECT COUNT(*) FROM orders"))[0];
            $max_price = mysqli_fetch_row(mysqli_query($db->link, "SELECT MAX(order_total) FROM orders"))[0];

            $response = (['response' => ['orders' => ($orders),
                'statuses' => ($statuses),
                'currency_code' => getCurrency(),
                'total_quantity' => (int)$total_quantity,
                'total_sum' => getTotalSum(),
                'max_price' => $max_price],
                'status' => true,
                'version' => API_VERSION]);


            $end = json_encode($response);

            header('Content-Type: application/json');
            //echo($end);
            return $end;
        }
        else {
            header('Content-Type: application/json');
            //echo json_encode(['status' => false, 'version' => API_VERSION]);
            return json_encode(['status' => false, 'version' => API_VERSION]);
        }

    }
}

function apiGetStatistic(){
    $get = $_REQUEST;
    global $db;

    if (validToken($get['token'])){
        //echo json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
        return json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
    }
    else {
        $orders = array();
        $xAxis = array();
        $clients = array();
        if (!isset($get['filter']))
            $get['filter'] = 'day';
        if (isset($get['filter']) && ($get['filter'] == 'day' || $get['filter'] == 'week' || $get['filter'] == 'month' || $get['filter'] == 'year')) {
            if ($get['filter'] == 'day') {
                for ($i = 0; $i < 24; $i++) {
                    array_push($xAxis, $i);
                    array_push($orders, mysqli_num_rows(mysqli_query($db->link, "SELECT * FROM orders WHERE DAY (date_purchased)= DAY (NOW()) AND HOUR (date_purchased) = $i")));
                    array_push($clients, mysqli_num_rows(mysqli_query($db->link, "SELECT * FROM customers_info WHERE DAY(customers_info_date_account_created)=DAY(NOW()) AND HOUR(customers_info_date_account_created) = $i")));
                }
            }
            if ($get['filter'] == 'week') {

                for ($i = 1; $i <= 7; $i++) {
                    array_push($xAxis, $i);
                    array_push($orders, mysqli_num_rows(mysqli_query($db->link, "SELECT * FROM orders WHERE WEEKOFYEAR(date_purchased)=WEEKOFYEAR(NOW()) AND WEEKDAY(date_purchased) = $i-1")));
                    array_push($clients, mysqli_num_rows(mysqli_query($db->link, "SELECT * FROM customers_info WHERE WEEKOFYEAR(customers_info_date_account_created)=WEEKOFYEAR(NOW()) AND WEEKDAY(customers_info_date_account_created) = $i-1")));
                }
            }
            if ($get['filter'] == 'month') {
                $days = date('t');
                for ($i = 1; $i <= $days; $i++) {
                    array_push($xAxis, $i);
                    array_push($orders, mysqli_num_rows(mysqli_query($db->link, "SELECT * FROM orders WHERE MONTH (date_purchased)=MONTH (NOW()) AND DAY (date_purchased) = $i")));
                    array_push($clients, mysqli_num_rows(mysqli_query($db->link, "SELECT * FROM customers_info WHERE MONTH (customers_info_date_account_created)=MONTH (NOW()) AND DAY (customers_info_date_account_created) = $i")));
                }
            }
            if ($get['filter'] == 'year') {
                for ($i = 1; $i <= 12; $i++) {
                    array_push($xAxis, $i);
                    array_push($orders, mysqli_num_rows(mysqli_query($db->link, "SELECT * FROM orders WHERE YEAR(date_purchased)=YEAR(NOW()) AND MONTH (date_purchased) = $i")));
                    array_push($clients, mysqli_num_rows(mysqli_query($db->link, "SELECT * FROM customers_info WHERE YEAR (customers_info_date_account_created)=YEAR (NOW()) AND MONTH (customers_info_date_account_created) = $i")));
                }
            }
            $total_sales = getTotalSum();
            $sale_year_total = mysqli_fetch_row(mysqli_query($db->link, "SELECT SUM(order_total) FROM orders WHERE YEAR(date_purchased)=YEAR(NOW())"))[0];
            $currency = getCurrency();
            $orders_total = mysqli_fetch_row(mysqli_query($db->link, "SELECT COUNT(*) FROM orders"))[0];
            $clients_total = mysqli_fetch_row(mysqli_query($db->link, "SELECT COUNT(*) FROM customers"))[0];



//            echo json_encode(["response" => ['xAxis' => $xAxis, 'clients' => $clients, 'orders' => $orders, 'total_sales' => $total_sales,
//                'sale_year_total' => $sale_year_total, 'currency_code' => $currency, 'orders_total' => $orders_total,
//                'clients_total' => $clients_total],
//                "status" => true, 'version' => API_VERSION]);
            return json_encode(["response" => ['xAxis' => $xAxis, 'clients' => $clients, 'orders' => $orders, 'total_sales' => $total_sales,
                'sale_year_total' => $sale_year_total, 'currency_code' => $currency, 'orders_total' => $orders_total,
                'clients_total' => $clients_total],
                "status" => true, 'version' => API_VERSION]);
        }
        else{

            //echo json_encode(['error' => 'unknown filter set', 'status' => false, 'version' => API_VERSION]);
            return json_encode(['error' => 'unknown filter set', 'status' => false, 'version' => API_VERSION]);
        }

    }

}

function apiGetOrderInfo(){
    $get = $_REQUEST;
    global $db;

    if (validToken($get['token'])){

        //echo json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
        return json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
    }
    else if (isset($get['order_id'])){
        $order_id = $get['order_id'];
        $sql = "SELECT o.orders_id as order_number,
         o.currency as currency_code,
         o.customers_name as fio, 
         o.customers_email_address as email,
         o.customers_telephone as telephone, 
         o.date_purchased as date_add, 
         o.order_total as total, 
         s.orders_status_name as status FROM orders o 
         INNER JOIN orders_status s ON o.orders_status=s.orders_status_id 
         WHERE o.orders_id=$order_id";

        $order_info = array();

        $order = (mysqli_query($db->link, $sql));
        $order_info = mysqli_fetch_assoc($order);
        if ($order_info) {
            $order_info['statuses'] = getStatuses();
            $response = json_encode(['response' => $order_info, 'status' => true, 'version' => API_VERSION]);
        }
        else {
            $response = json_encode(['error' => "cannot find order with id = $order_id", 'status' => false, 'version' => API_VERSION]);
        }

        //echo $response;
        return $response;
    }
    else{
        $response = json_encode(['error' => "cannot find order with id = 0", 'status' => false, 'version' => API_VERSION]);

        //echo $response;
        return $response;
    }
}

function apiGetPaymentAndDelivery(){
    $get = $_REQUEST;
    global $db;

    if (validToken($get['token'])){

        //echo json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
        return json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
    }
    else {
        if (isset($get['order_id'])) {
            $order_id = $get['order_id'];
            $sql = "SELECT payment_method, 
            shipping_method, 
            delivery_street_address, 
            delivery_city, 
            delivery_state, 
            delivery_country FROM orders 
             WHERE orders_id=$order_id";

            $orders_info = array();

            $order = mysqli_fetch_assoc(mysqli_query($db->link, $sql));
            $orders_info['payment_method'] = $order['payment_method'];
            $orders_info['shipping_method'] = $order['shipping_method'];
            $orders_info['shipping_address'] = $order['delivery_street_address'] . ', '
                . $order['delivery_city'] . ', '
                . $order['delivery_state'] . ', '
                . $order['delivery_country'] . '.';

            if ($orders_info['payment_method']) {

                $response = json_encode(['response' => $orders_info, 'status' => true, 'version' => API_VERSION]);
            } else {
                $response = json_encode(['error' => "cannot find order with id = $order_id", 'status' => false, 'version' => API_VERSION]);
            }

            //echo $response;
            return $response;
        }

        else{
            $response = json_encode(['error' => "cannot find order with id = 0", 'status' => false, 'version' => API_VERSION]);

            //echo $response;
            return $response;
        }
    }
}

function apiGetOrderProducts(){
    $get = $_REQUEST;
    global $db;

    if (validToken($get['token'])){

        //echo json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
        return json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
    }
    else if (isset($get['order_id'])){
        $order_id = $get['order_id'];
        $sql1 = "SELECT p.products_image as image, 
        o.products_name as name, 
        o.products_model as model,
        o.products_quantity as quantity, 
        o.products_price as price, 
        o.products_id as product_id
        FROM orders_products o 
         INNER JOIN products p ON p.products_id=o.products_id
         WHERE o.orders_id=$order_id";

        $order_info = array();

        $order = (mysqli_query($db->link, $sql1));
        $i = 0;
        while ($row = $order->fetch_assoc()) {
            array_push($order_info, $row);
            $order_info[$i]['image'] = 'http://'.$_SERVER['SERVER_NAME'].'/images/'.$order_info[$i]['image'];
            $i++;
        }
        if ($order_info) {

            $total_order_price = array();
            $total_order_price['total_discount'] = 0;
            $total_order_price['total_price'] = mysqli_fetch_array(mysqli_query($db->link, "SELECT SUM(final_price*products_quantity) FROM orders_products WHERE orders_id=$order_id "))[0];
            $total_order_price['currency_code'] = mysqli_fetch_array(mysqli_query($db->link, "SELECT currency FROM orders WHERE orders_id=$order_id"))[0];
            $total_order_price['shipping_price'] = mysqli_fetch_array(mysqli_query($db->link, "SELECT o.order_total-SUM(p.final_price*p.products_quantity) FROM orders o INNER JOIN orders_products p ON o.orders_id=p.orders_id WHERE o.orders_id=$order_id"))[0];
            $total_order_price['total'] = mysqli_fetch_array(mysqli_query($db->link, "SELECT order_total FROM orders WHERE orders_id=$order_id"))[0];

            $response = json_encode(['response' => ['products' => $order_info, 'total_order_price' => $total_order_price], 'status' => true, 'version' => API_VERSION]);
        }
        else {
            $response = json_encode(['error' => "cannot find order with id = $order_id", 'status' => false, 'version' => API_VERSION]);
        }

        //echo $response;
        return $response;
    }
    else{
        $response = json_encode(['error' => "cannot find order with id = 0", 'status' => false, 'version' => API_VERSION]);

        //echo $response;
        return $response;
    }
}

function apiGetOrderHistory(){
    $get = $_REQUEST;
    global $db;

    if (validToken($get['token'])){

        //echo json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
        return json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
    }
    else {
        if (isset($get['order_id'])){
            $order_id = $get['order_id'];

            $sql = "SELECT h.orders_status_name as name, 
             s.orders_status_id as order_status_id, 
             s.date_added as date_add, 
             s.comments as comment FROM orders_status h 
             INNER JOIN orders_status_history s ON h.orders_status_id=s.orders_status_id 
             WHERE s.orders_id=$order_id";

            $order_info = array();
            $order_info['orders'] = array();

            $history_query = (mysqli_query($db->link, $sql));

            while ($row = $history_query->fetch_assoc()){

                array_push($order_info['orders'], $row);
            }

            if ($order_info['orders'][0]) {
                $order_info['statuses'] = getStatuses();
                $response = json_encode(['response' => $order_info, 'status' => true, 'version' => API_VERSION]);
            }
            else {
                $response = json_encode(['error' => "cannot find order with id = $order_id", 'status' => false, 'version' => API_VERSION]);
            }

            //echo $response;
            return $response;
        }
        else{
            $response = json_encode(['error' => "cannot find order with id = ", 'status' => false, 'version' => API_VERSION]);

            //echo $response;
            return $response;
        }
    }
}

function apiGetClientInfo(){
    $get = $_REQUEST;
    global $db;

    if (validToken($get['token'])){
        echo json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
        return json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
    }

    else {
        $client_id = $get['client_id'];


        $sql = "SELECT c.customers_id as client_id, 
         CONCAT(c.customers_firstname, ' ', c.customers_lastname) as fio, 
         SUM(o.order_total) total,
         COUNT(o.order_total) quantity,
         c.customers_email_address as email,
         c.customers_telephone as telephone,
         (SELECT COUNT(*) FROM orders WHERE orders_status=3 AND customers_id=$client_id  ) as completed,
         o.currency as currency_code
        FROM customers c 
        INNER JOIN orders o ON c.customers_id=o.customers_id 
        WHERE c.customers_id=$client_id";

        $client = mysqli_fetch_assoc(mysqli_query($db->link, $sql));

        if($client['total']) {

            $response = (['response' => $client,
                'status' => true,
                'version' => API_VERSION]);


            $end = json_encode($response);

            echo($end);
            return $end;
        }
        else {

            echo json_encode(['status' => false, 'version' => API_VERSION]);
            return json_encode(['status' => false, 'version' => API_VERSION]);
        }
    }
}

function apiGetClientOrders(){
    $get = $_REQUEST;
    global $db;

    if (validToken($get['token'])){
        echo json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
        return json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
    }

    else {
        $client_id = $get['client_id'];

        $filters = '';

        if (isset($get['sort'])) {
            if($get['sort'] == 'total'){
                $filter = 'o.order_total';
            }
            else if($get['sort'] == 'date_added'){
                $filter = 'date_added';
            }
            else if($get['sort'] == 'completed'){
                $filter = 'o.orders_id';
            }

        }
        $orders = array();
        $sql = "SELECT o.orders_id as order_id, 
         o.orders_id as order_number, 
         s.orders_status_name as status, 
         o.currency as currency_code,
         o.order_total as total, 
         o.date_purchased as date_added
        FROM orders o 
        INNER JOIN orders_status s ON o.orders_status=s.orders_status_id 
        WHERE o.customers_id=$client_id ";
        if($filter)
            $sql .= "ORDER BY $filter DESC";

        $orders_query = mysqli_query($db->link, $sql);



        while ($row = $orders_query->fetch_assoc()) {
            array_push($orders, $row);
        }

        if($orders[0]['order_id'] != null) {


            $response = (['response' => ['orders' => ($orders)],
                'status' => true,
                'version' => API_VERSION]);


            $end = json_encode($response);

            echo($end);
            return $end;
        }
        else {

            echo json_encode(['status' => false, 'version' => API_VERSION]);
            return json_encode(['status' => false, 'version' => API_VERSION]);
        }
    }
}

function apiGetProducts(){
    $get = $_REQUEST;
    global $db;

    if (validToken($get['token'])){

        //echo json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
        return json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
    }
    else{

        if(!isset($get['limit'])) {
            $get['limit'] = 10;
        }
        if(!isset($get['page'])){
            $get['page'] = 1;
        }

        $orders_on_page = $get['limit'] * $get['page'] - $get['limit'];
        $limit_per_page = $get['limit'];

        $sql = "SELECT p.products_image as image, 
        d.products_name as name, 
        p.products_model as model,
        p.products_quantity as quantity, 
        p.products_price as price, 
        p.products_id as product_id,
        c.categories_name as category
        FROM ".TABLE_PRODUCTS." p 
        INNER JOIN ".TABLE_PRODUCTS_DESCRIPTION." d ON p.products_id=d.products_id 
        INNER JOIN ".TABLE_CATEGORIES_DESCRIPTION." c ON p.master_categories_id=c.categories_id ";

        if(isset($get['name'])){
            $name = trim($get['name']);
            $sql .= "WHERE d.products_name LIKE '%$name%' ";
        }
        $sql .= "LIMIT $orders_on_page, $limit_per_page ";

        $products = array();

        $product = (mysqli_query($db->link, $sql));
        $i = 0;
        while ($row = $product->fetch_assoc()) {
            array_push($products, $row);
            $products[$i]['image'] = 'http://'.$_SERVER['SERVER_NAME'].'/images/'.$products[$i]['image'];
            $products[$i]['currency_code'] = getCurrency();
            $i++;
        }

        if ($products) {

            $response = json_encode(['response' => ['products' => $products], 'status' => true, 'version' => API_VERSION]);
        }
        else {
            $response = json_encode(['error' => "Not one product not found", 'status' => false, 'version' => API_VERSION]);
        }

        //echo $response;
        return $response;

    }
}

function apiGetProductInfo(){
    $get = $_REQUEST;
    global $db;

    if (validToken($get['token'])){

        //echo json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
        return json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
    }
    else{

        $product_id = $get['product_id'];

        $sql = "SELECT  
        p.products_image as main_image,
        d.products_name as name, 
        p.products_model as model,
        p.products_quantity as quantity, 
        p.products_price as price, 
        p.products_id as product_id,
        p.master_categories_id as category_id,
        d.products_description as description,
        c.categories_name as category_name,
        p.products_status as status,
        p.products_id as sku
        FROM ".TABLE_PRODUCTS." p 
        INNER JOIN ".TABLE_PRODUCTS_DESCRIPTION." d ON p.products_id=d.products_id 
        INNER JOIN ".TABLE_CATEGORIES_DESCRIPTION." c ON p.master_categories_id=c.categories_id
        WHERE p.products_id=$product_id";


        $products = array();
        $products['images'] = array();
        $product = (mysqli_query($db->link, $sql));

        if ($row = $product->fetch_assoc()) {
            array_push($products, $row);
            $products[0]['main_image'] = 'http://'.$_SERVER['SERVER_NAME'].'/images/'.$products[0]['main_image'];
            $products[0]['images'][0]['image'] = $products[0]['main_image'];
            $products[0]['images'][0]['image_id'] = $products[0]['main_image'];
            $products[0]['currency_code'] = getCurrency();
            $products[0]['description'] = strip_tags($products[0]['description']);
            $products[0]['stock_statuses'] = array();
            if ($products[0]['quantity']){
                $products[0]['stock_statuses'][0]['status_id'] = 1;
                $products[0]['stock_statuses'][0]['name'] = 'In Stock';
            }
            else {
                $products[0]['stock_statuses'][0]['id'] = 0;
                $products[0]['stock_statuses'][0]['name'] = 'Out Of Stock';
            }
            $products[0]['stock_status_name'] = $products[0]['stock_statuses'][0]['name'];


            $products[0]['categories'] = array();

            $products[0]['categories'][0]['category_id'] = $products[0]['category_id'];
            $products[0]['categories'][0]['name'] = $products[0]['category_name'];
            $sql_category = "SELECT * FROM ".TABLE_CATEGORIES." WHERE parent_id=".$products[0]['category_id'];
            $products[0]['categories'][0]['parent'] = false;
            if (mysqli_fetch_assoc(mysqli_query($db->link, $sql_category))){
                $products[0]['categories'][0]['parent'] = true;
            }

            unset($products[0]['category_id']);
            unset($products[0]['category_name']);
            unset($products[0]['main_image']);

            $response = json_encode(['response' => $products[0], 'status' => true, 'version' => API_VERSION]);

        }


        else {
            $response = json_encode(['error' => "Not one product not found", 'status' => false, 'version' => API_VERSION]);
        }

        //echo $response;
        return $response;

    }
}

function apiChangeStatus(){
    $get = $_REQUEST;
    global $db;

    if (validToken($get['token'])){

        //echo json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
        return json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
    }
    else{
        $comment = '';
        $order_id = $get['order_id'];
        $status_id = $get['status_id'];
        $inform = 0;
        if(isset ($get['inform'])){
            $inform = $get['inform'];
        }

        if(isset ($get['comment'])){
            $comment = $get['comment'];
        }
        $query_update_order_status = "UPDATE ".TABLE_ORDERS." SET orders_status=$status_id WHERE orders_id=$order_id";
        $query_update_status_history = "INSERT INTO ".TABLE_ORDERS_STATUS_HISTORY." (orders_id, orders_status_id, date_added, customer_notified, comments)
                                        VALUES ($order_id, $status_id, NOW(), $inform, '$comment')";

        $update_status = mysqli_query($db->link, $query_update_order_status);
        $update_status_history = mysqli_query($db->link, $query_update_status_history);

        if ($update_status && $update_status_history){
            $query_answer = "SELECT s.orders_status_name as name, h.date_added as date_added FROM ".TABLE_ORDERS_STATUS_HISTORY." h INNER JOIN ".TABLE_ORDERS_STATUS." s ON h.orders_status_id=s.orders_status_id WHERE h.orders_id=$order_id ORDER BY h.orders_status_history_id DESC LIMIT 1";

            $answer = mysqli_fetch_assoc(mysqli_query($db->link, $query_answer));

            $response = json_encode(['response' => $answer, 'status' => true, 'version' => API_VERSION]);
        }
        else {
            $response = json_encode(['error' => "Missing some params", 'status' => false, 'version' => API_VERSION]);
        }

        //echo $response;
        return $response;

    }
}

function apiChangeOrderDelivery(){
    $get = $_REQUEST;
    global $db;

    {
        $token = $get['token'];
        $order_id = (int)$get['order_id'];
        $city = mysqli_fetch_row(mysqli_query($db->link, "SELECT delivery_city FROM orders WHERE orders_id=$order_id"))[0];
        $address = mysqli_fetch_row(mysqli_query($db->link, "SELECT delivery_address FROM orders WHERE orders_id=$order_id"))[0];

        if (isset($get['city']))
            $city = $get['city'];
        if (isset($get['address']))
            $address = $get['address'];

        if (validToken($token) == null) {
            if (mysqli_fetch_array(mysqli_query($db->link, "SELECT * FROM orders  WHERE orders_id=$order_id"))) {
                $change_order_delivery_query = "UPDATE orders SET delivery_street_address='$address', delivery_city='$city' WHERE orders_id=$order_id";

                $query = mysqli_query($db->link, $change_order_delivery_query);


                //echo json_encode(['status' => true, 'version' => API_VERSION]);
                return json_encode(['status' => true, 'version' => API_VERSION]);
            } else {

                //echo json_encode(['error' => 'Can not change the address', 'status' => false, 'version' => API_VERSION]);
                return json_encode(['error' => 'Can not change the address', 'status' => false, 'version' => API_VERSION]);
            }
        } else {

            //echo json_encode(['error' => validToken($token), 'status' => false, 'version' => API_VERSION]);

            return json_encode(['error' => validToken($token), 'status' => false, 'version' => API_VERSION]);
        }
    }
}



function apiGetCategories(){
    $get = $_REQUEST;
    global $db;

    if (validToken($get['token'])){
        //echo json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
        return json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
    }
    else{
        $sql = "SELECT categories_id as category_id, categories_name as name FROM ".TABLE_CATEGORIES_DESCRIPTION;

        $get_categories = mysqli_query($db->link, $sql);
        $categories = array();
        $i = 0;
        while ($row = $get_categories->fetch_assoc()){
            array_push($categories, $row);
            $sql_category = "SELECT * FROM ".TABLE_CATEGORIES." WHERE parent_id=".$categories[$i]['id'];
            $categories[$i]['parent'] = false;
            if (mysqli_fetch_assoc(mysqli_query($db->link, $sql_category))){
                $categories[$i]['parent'] = true;
            }
            $i++;
        }

        if ($categories){
            $response = json_encode(['response' => ['categories' => $categories], 'status' => true, 'version' => API_VERSION]);
        }
        else{
            $response = json_encode(['error' => 'there is not any categories', 'status' => true, 'version' => API_VERSION]);
        }

        return $response;
    }
}

function apiUpdateProduct(){
    $get = $_REQUEST;
    global $db;

    if (validToken($get['token'])){

        //echo json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
        return json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
    }
    else{

        $product_id = $get['product_id'];

        if (isset($get['price']))
            $product_price = $get['price'];

        $product_name = $get['name'];

        if (isset($get['quantity']))
            $product_quantity = $get['quantity'];

        if (isset($get['description']))
            $product_description = $get['description'];

        if (isset($get['model']))
            $product_model = $get['model'];

        if (isset($get['status']))
            $product_status = $get['status'];
        
        $product_category = $get['categories'];

        if (isset($_FILES['images'])) {
            $old_image_name = mysqli_fetch_row($db->link, "SELECT products_image FROM products WHERE products_id=$product_id")[0];

            unlink($old_image_name);

            $product_image = $_FILES['images']['name'];
            $product_image_name = $product_image;
        }


        $sql_first = "Update ".TABLE_PRODUCTS." Set
        master_categories_id=$product_category";

        if (isset($get['model']))
            $sql_first .= ", products_model='$product_model'";

        if (isset($get['quantity']))
                $sql_first .= ", products_quantity=$product_quantity";

        if (isset($get['price']))
            $sql_first .= ", products_price=$product_price";

        if (isset($get['status']))
            $sql_first.= ", products_status=$product_status";

        if (isset($_FILES['images'])){
            $sql_first .= ", products_image='$product_image_name'";
        }

        $sql_first .= " Where products_id=$product_id";
        
        $stat_first = mysqli_query($db->link, $sql_first);

        $sql_second = "Update ".TABLE_PRODUCTS_DESCRIPTION." Set 
        products_name='$product_name'";

        if (isset($get['description']))
            $sql_second .= ", products_description='$product_description'";

        $sql_second .= " Where products_id=$product_id";

        $stat_second = mysqli_query($db->link, $sql_second);


        if (isset ($_FILES['images'])) {
            $tmp_name = $_FILES['images']['tmp_name'];
            move_uploaded_file($tmp_name, DIR_WS_IMAGES.$product_image_name);
        }

        if ($stat_first && $stat_second) {

            $response = json_encode(['status' => true, 'version' => API_VERSION]);

        }


        else {
            $response = json_encode(['error' => "Can not found product with id = $product_id", 'status' => false, 'version' => API_VERSION]);
        }

        //echo $response;
        return $response;

    }
}

function apiCreateProduct(){
    $get = $_REQUEST;
    global $db;

    if (validToken($get['token'])){

        //echo json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
        return json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
    }
    else{

        if (isset($get['price']))
            $product_price = $get['price'];
        else
            $product_price = 0;

        $product_name = $get['name'];

        if (isset($get['quantity']))
            $product_quantity = $get['quantity'];
        else
            $product_quantity = 0;

        if (isset($get['description']))
            $product_description = $get['description'];
        else
            $product_description = null;

        if (isset($get['model']))
            $product_model = $get['model'];
        else
            $product_model = null;

        if (isset($get['status']))
            $product_status = $get['status'];
        else
            $product_status = 0;

        $product_category = $get['categories'];

        if (isset($_FILES['images'])) {
            $product_image = $_FILES['images']['name'];
            $product_image_name = $product_image;

        }
        else{
            $product_image_name = null;
        }



        $sql_first = "Insert into ".TABLE_PRODUCTS." (products_model, products_quantity, products_price, master_categories_id, products_status, products_image) Values
        ('$product_model',
        $product_quantity,
        $product_price,
        $product_category,
        $product_status,
        '$product_image_name')";

        $stat_first = mysqli_query($db->link, $sql_first);

        $product_id = mysqli_fetch_row(mysqli_query($db->link, "SELECT MAX(products_id) FROM ".TABLE_PRODUCTS))[0];

        $sql_second = "Insert into ".TABLE_PRODUCTS_DESCRIPTION." (products_description, products_name, products_id) Values
        ('$product_description',
        '$product_name',
        $product_id)";

        $stat_second = mysqli_query($db->link, $sql_second);

        $sql_third = "INSERT INTO ".TABLE_PRODUCTS_TO_CATEGORIES." (products_id, categories_id) VALUES 
        ($product_id,
        $product_category)";

        mysqli_query($db->link, $sql_third);

        if (isset($_FILES['images'])) {
            $tmp_name = $_FILES['images']['tmp_name'];
            move_uploaded_file($tmp_name, DIR_WS_IMAGES.$product_image_name);
        }

        if ($stat_first && $stat_second)
        {

            $response = json_encode(['status' => true, 'version' => API_VERSION]);

        }


        else {
            $response = json_encode(['error' => "Not one product not found", 'status' => false, 'version' => API_VERSION]);
        }

        //echo $response;
        return $response;

    }
}

function apiMainImage()
{
    $get = $_REQUEST;
    global $db;

    if (validToken($get['token'])) {

        //echo json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
        return json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
    } else {

        $product_id = $get['product_id'];


        if (isset($_FILES['images'])) {
            $old_image_name = mysqli_fetch_row($db->link, "SELECT products_image FROM products WHERE products_id=$product_id")[0];

            unlink($old_image_name);

            $product_image = $_FILES['images']['name'];
            $product_image_name = $product_image;

            $tmp_name = $_FILES['images']['tmp_name'];
            move_uploaded_file($tmp_name, DIR_WS_IMAGES . $product_image_name);

            $sql = "UPDATE " . TABLE_PRODUCTS . " SET products_image='$product_image_name' WHERE products_id=$product_id";
            $query = mysqli_query($db->link, $sql);
        }


        if ($query) {
            //echo json_encode(['response' => ["status" => true, 'version' => API_VERSION]]);
            return json_encode(["status" => true, 'version' => API_VERSION]);
        } else {
            //echo json_encode(['error' => 'Missing some params', 'version' => API_VERSION, 'status' => false]);
            return json_encode(['error' => 'Missing some params', 'version' => API_VERSION, 'status' => false]);
        }
    }
}

function apiDeleteImage(){
    $get = $_REQUEST;
    global $db;

    if (validToken($get['token'])) {

        //echo json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
        return json_encode(['error' => validToken($get['token']), 'status' => false, 'version' => API_VERSION]);
    } else {

            $product_id = $get['product_id'];

            $old_image_name = mysqli_fetch_row(mysqli_query($db->link, "SELECT products_image FROM products WHERE products_id=$product_id"))[0];
            unlink(DIR_WS_IMAGES.$old_image_name);
            echo($old_image_name);

            $sql = "UPDATE " . TABLE_PRODUCTS . " SET products_image=' ' WHERE products_id=$product_id";
            $query = mysqli_query($db->link, $sql);



        if ($query) {
            //echo json_encode(['response' => ["status" => true, 'version' => API_VERSION]]);
            return json_encode(['response' => ["status" => true, 'version' => API_VERSION]]);
        } else {
            //echo json_encode(['error' => 'Missing some params', 'version' => API_VERSION, 'status' => false]);
            return json_encode(['error' => 'Missing some params', 'version' => API_VERSION, 'status' => false]);
        }
    }
}




function validToken($token)
{
    global $db;
    if (!isset($_REQUEST['token']) || $_REQUEST['token'] == '') {
        $error = 'You need to be logged!';
    } else {


        $exist_token = mysqli_fetch_array(mysqli_query($db->link, "SELECT * FROM user_token_mob_api WHERE token='$token'"));
        if ($exist_token){
            $error = null;
        } else {
            $error = 'Your token is no longer relevant!';
        }
    }

    return $error;
}

function getTotalOrders($data = array())
{
    global $db;
    if (isset($data['filter'])) {
        $sql = "SELECT date_added FROM `" . DB_PREFIX . "order` WHERE order_status_id > '0'";

        if ($data['filter'] == 'day') {
            $sql .= " AND DATE(date_added) = DATE(NOW())";
        } elseif ($data['filter'] == 'week') {
            $date_start = strtotime('-' . date('w') . ' days');
            $sql .= "AND WEEK(date_added) = WEEK(NOW()) ";

        } elseif ($data['filter'] == 'month') {
            $sql .= "AND MONTH(date_added) = MONTH(NOW()) ";

        } elseif ($data['filter'] == 'year') {
            $sql .= "AND YEAR(date_added) = YEAR(NOW())";
        } else {
            return false;
        }
    } else {
        $sql = "SELECT COUNT(*) FROM `" . DB_PREFIX . "order` WHERE order_status_id > '0'";
    }

    $query = mysqli_query($db->link, $sql);

    return $query;
}

function getStatuses(){
    global $db;

    $statuses = array();
    $query = "SELECT orders_status_name as name, orders_status_id as order_status_id, language_id FROM orders_status";

    $resp = mysqli_query($db->link, $query);
    while ($row = $resp->fetch_assoc()){
        array_push($statuses, $row);
    }
    return $statuses;
}

function getCurrency(){
    global $db;
    return mysqli_fetch_row(mysqli_query($db->link, "SELECT configuration_value FROM configuration WHERE configuration_title='Default Currency'"))[0];
}

function getTotalSum(){
    global $db;
    return mysqli_fetch_row(mysqli_query($db->link, "SELECT SUM(order_total) FROM orders"))[0];
}

