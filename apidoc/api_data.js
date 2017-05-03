define({ "api": [
  {
    "type": "get",
    "url": "api.php?route=module/apimodule/delivery",
    "title": "ChangeOrderDelivery",
    "name": "ChangeOrderDelivery",
    "group": "All",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>New shipping address.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "city",
            "description": "<p>New shipping city.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "order_id",
            "description": "<p>unique order ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Token",
            "optional": false,
            "field": "token",
            "description": "<p>your unique token.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "version",
            "description": "<p>Current API version.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "response",
            "description": "<p>Status of change address.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "  HTTP/1.1 200 OK\n{\n      \"status\": true,\n      \"version\": 1.0\n }",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "\n{\n  \"error\": \"Can not change address\",\n  \"version\": 1.0,\n  \"Status\" : false\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php",
    "groupTitle": "All"
  },
  {
    "type": "get",
    "url": "api.php?route=module/apimodule/changestatus",
    "title": "ChangeStatus",
    "name": "ChangeStatus",
    "group": "All",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "comment",
            "description": "<p>New comment for order status.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "order_id",
            "description": "<p>unique order ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "status_id",
            "description": "<p>unique status ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Token",
            "optional": false,
            "field": "token",
            "description": "<p>your unique token.</p>"
          },
          {
            "group": "Parameter",
            "type": "Boolean",
            "optional": false,
            "field": "inform",
            "description": "<p>status of the informing client.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "version",
            "description": "<p>Current API version.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the new status.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "date_added",
            "description": "<p>Date of adding status.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "  HTTP/1.1 200 OK\n{\n       \"response\":\n           {\n               \"name\" : \"Сделка завершена\",\n               \"date_added\" : \"2016-12-27 12:01:51\"\n           },\n       \"status\": true,\n       \"version\": 1.0\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "\n{\n  \"error\" : \"Missing some params\",\n  \"version\": 1.0,\n  \"Status\" : false\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php",
    "groupTitle": "All"
  },
  {
    "type": "get",
    "url": "api.php?route=module/apimodule/clients",
    "title": "getClients",
    "name": "GetClients",
    "group": "All",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Token",
            "optional": false,
            "field": "token",
            "description": "<p>your unique token.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "page",
            "description": "<p>number of the page.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "limit",
            "description": "<p>limit of the orders for the page.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "fio",
            "description": "<p>full name of the client.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "sort",
            "description": "<p>param for sorting clients(sum/quantity/date_added).</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "version",
            "description": "<p>Current API version.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "client_id",
            "description": "<p>ID of the client.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "fio",
            "description": "<p>Client's FIO.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "total",
            "description": "<p>Total sum of client's orders.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "currency_code",
            "description": "<p>Default currency of the shop.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "quantity",
            "description": "<p>Total quantity of client's orders.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    HTTP/1.1 200 OK\n{\n  \"Response\"\n  {\n    \"clients\"\n     {\n         {\n             \"client_id\" : \"88\",\n             \"fio\" : \"Anton Kiselev\",\n             \"total\" : \"1006.00\",\n             \"currency_code\": \"UAH\",\n             \"quantity\" : \"5\"\n         },\n         {\n             \"client_id\" : \"10\",\n             \"fio\" : \"Vlad Kochergin\",\n             \"currency_code\": \"UAH\",\n             \"total\" : \"555.00\",\n             \"quantity\" : \"1\"\n         }\n     }\n   },\n   \"Status\" : true,\n   \"version\": 1.0\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n     \"Error\" : \"Not one client found\",\n     \"version\": 1.0,\n     \"Status\" : false\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php",
    "groupTitle": "All"
  },
  {
    "type": "get",
    "url": "api.php?route=module/apimodule/orders",
    "title": "getOrders",
    "name": "GetOrders",
    "group": "All",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Token",
            "optional": false,
            "field": "token",
            "description": "<p>your unique token.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "page",
            "description": "<p>number of the page.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "limit",
            "description": "<p>limit of the orders for the page.</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "filter",
            "description": "<p>array of the filter params.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "filter[fio]",
            "description": "<p>full name of the client.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "filter[order_status_id]",
            "description": "<p>unique id of the order.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "filter[min_price]",
            "description": "<p>min price of order.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "filter[max_price]",
            "description": "<p>max price of order.</p>"
          },
          {
            "group": "Parameter",
            "type": "Date",
            "optional": false,
            "field": "filter[date_min]",
            "description": "<p>min date adding of the order.</p>"
          },
          {
            "group": "Parameter",
            "type": "Date",
            "optional": false,
            "field": "filter[date_max]",
            "description": "<p>max date adding of the order.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "version",
            "description": "<p>Current API version.</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "orders",
            "description": "<p>Array of the orders.</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "statuses",
            "description": "<p>Array of the order statuses.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "order_id",
            "description": "<p>ID of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "order_number",
            "description": "<p>Number of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "fio",
            "description": "<p>Client's FIO.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "currency_code",
            "description": "<p>Default currency of the shop.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "order[currency_code]",
            "description": "<p>currency of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "total",
            "description": "<p>Total sum of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "date_added",
            "description": "<p>Date added of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "total_quantity",
            "description": "<p>Total quantity of the orders.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    HTTP/1.1 200 OK\n{\n  \"Response\"\n  {\n     \"orders\":\n     {\n           {\n            \"order_id\" : \"1\",\n            \"order_number\" : \"1\",\n            \"fio\" : \"Anton Kiselev\",\n            \"status\" : \"Сделка завершена\",\n            \"total\" : \"106.00\",\n            \"date_added\" : \"2016-12-09 16:17:02\",\n            \"currency_code\": \"RUB\"\n            },\n           {\n            \"order_id\" : \"2\",\n            \"order_number\" : \"2\",\n            \"fio\" : \"Vlad Kochergin\",\n            \"status\" : \"В обработке\",\n            \"total\" : \"506.00\",\n            \"date_added\" : \"2016-10-19 16:00:00\",\n            \"currency_code\": \"RUB\"\n            }\n      },\n      \"statuses\" :\n      {\n            {\n             \"name\": \"Отменено\",\n             \"order_status_id\": \"7\",\n             \"language_id\": \"1\"\n             },\n            {\n             \"name\": \"Сделка завершена\",\n             \"order_status_id\": \"5\",\n             \"language_id\": \"1\"\n             },\n             {\n              \"name\": \"Ожидание\",\n              \"order_status_id\": \"1\",\n              \"language_id\": \"1\"\n              }\n      },\n      \"currency_code\": \"RUB\",\n      \"total_quantity\": 50,\n      \"total_sum\": \"2026.00\",\n      \"max_price\": \"1405.00\"\n  },\n  \"Status\" : true,\n  \"version\": 1.0\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "\n{\n     \"version\": 1.0,\n     \"Status\" : false\n\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php",
    "groupTitle": "All"
  },
  {
    "type": "",
    "url": "api.php?route=Login",
    "title": "",
    "version": "0.1.0",
    "name": "Login",
    "group": "All",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "username",
            "description": "<p>User unique username.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "password",
            "description": "<p>User's  password.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "os_type",
            "description": "<p>User's device's os_type for firebase notifications.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "device_token",
            "description": "<p>User's device's token for firebase notifications.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "version",
            "description": "<p>Current API version.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Token.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "  HTTP/1.1 200 OK\n{\n    \"response\":\n    {\n       \"token\": \"e9cf23a55429aa79c3c1651fe698ed7b\",\n       \"version\": 1.0,\n       \"status\": true\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "\n{\n  \"error\": \"Incorrect username or password\",\n  \"version\": 1.0,\n  \"Status\" : false\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./api.php",
    "groupTitle": "All"
  },
  {
    "type": "post",
    "url": "api.php?route=module/apimodule/deletedevicetoken",
    "title": "deleteUserDeviceToken",
    "name": "deleteUserDeviceToken",
    "group": "All",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "old_token",
            "description": "<p>User's device's token for firebase notifications.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "version",
            "description": "<p>Current API version.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "status",
            "description": "<p>true.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "  HTTP/1.1 200 OK\n{\n    \"response\":\n    {\n       \"status\": true,\n       \"version\": 1.0\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "\n{\n  \"error\": \"Missing some params\",\n  \"version\": 1.0,\n  \"Status\" : false\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php",
    "groupTitle": "All"
  },
  {
    "type": "get",
    "url": "api.php?route=module/apimodule/clientinfo",
    "title": "getClientInfo",
    "name": "getClientInfo",
    "group": "All",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Token",
            "optional": false,
            "field": "token",
            "description": "<p>your unique token.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "client_id",
            "description": "<p>unique client ID.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "version",
            "description": "<p>Current API version.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "client_id",
            "description": "<p>ID of the client.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "fio",
            "description": "<p>Client's FIO.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "total",
            "description": "<p>Total sum of client's orders.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "quantity",
            "description": "<p>Total quantity of client's orders.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Client's email.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "telephone",
            "description": "<p>Client's telephone.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "currency_code",
            "description": "<p>Default currency of the shop.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "cancelled",
            "description": "<p>Total quantity of cancelled orders.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "completed",
            "description": "<p>Total quantity of completed orders.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    HTTP/1.1 200 OK\n{\n  \"Response\"\n  {\n        \"client_id\" : \"88\",\n        \"fio\" : \"Anton Kiselev\",\n        \"total\" : \"1006.00\",\n        \"quantity\" : \"5\",\n        \"cancelled\" : \"1\",\n        \"completed\" : \"2\",\n        \"currency_code\": \"UAH\",\n        \"email\" : \"client@mail.ru\",\n        \"telephone\" : \"13456789\"\n  },\n  \"Status\" : true,\n  \"version\": 1.0\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n     \"Error\" : \"Not one client found\",\n     \"version\": 1.0,\n     \"Status\" : false\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php",
    "groupTitle": "All"
  },
  {
    "type": "get",
    "url": "api.php?route=module/apimodule/clientorders",
    "title": "getClientOrders",
    "name": "getClientOrders",
    "group": "All",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Token",
            "optional": false,
            "field": "token",
            "description": "<p>your unique token.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "client_id",
            "description": "<p>unique client ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "sort",
            "description": "<p>param for sorting orders(total/date_added/completed/cancelled).</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "version",
            "description": "<p>Current API version.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "order_id",
            "description": "<p>ID of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "order_number",
            "description": "<p>Number of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "currency_code",
            "description": "<p>Default currency of the shop.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "total",
            "description": "<p>Total sum of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "date_added",
            "description": "<p>Date added of the order.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    HTTP/1.1 200 OK\n{\n  \"Response\"\n  {\n      \"orders\":\n         {\n            \"order_id\" : \"1\",\n            \"order_number\" : \"1\",\n            \"status\" : \"Сделка завершена\",\n            \"currency_code\": \"UAH\",\n            \"total\" : \"106.00\",\n            \"date_added\" : \"2016-12-09 16:17:02\"\n         },\n         {\n            \"order_id\" : \"2\",\n            \"currency_code\": \"UAH\",\n            \"order_number\" : \"2\",\n            \"status\" : \"В обработке\",\n            \"total\" : \"506.00\",\n            \"date_added\" : \"2016-10-19 16:00:00\"\n         }\n   },\n   \"Status\" : true,\n   \"version\": 1.0\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n     \"Error\" : \"You have not specified ID\",\n     \"version\": 1.0,\n     \"Status\" : false\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php",
    "groupTitle": "All"
  },
  {
    "type": "get",
    "url": "api.php?route=module/apimodule/statistic",
    "title": "getDashboardStatistic",
    "name": "getDashboardStatistic",
    "group": "All",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "filter",
            "description": "<p>Period for filter(day/week/month/year).</p>"
          },
          {
            "group": "Parameter",
            "type": "Token",
            "optional": false,
            "field": "token",
            "description": "<p>your unique token.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "version",
            "description": "<p>Current API version.</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "xAxis",
            "description": "<p>Period of the selected filter.</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "Clients",
            "description": "<p>Clients for the selected period.</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "Orders",
            "description": "<p>Orders for the selected period.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "currency_code",
            "description": "<p>Default currency of the shop.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "total_sales",
            "description": "<p>Sum of sales of the shop.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "sale_year_total",
            "description": "<p>Sum of sales of the current year.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "orders_total",
            "description": "<p>Total orders of the shop.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "clients_total",
            "description": "<p>Total clients of the shop.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "   HTTP/1.1 200 OK\n {\n         \"response\": {\n             \"xAxis\": [\n                1,\n                2,\n                3,\n                4,\n                5,\n                6,\n                7\n            ],\n            \"clients\": [\n                0,\n                0,\n                0,\n                0,\n                0,\n                0,\n                0\n            ],\n            \"orders\": [\n                1,\n                0,\n                0,\n                0,\n                0,\n                0,\n                0\n            ],\n            \"total_sales\": \"1920.00\",\n            \"sale_year_total\": \"305.00\",\n            \"currency_code\": \"UAH\",\n            \"orders_total\": \"4\",\n            \"clients_total\": \"3\"\n         },\n         \"status\": true,\n         \"version\": 1.0\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "\n{\n  \"error\": \"Unknown filter set\",\n  \"version\": 1.0,\n  \"Status\" : false\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php",
    "groupTitle": "All"
  },
  {
    "type": "get",
    "url": "api.php?route=module/apimodule/orderhistory",
    "title": "getOrderHistory",
    "name": "getOrderHistory",
    "group": "All",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "order_id",
            "description": "<p>unique order ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Token",
            "optional": false,
            "field": "token",
            "description": "<p>your unique token.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "version",
            "description": "<p>Current API version.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Status of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "order_status_id",
            "description": "<p>ID of the status of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "date_added",
            "description": "<p>Date of adding status of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "comment",
            "description": "<p>Some comment added from manager.</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "statuses",
            "description": "<p>Statuses list for order.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n      \"response\":\n          {\n              \"orders\":\n                 {\n                     {\n                         \"name\": \"Отменено\",\n                         \"order_status_id\": \"7\",\n                         \"date_added\": \"2016-12-13 08:27:48.\",\n                         \"comment\": \"Some text\"\n                     },\n                     {\n                         \"name\": \"Сделка завершена\",\n                         \"order_status_id\": \"5\",\n                         \"date_added\": \"2016-12-25 09:30:10.\",\n                         \"comment\": \"Some text\"\n                     },\n                     {\n                         \"name\": \"Ожидание\",\n                         \"order_status_id\": \"1\",\n                         \"date_added\": \"2016-12-01 11:25:18.\",\n                         \"comment\": \"Some text\"\n                      }\n                  },\n               \"statuses\":\n                   {\n                        {\n                             \"name\": \"Отменено\",\n                             \"order_status_id\": \"7\",\n                             \"language_id\": \"1\"\n                        },\n                        {\n                             \"name\": \"Сделка завершена\",\n                             \"order_status_id\": \"5\",\n                             \"language_id\": \"1\"\n                         },\n                         {\n                             \"name\": \"Ожидание\",\n                             \"order_status_id\": \"1\",\n                             \"language_id\": \"1\"\n                         }\n                    }\n          },\n      \"status\": true,\n      \"version\": 1.0\n  }",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "\n{\n     \"error\": \"Can not found any statuses for order with id = 5\",\n     \"version\": 1.0,\n     \"Status\" : false\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php",
    "groupTitle": "All"
  },
  {
    "type": "get",
    "url": "api.php?route=module/apimodule/getorderinfo",
    "title": "getOrderInfo",
    "name": "getOrderInfo",
    "group": "All",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "order_id",
            "description": "<p>unique order ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Token",
            "optional": false,
            "field": "token",
            "description": "<p>your unique token.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "version",
            "description": "<p>Current API version.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "order_number",
            "description": "<p>Number of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "fio",
            "description": "<p>Client's FIO.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Client's email.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "phone",
            "description": "<p>Client's phone.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "total",
            "description": "<p>Total sum of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "currency_code",
            "description": "<p>Default currency of the shop.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "date_added",
            "description": "<p>Date added of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "statuses",
            "description": "<p>Statuses list for order.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    HTTP/1.1 200 OK\n{\n     \"response\" :\n         {\n             \"order_number\" : \"6\",\n             \"currency_code\": \"RUB\",\n             \"fio\" : \"Anton Kiselev\",\n             \"email\" : \"client@mail.ru\",\n             \"telephone\" : \"056 000-11-22\",\n             \"date_added\" : \"2016-12-24 12:30:46\",\n             \"total\" : \"1405.00\",\n             \"status\" : \"Сделка завершена\",\n             \"statuses\" :\n                 {\n                        {\n                            \"name\": \"Отменено\",\n                            \"order_status_id\": \"7\",\n                            \"language_id\": \"1\"\n                        },\n                        {\n                            \"name\": \"Сделка завершена\",\n                            \"order_status_id\": \"5\",\n                            \"language_id\": \"1\"\n                         },\n                         {\n                             \"name\": \"Ожидание\",\n                             \"order_status_id\": \"1\",\n                             \"language_id\": \"1\"\n                          }\n                   }\n         },\n     \"status\" : true,\n     \"version\": 1.0\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "\n{\n  \"error\" : \"Can not found order with id = 5\",\n  \"version\": 1.0,\n  \"Status\" : false\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php",
    "groupTitle": "All"
  },
  {
    "type": "get",
    "url": "api.php?route=module/apimodule/paymentanddelivery",
    "title": "getOrderPaymentAndDelivery",
    "name": "getOrderPaymentAndDelivery",
    "group": "All",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "order_id",
            "description": "<p>unique order ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Token",
            "optional": false,
            "field": "token",
            "description": "<p>your unique token.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "version",
            "description": "<p>Current API version.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "payment_method",
            "description": "<p>Payment method.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "shipping_method",
            "description": "<p>Shipping method.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "shipping_address",
            "description": "<p>Shipping address.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n\n {\n     \"response\":\n         {\n             \"payment_method\" : \"Оплата при доставке\",\n             \"shipping_method\" : \"Доставка с фиксированной стоимостью доставки\",\n             \"shipping_address\" : \"проспект Карла Маркса 1, Днепропетровск, Днепропетровская область, Украина.\"\n         },\n     \"status\": true,\n     \"version\": 1.0\n }",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "\n {\n   \"error\": \"Can not found order with id = 90\",\n   \"version\": 1.0,\n   \"Status\" : false\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php",
    "groupTitle": "All"
  },
  {
    "type": "get",
    "url": "api.php?route=module/apimodule/orderproducts",
    "title": "getOrderProducts",
    "name": "getOrderProducts",
    "group": "All",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Token",
            "optional": false,
            "field": "token",
            "description": "<p>your unique token.</p>"
          },
          {
            "group": "Parameter",
            "type": "ID",
            "optional": false,
            "field": "order_id",
            "description": "<p>unique order id.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "version",
            "description": "<p>Current API version.</p>"
          },
          {
            "group": "Success 200",
            "type": "Url",
            "optional": false,
            "field": "image",
            "description": "<p>Picture of the product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "quantity",
            "description": "<p>Quantity of the product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "model",
            "description": "<p>Model of the product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "Price",
            "description": "<p>Price of the product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "total_order_price",
            "description": "<p>Total sum of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "total_price",
            "description": "<p>Sum of product's prices.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "currency_code",
            "description": "<p>currency of the order.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "shipping_price",
            "description": "<p>Cost of the shipping.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "total",
            "description": "<p>Total order sum.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "product_id",
            "description": "<p>unique product id.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    HTTP/1.1 200 OK\n{\n     \"response\":\n         {\n             \"products\": [\n             {\n                 \"image\" : \"http://opencart/image/catalog/demo/htc_touch_hd_1.jpg\",\n                 \"name\" : \"HTC Touch HD\",\n                 \"model\" : \"Product 1\",\n                 \"quantity\" : 3,\n                 \"price\" : 100.00,\n                 \"product_id\" : 90\n             },\n             {\n                 \"image\" : \"http://opencart/image/catalog/demo/iphone_1.jpg\",\n                 \"name\" : \"iPhone\",\n                 \"model\" : \"Product 11\",\n                 \"quantity\" : 1,\n                 \"price\" : 500.00,\n                 \"product_id\" : 97\n              }\n           ],\n           \"total_order_price\":\n             {\n                  \"total_discount\": 0,\n                  \"total_price\": 2250,\n\t\t\t\t\t \"currency_code\": \"RUB\",\n                  \"shipping_price\": 35,\n                  \"total\": 2285\n              }\n\n        },\n     \"status\": true,\n     \"version\": 1.0\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "\n{\n     \"error\": \"Can not found any products in order with id = 10\",\n     \"version\": 1.0,\n     \"Status\" : false\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php",
    "groupTitle": "All"
  },
  {
    "type": "get",
    "url": "api.php?route=module/apimodule/productinfo",
    "title": "getProductInfo",
    "name": "getProductInfo",
    "group": "All",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Token",
            "optional": false,
            "field": "token",
            "description": "<p>your unique token.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "product_id",
            "description": "<p>unique product ID.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "version",
            "description": "<p>Current API version.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "product_id",
            "description": "<p>ID of the product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "model",
            "description": "<p>Model of the product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "price",
            "description": "<p>Price of the product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "currency_code",
            "description": "<p>Default currency of the shop.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "quantity",
            "description": "<p>Actual quantity of the product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>Detail description of the product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "images",
            "description": "<p>Array of the images of the product.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    HTTP/1.1 200 OK\n{\n  \"Response\":\n  {\n      \"product_id\" : \"1\",\n      \"model\" : \"Black\",\n      \"name\" : \"HTC Touch HD\",\n      \"price\" : \"100.00\",\n      \"currency_code\": \"UAH\"\n      \"quantity\" : \"83\",\n      \"main_image\" : \"http://site-url/image/catalog/demo/htc_iPhone_1.jpg\",\n      \"description\" : \"Revolutionary multi-touch interface.↵\tiPod touch features the same multi-touch screen technology as iPhone.\",\n      \"images\" :\n      [\n          \"http://site-url/image/catalog/demo/htc_iPhone_1.jpg\",\n          \"http://site-url/image/catalog/demo/htc_iPhone_2.jpg\",\n          \"http://site-url/image/catalog/demo/htc_iPhone_3.jpg\"\n      ]\n  },\n  \"Status\" : true,\n  \"version\": 1.0\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n     \"Error\" : \"Can not found product with id = 10\",\n     \"version\": 1.0,\n     \"Status\" : false\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php",
    "groupTitle": "All"
  },
  {
    "type": "get",
    "url": "api.php?route=module/apimodule/products",
    "title": "getProductsList",
    "name": "getProductsList",
    "group": "All",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Token",
            "optional": false,
            "field": "token",
            "description": "<p>your unique token.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "page",
            "description": "<p>number of the page.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "limit",
            "description": "<p>limit of the orders for the page.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>name of the product for search.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "version",
            "description": "<p>Current API version.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "product_id",
            "description": "<p>ID of the product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "model",
            "description": "<p>Model of the product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "currency_code",
            "description": "<p>Default currency of the shop.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "price",
            "description": "<p>Price of the product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "quantity",
            "description": "<p>Actual quantity of the product.</p>"
          },
          {
            "group": "Success 200",
            "type": "Url",
            "optional": false,
            "field": "image",
            "description": "<p>Url to the product image.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    HTTP/1.1 200 OK\n{\n  \"Response\":\n  {\n     \"products\":\n     {\n          {\n            \"product_id\" : \"1\",\n            \"model\" : \"Black\",\n            \"name\" : \"HTC Touch HD\",\n            \"price\" : \"100.00\",\n            \"currency_code\": \"UAH\",\n            \"quantity\" : \"83\",\n            \"image\" : \"http://site-url/image/catalog/demo/htc_touch_hd_1.jpg\"\n          },\n          {\n            \"product_id\" : \"2\",\n            \"model\" : \"White\",\n            \"name\" : \"iPhone\",\n            \"price\" : \"300.00\",\n            \"currency_code\": \"UAH\",\n            \"quantity\" : \"30\",\n            \"image\" : \"http://site-url/image/catalog/demo/iphone_1.jpg\"\n          }\n     }\n  },\n  \"Status\" : true,\n  \"version\": 1.0\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n     \"Error\" : \"Not one product not found\",\n     \"version\": 1.0,\n     \"Status\" : false\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php",
    "groupTitle": "All"
  },
  {
    "type": "post",
    "url": "api.php?route=module/apimodule/updatedevicetoken",
    "title": "updateUserDeviceToken",
    "name": "updateUserDeviceToken",
    "group": "All",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "new_token",
            "description": "<p>User's device's new token for firebase notifications.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "old_token",
            "description": "<p>User's device's old token for firebase notifications.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "version",
            "description": "<p>Current API version.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "status",
            "description": "<p>true.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "  HTTP/1.1 200 OK\n{\n    \"response\":\n    {\n       \"status\": true,\n       \"version\": 1.0\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "\n{\n  \"error\": \"Missing some params\",\n  \"version\": 1.0,\n  \"Status\" : false\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php",
    "groupTitle": "All"
  },
  {
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "varname1",
            "description": "<p>No type.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "varname2",
            "description": "<p>With type.</p>"
          }
        ]
      }
    },
    "type": "",
    "url": "",
    "version": "0.0.0",
    "filename": "./apidoc/main.js",
    "group": "C__xampp1_htdocs_zencart_ku_apidoc_main_js",
    "groupTitle": "C__xampp1_htdocs_zencart_ku_apidoc_main_js",
    "name": ""
  }
] });
