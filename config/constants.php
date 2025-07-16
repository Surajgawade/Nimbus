<?php

define('SITE_FOLDER', 'nimbus/');


define('SITE_URL', 'http://localhost/');

define('CRMNAME', '');

define('SHORTCRMNAME', '');
define('SHORT_CO_NAME', '');


define('SUCCESS_CODE', 200); //status ok

define('ERROR_CODE', 400); //status error

define('STATUS_ACTIVE', 1);

define('STATUS_DEACTIVE', 0);

define('STATUS_DELETED', 2);


define('ASSETS_FOLDER', 'backend/');
define('UPLOAD_FOLDER', 'uploads/');

define('PROFILE_PIC_PATH', UPLOAD_FOLDER . 'user_profile/');

define('ADMIN_SITE_URL', SITE_URL . SITE_FOLDER.'admin/');


define('PRODUCT', SITE_URL . SITE_FOLDER.'public/products');

define('PRODUCT_PDF', SITE_URL . SITE_FOLDER.'public/product_pdf');


define('SITE_IMAGES_URL', SITE_URL . ASSETS_FOLDER . 'images/');

define('SITE_JS_URL', SITE_URL . ASSETS_FOLDER . 'js/');

define('SITE_CSS_URL', SITE_URL . ASSETS_FOLDER . 'css/');

define('SITE_PLUGINS_URL', SITE_URL . ASSETS_FOLDER . 'plugins/');


define('DB_DATE_FORMAT', "Y-m-d H:i:s");

define('DISPLAY_DATE_FORMAT12', "d-m-Y H:i");

define('DISPLAY_DATE_FORMAT1', "d-m-Y_H:i");

define('DISPLAY_DATE_FORMATDATE', "d-m-Y");

define('UPLOAD_FILE_DATE_FORMAT', "Y-m-d-H-i-s");

define('UPLOAD_FILE_DATE_FORMAT_FILE_NAME', "d-m-Y_H-i-s");

define('DATE_ONLY', "Y-m-d");

define('MONTH_FORMAT', "d-M-Y");
?>