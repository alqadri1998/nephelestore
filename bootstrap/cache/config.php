<?php return array (
  'app' => 
  array (
    'name' => 'nephele',
    'env' => 'production',
    'debug' => true,
    'url' => 'https://nephelestore.com',
    'asset_url' => NULL,
    'timezone' => 'UTC',
    'locale' => 'ar',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'key' => 'base64:8v8ywr9z3UeC+h+XnEuMSEZuzMo0yMhSg47gKBWge+w=',
    'cipher' => 'AES-256-CBC',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'App\\Providers\\AppServiceProvider',
      23 => 'App\\Providers\\AuthServiceProvider',
      24 => 'App\\Providers\\EventServiceProvider',
      25 => 'App\\Providers\\RouteServiceProvider',
      26 => 'Spatie\\Permission\\PermissionServiceProvider',
      27 => 'Intervention\\Image\\ImageServiceProvider',
      28 => 'Backup\\BackupServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Role' => 'Spatie\\Permission\\Models\\Role',
      'Permission' => 'Spatie\\Permission\\Models\\Permission',
      'Image' => 'Intervention\\Image\\Facades\\Image',
      'PDF' => 'Meneses\\LaravelMpdf\\Facades\\LaravelMpdf',
      'FastExcel' => 'Rap2hpoutre\\FastExcel\\FastExcel',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'admin' => 
      array (
        'driver' => 'session',
        'provider' => 'admins',
      ),
      'api' => 
      array (
        'driver' => 'token',
        'provider' => 'users',
        'hash' => false,
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\User',
      ),
      'admins' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Admin',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'backup' => 
  array (
    'mysql' => 
    array (
      'mysql_path' => 'mysql',
      'mysqldump_path' => 'mysqldump',
      'compress' => false,
      'local-storage' => 
      array (
        'disk' => 'backup',
        'path' => 'backups',
      ),
      'cloud-storage' => 
      array (
        'enabled' => false,
        'disk' => 's3',
        'path' => 'path/to/your/backup-folder/',
        'keep-local' => true,
      ),
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'useTLS' => true,
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
        'lock_connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'C:\\wamp64\\www\\nephele_store\\public_html\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
    ),
    'prefix' => 'nephele_cache_',
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => false,
    'max_age' => false,
    'supports_credentials' => false,
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'nephele_store',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => 'localhost',
        'port' => '3306',
        'database' => 'nephele_store',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => 'InnoDB',
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => 'localhost',
        'port' => '3306',
        'database' => 'nephele_store',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'search_path' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => 'localhost',
        'port' => '3306',
        'database' => 'nephele_store',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'nephele_database_',
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'media',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\wamp64\\www\\nephele_store\\public_html\\storage\\app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\wamp64\\www\\nephele_store\\public_html\\storage\\app/public',
        'url' => 'https://nephelestore.com/storage',
        'visibility' => 'public',
      ),
      'media' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\wamp64\\www\\nephele_store\\public_html\\public\\uploads/media',
        'url' => 'https://nephelestore.com/uploads/media',
        'visibility' => 'public',
      ),
      'user_media' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\wamp64\\www\\nephele_store\\public_html\\public\\uploads/user_media',
        'url' => 'https://nephelestore.com/uploads/user_media',
        'visibility' => 'public',
      ),
      'backup' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\wamp64\\www\\nephele_store\\public_html\\public',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
      ),
    ),
    'links' => 
    array (
      'C:\\wamp64\\www\\nephele_store\\public_html\\public\\storage' => 'C:\\wamp64\\www\\nephele_store\\public_html\\storage\\app/public',
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 1024,
      'threads' => 2,
      'time' => 2,
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => 'C:\\wamp64\\www\\nephele_store\\public_html\\storage\\logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\wamp64\\www\\nephele_store\\public_html\\storage\\logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'critical',
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => 'C:\\wamp64\\www\\nephele_store\\public_html\\storage\\logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'host' => 'smtp.mailtrap.io',
        'port' => '587',
        'encryption' => 'tls',
        'username' => '9b94a88fefadf6',
        'password' => 'e1fe5bdf06a777',
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
    ),
    'from' => 
    array (
      'address' => 'blogshreef@gmail.com',
      'name' => 'nephele',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'C:\\wamp64\\www\\nephele_store\\public_html\\resources\\views/vendor/mail',
      ),
    ),
  ),
  'medialibrary' => 
  array (
    'disk_name' => 'media',
    'max_file_size' => 20971520,
    'queue_name' => '',
    'media_model' => 'Spatie\\MediaLibrary\\Models\\Media',
    's3' => 
    array (
      'domain' => 'https://.s3.amazonaws.com',
    ),
    'remote' => 
    array (
      'extra_headers' => 
      array (
        'CacheControl' => 'max-age=604800',
      ),
    ),
    'responsive_images' => 
    array (
      'width_calculator' => 'Spatie\\MediaLibrary\\ResponsiveImages\\WidthCalculator\\FileSizeOptimizedWidthCalculator',
      'use_tiny_placeholders' => true,
      'tiny_placeholder_generator' => 'Spatie\\MediaLibrary\\ResponsiveImages\\TinyPlaceholderGenerator\\Blurred',
    ),
    'url_generator' => NULL,
    'version_urls' => false,
    'path_generator' => NULL,
    'image_optimizers' => 
    array (
      'Spatie\\ImageOptimizer\\Optimizers\\Jpegoptim' => 
      array (
        0 => '--strip-all',
        1 => '--all-progressive',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Pngquant' => 
      array (
        0 => '--force',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Optipng' => 
      array (
        0 => '-i0',
        1 => '-o2',
        2 => '-quiet',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Svgo' => 
      array (
        0 => '--disable=cleanupIDs',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Gifsicle' => 
      array (
        0 => '-b',
        1 => '-O3',
      ),
    ),
    'image_generators' => 
    array (
      0 => 'Spatie\\MediaLibrary\\ImageGenerators\\FileTypes\\Image',
      1 => 'Spatie\\MediaLibrary\\ImageGenerators\\FileTypes\\Webp',
      2 => 'Spatie\\MediaLibrary\\ImageGenerators\\FileTypes\\Pdf',
      3 => 'Spatie\\MediaLibrary\\ImageGenerators\\FileTypes\\Svg',
      4 => 'Spatie\\MediaLibrary\\ImageGenerators\\FileTypes\\Video',
    ),
    'image_driver' => 'gd',
    'ffmpeg_path' => '/usr/bin/ffmpeg',
    'ffprobe_path' => '/usr/bin/ffprobe',
    'temporary_directory_path' => NULL,
    'jobs' => 
    array (
      'perform_conversions' => 'Spatie\\MediaLibrary\\Jobs\\PerformConversions',
      'generate_responsive_images' => 'Spatie\\MediaLibrary\\Jobs\\GenerateResponsiveImages',
    ),
  ),
  'moyasar' => 
  array (
    'key' => 'sk_live_PzAavoSGXdwZhFcHwLeAh9bWJs3HsMd7QFmvxfqx',
    'publishable_key' => 'pk_live_brrAqbaWDwu2BksGu9QUtpksazfPwa4zTd9KmqfB',
  ),
  'permission' => 
  array (
    'models' => 
    array (
      'permission' => 'Spatie\\Permission\\Models\\Permission',
      'role' => 'Spatie\\Permission\\Models\\Role',
    ),
    'table_names' => 
    array (
      'roles' => 'roles',
      'permissions' => 'permissions',
      'model_has_permissions' => 'model_has_permissions',
      'model_has_roles' => 'model_has_roles',
      'role_has_permissions' => 'role_has_permissions',
    ),
    'column_names' => 
    array (
      'model_morph_key' => 'model_id',
    ),
    'register_permission_check_method' => true,
    'teams' => false,
    'display_permission_in_exception' => false,
    'display_role_in_exception' => false,
    'enable_wildcard_permission' => false,
    'cache' => 
    array (
      'expiration_time' => 
      DateInterval::__set_state(array(
         'y' => 0,
         'm' => 0,
         'd' => 0,
         'h' => 24,
         'i' => 0,
         's' => 0,
         'f' => 0.0,
         'weekday' => 0,
         'weekday_behavior' => 0,
         'first_last_day_of' => 0,
         'invert' => 0,
         'days' => false,
         'special_type' => 0,
         'special_amount' => 0,
         'have_weekday_relative' => 0,
         'have_special_relative' => 0,
      )),
      'key' => 'spatie.permission.cache',
      'model_key' => 'name',
      'store' => 'default',
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
      ),
    ),
    'failed' => 
    array (
      'driver' => 'database',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
    ),
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => 'C:\\wamp64\\www\\nephele_store\\public_html\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'nephele_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
  ),
  'settings' => 
  array (
    'settings' => 
    array (
      0 => 
      array (
        'key' => 'logo',
        'value' => '',
      ),
      1 => 
      array (
        'key' => 'site_name_ar',
        'value' => 'Nephele',
      ),
      2 => 
      array (
        'key' => 'site_name_en',
        'value' => 'Nephele',
      ),
      3 => 
      array (
        'key' => 'email',
        'value' => 'nephele@nephele.com',
      ),
      4 => 
      array (
        'key' => 'site_description_ar',
        'value' => '',
      ),
      5 => 
      array (
        'key' => 'site_description_en',
        'value' => '',
      ),
      6 => 
      array (
        'key' => 'site_key_words',
        'value' => '',
      ),
      7 => 
      array (
        'key' => 'mobile',
        'value' => '',
      ),
      8 => 
      array (
        'key' => 'location',
        'value' => '',
      ),
      9 => 
      array (
        'key' => 'facbook_link',
        'value' => '',
      ),
      10 => 
      array (
        'key' => 'twitter_link',
        'value' => '',
      ),
      11 => 
      array (
        'key' => 'instagram_link',
        'value' => '',
      ),
      12 => 
      array (
        'key' => 'shipping',
        'value' => '',
      ),
      13 => 
      array (
        'key' => 'contact_us_map_html',
        'value' => '',
      ),
      14 => 
      array (
        'key' => 'maroof_link',
        'value' => '',
      ),
      15 => 
      array (
        'key' => 'vat',
        'value' => '',
      ),
    ),
  ),
  'sidebar' => 
  array (
    0 => 
    array (
      'title' => 'products_and_attributes',
      'permission' => 
      array (
        0 => 'list-products',
        1 => 'list-product-colors',
        2 => 'list-product-sizes',
      ),
      'route' => 
      array (
        0 => 'admin.product_colors.index',
        1 => 'admin.products.index',
        2 => 'admin.product_sizes.index',
      ),
      'icon' => 'menu-icon flaticon2-gift-1',
      'type' => 'multiple',
      'childs' => 
      array (
        0 => 
        array (
          'title' => 'products.index',
          'permission' => 'list-products',
          'route' => 'admin.products.index',
          'icon' => 'menu-icon flaticon2-gift-1',
          'type' => 'single',
          'childs' => 
          array (
          ),
        ),
        1 => 
        array (
          'title' => 'product_colors.index',
          'permission' => 'list-product-colors',
          'route' => 'admin.product_colors.index',
          'icon' => 'menu-icon flaticon2-gift-1',
          'type' => 'single',
          'childs' => 
          array (
          ),
        ),
      ),
    ),
    1 => 
    array (
      'title' => 'orders.index',
      'permission' => 'list-orders',
      'route' => 'admin.orders.index',
      'icon' => 'menu-icon flaticon2-gift-1',
      'type' => 'single',
      'childs' => 
      array (
      ),
    ),
    2 => 
    array (
      'title' => 'coupons.index',
      'permission' => 'list-coupons',
      'route' => 'admin.coupons.index',
      'icon' => 'menu-icon flaticon-squares',
      'type' => 'single',
      'childs' => 
      array (
      ),
    ),
    3 => 
    array (
      'title' => 'categories.index',
      'permission' => 'list-categories',
      'route' => 'admin.categories.index',
      'icon' => 'menu-icon flaticon-squares',
      'type' => 'single',
      'childs' => 
      array (
      ),
    ),
    4 => 
    array (
      'title' => 'users.index',
      'permission' => 'list-users',
      'route' => 'admin.users.index',
      'icon' => 'menu-icon flaticon-users-1',
      'type' => 'single',
      'childs' => 
      array (
      ),
    ),
    5 => 
    array (
      'title' => 'carts.index',
      'permission' => 'list-users',
      'route' => 'admin.carts.index',
      'icon' => 'menu-icon flaticon-cart',
      'type' => 'single',
      'childs' => 
      array (
      ),
    ),
    6 => 
    array (
      'title' => 'pages.index',
      'permission' => 'list-pages',
      'route' => 'admin.pages.index',
      'icon' => 'menu-icon flaticon-squares',
      'type' => 'single',
      'childs' => 
      array (
      ),
    ),
    7 => 
    array (
      'title' => 'reviews.index',
      'permission' => 'list-users',
      'route' => 'admin.reviews',
      'icon' => 'menu-icon flaticon-squares',
      'type' => 'single',
      'childs' => 
      array (
      ),
    ),
    8 => 
    array (
      'title' => 'contacts.index',
      'permission' => 'list-users',
      'route' => 'admin.contacts.index',
      'icon' => 'menu-icon flaticon-users-1',
      'type' => 'single',
      'childs' => 
      array (
      ),
    ),
    9 => 
    array (
      'title' => 'roles_admins',
      'permission' => 
      array (
        0 => 'list-roles',
        1 => 'list-admins',
      ),
      'route' => 
      array (
        0 => 'admin.roles.index',
        1 => 'admin.admins.index',
      ),
      'icon' => 'menu-icon flaticon2-user-1',
      'type' => 'multiple',
      'childs' => 
      array (
        0 => 
        array (
          'title' => 'roles.index',
          'permission' => 'list-roles',
          'route' => 'admin.roles.index',
          'icon' => 'menu-icon flaticon2-gift-1',
          'type' => 'single',
          'childs' => 
          array (
          ),
        ),
        1 => 
        array (
          'title' => 'admins.index',
          'permission' => 'list-admins',
          'route' => 'admin.admins.index',
          'icon' => 'menu-icon flaticon2-gift-1',
          'type' => 'single',
          'childs' => 
          array (
          ),
        ),
      ),
    ),
    10 => 
    array (
      'title' => 'subscriptions',
      'permission' => 'manage-settings',
      'route' => 'admin.subscriptions',
      'icon' => 'menu-icon flaticon-users-1',
      'type' => 'single',
      'childs' => 
      array (
      ),
    ),
    11 => 
    array (
      'title' => 'sliders.index',
      'permission' => 'list-slider_items',
      'route' => 'admin.sliders.index',
      'icon' => 'menu-icon flaticon-lifebuoy',
      'type' => 'single',
      'childs' => 
      array (
      ),
    ),
    12 => 
    array (
      'title' => 'Settings',
      'permission' => 'manage-settings',
      'route' => 'admin.settings',
      'icon' => 'menu-icon flaticon2-settings',
      'type' => 'single',
      'childs' => 
      array (
      ),
    ),
    13 => 
    array (
      'title' => 'Backup',
      'permission' => 'manage-backup',
      'route' => 'admin.backup.index',
      'icon' => 'menu-icon flaticon2-copy',
      'type' => 'single',
      'childs' => 
      array (
      ),
    ),
  ),
  'smsa' => 
  array (
    'testing_environment' => true,
    'passKey_testing' => 'Testing2',
    'passKey_production' => 'AsT@6613',
    'shipType' => 'DLV',
    'carrCurr' => 'SAR',
    'sContact' => 'AbdullahsubaieCOD',
    '_apiUrl' => 'http://track.smsaexpress.com/SECOM/SMSAwebService.asmx',
  ),
  'system' => 
  array (
    'permissions' => 
    array (
      0 => 
      array (
        'name' => 'roles',
        'display_name' => 'Roles',
        'display_name_ar' => 'الأدوار',
        'crud' => true,
      ),
      1 => 
      array (
        'name' => 'categories',
        'display_name' => 'Categories',
        'display_name_ar' => 'الأقسام',
        'crud' => true,
      ),
      2 => 
      array (
        'name' => 'products',
        'display_name' => 'Products',
        'display_name_ar' => 'المنتجات',
        'crud' => true,
      ),
      3 => 
      array (
        'name' => 'product-colors',
        'display_name' => 'Product Colors',
        'display_name_ar' => 'الوان المنتجات',
        'crud' => true,
      ),
      4 => 
      array (
        'name' => 'product-sizes',
        'display_name' => 'Product Sizes',
        'display_name_ar' => 'احجام المنتجات',
        'crud' => true,
      ),
      5 => 
      array (
        'name' => 'coupons',
        'display_name' => 'coupons',
        'display_name_ar' => 'كوبونات الخصم',
        'crud' => true,
      ),
      6 => 
      array (
        'name' => 'orders',
        'display_name' => 'Orders',
        'display_name_ar' => 'الطلبات',
        'crud' => true,
      ),
      7 => 
      array (
        'name' => 'pages',
        'display_name' => 'pages',
        'display_name_ar' => 'الصفحات',
        'crud' => true,
      ),
      8 => 
      array (
        'name' => 'admins',
        'display_name' => 'Admin Users',
        'display_name_ar' => 'المشرفين',
        'crud' => true,
      ),
      9 => 
      array (
        'name' => 'users',
        'display_name' => 'Users',
        'display_name_ar' => 'المستخدمون',
        'crud' => true,
      ),
      10 => 
      array (
        'name' => 'slider_items',
        'display_name' => 'Home Slider Items',
        'display_name_ar' => 'الصور المتحركه',
        'crud' => true,
      ),
      11 => 
      array (
        'name' => 'manage-settings',
        'display_name' => 'Settings',
        'display_name_ar' => 'الأعدادات',
        'crud' => false,
      ),
      12 => 
      array (
        'name' => 'manage-backup',
        'display_name' => 'Manage Backup',
        'display_name_ar' => 'التحكم فى النسخ الاحتياطية',
        'crud' => false,
      ),
    ),
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => 'C:\\wamp64\\www\\nephele_store\\public_html\\resources\\views',
    ),
    'compiled' => 'C:\\wamp64\\www\\nephele_store\\public_html\\storage\\framework\\views',
    'expires' => true,
  ),
  'translatable' => 
  array (
    'locales' => 
    array (
      0 => 'en',
      1 => 'fr',
      'es' => 
      array (
        0 => 'MX',
        1 => 'CO',
      ),
    ),
    'locale_separator' => '-',
    'locale' => NULL,
    'use_fallback' => false,
    'use_property_fallback' => true,
    'fallback_locale' => 'en',
    'translation_model_namespace' => NULL,
    'translation_suffix' => 'Translation',
    'locale_key' => 'locale',
    'to_array_always_loads_translations' => true,
    'rule_factory' => 
    array (
      'format' => 1,
      'prefix' => '%',
      'suffix' => '%',
    ),
  ),
  'pdf' => 
  array (
    'mode' => '',
    'format' => 'A4',
    'default_font_size' => '12',
    'default_font' => 'sans-serif',
    'margin_left' => 10,
    'margin_right' => 10,
    'margin_top' => 10,
    'margin_bottom' => 10,
    'margin_header' => 0,
    'margin_footer' => 0,
    'orientation' => 'P',
    'title' => 'Laravel mPDF',
    'subject' => '',
    'author' => '',
    'watermark' => '',
    'show_watermark' => false,
    'show_watermark_image' => false,
    'watermark_font' => 'sans-serif',
    'display_mode' => 'fullpage',
    'watermark_text_alpha' => 0.1,
    'watermark_image_path' => '',
    'watermark_image_alpha' => 0.2,
    'watermark_image_size' => 'D',
    'watermark_image_position' => 'P',
    'custom_font_dir' => '',
    'custom_font_data' => 
    array (
    ),
    'auto_language_detection' => false,
    'temp_dir' => 'C:\\Users\\7MooD\\AppData\\Local\\Temp',
    'pdfa' => false,
    'pdfaauto' => false,
    'use_active_forms' => false,
  ),
  'flare' => 
  array (
    'key' => NULL,
    'reporting' => 
    array (
      'anonymize_ips' => true,
      'collect_git_information' => false,
      'report_queries' => true,
      'maximum_number_of_collected_queries' => 200,
      'report_query_bindings' => true,
      'report_view_data' => true,
      'grouping_type' => NULL,
      'report_logs' => true,
      'maximum_number_of_collected_logs' => 200,
      'censor_request_body_fields' => 
      array (
        0 => 'password',
      ),
    ),
    'send_logs_as_events' => true,
    'censor_request_body_fields' => 
    array (
      0 => 'password',
    ),
  ),
  'ignition' => 
  array (
    'editor' => 'phpstorm',
    'theme' => 'light',
    'enable_share_button' => true,
    'register_commands' => false,
    'ignored_solution_providers' => 
    array (
      0 => 'Facade\\Ignition\\SolutionProviders\\MissingPackageSolutionProvider',
    ),
    'enable_runnable_solutions' => NULL,
    'remote_sites_path' => '',
    'local_sites_path' => '',
    'housekeeping_endpoint_prefix' => '_ignition',
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'excel' => 
  array (
    'exports' => 
    array (
      'chunk_size' => 1000,
      'pre_calculate_formulas' => false,
      'strict_null_comparison' => false,
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'line_ending' => '
',
        'use_bom' => false,
        'include_separator_line' => false,
        'excel_compatibility' => false,
        'output_encoding' => '',
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
    ),
    'imports' => 
    array (
      'read_only' => true,
      'ignore_empty' => false,
      'heading_row' => 
      array (
        'formatter' => 'slug',
      ),
      'csv' => 
      array (
        'delimiter' => NULL,
        'enclosure' => '"',
        'escape_character' => '\\',
        'contiguous' => false,
        'input_encoding' => 'UTF-8',
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
    ),
    'extension_detector' => 
    array (
      'xlsx' => 'Xlsx',
      'xlsm' => 'Xlsx',
      'xltx' => 'Xlsx',
      'xltm' => 'Xlsx',
      'xls' => 'Xls',
      'xlt' => 'Xls',
      'ods' => 'Ods',
      'ots' => 'Ods',
      'slk' => 'Slk',
      'xml' => 'Xml',
      'gnumeric' => 'Gnumeric',
      'htm' => 'Html',
      'html' => 'Html',
      'csv' => 'Csv',
      'tsv' => 'Csv',
      'pdf' => 'Dompdf',
    ),
    'value_binder' => 
    array (
      'default' => 'Maatwebsite\\Excel\\DefaultValueBinder',
    ),
    'cache' => 
    array (
      'driver' => 'memory',
      'batch' => 
      array (
        'memory_limit' => 60000,
      ),
      'illuminate' => 
      array (
        'store' => NULL,
      ),
    ),
    'transactions' => 
    array (
      'handler' => 'db',
      'db' => 
      array (
        'connection' => NULL,
      ),
    ),
    'temporary_files' => 
    array (
      'local_path' => 'C:\\wamp64\\www\\nephele_store\\public_html\\storage\\framework/cache/laravel-excel',
      'remote_disk' => NULL,
      'remote_prefix' => NULL,
      'force_resync_remote' => NULL,
    ),
  ),
  'media-library' => 
  array (
    'disk_name' => 'public',
    'max_file_size' => 10485760,
    'queue_name' => '',
    'queue_conversions_by_default' => true,
    'media_model' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
    'temporary_upload_model' => 'Spatie\\MediaLibraryPro\\Models\\TemporaryUpload',
    'enable_temporary_uploads_session_affinity' => true,
    'generate_thumbnails_for_temporary_uploads' => true,
    'file_namer' => 'Spatie\\MediaLibrary\\Support\\FileNamer\\DefaultFileNamer',
    'path_generator' => 'Spatie\\MediaLibrary\\Support\\PathGenerator\\DefaultPathGenerator',
    'url_generator' => 'Spatie\\MediaLibrary\\Support\\UrlGenerator\\DefaultUrlGenerator',
    'moves_media_on_update' => false,
    'version_urls' => false,
    'image_optimizers' => 
    array (
      'Spatie\\ImageOptimizer\\Optimizers\\Jpegoptim' => 
      array (
        0 => '-m85',
        1 => '--force',
        2 => '--strip-all',
        3 => '--all-progressive',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Pngquant' => 
      array (
        0 => '--force',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Optipng' => 
      array (
        0 => '-i0',
        1 => '-o2',
        2 => '-quiet',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Svgo' => 
      array (
        0 => '--disable=cleanupIDs',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Gifsicle' => 
      array (
        0 => '-b',
        1 => '-O3',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Cwebp' => 
      array (
        0 => '-m 6',
        1 => '-pass 10',
        2 => '-mt',
        3 => '-q 90',
      ),
    ),
    'image_generators' => 
    array (
      0 => 'Spatie\\MediaLibrary\\Conversions\\ImageGenerators\\Image',
      1 => 'Spatie\\MediaLibrary\\Conversions\\ImageGenerators\\Webp',
      2 => 'Spatie\\MediaLibrary\\Conversions\\ImageGenerators\\Pdf',
      3 => 'Spatie\\MediaLibrary\\Conversions\\ImageGenerators\\Svg',
      4 => 'Spatie\\MediaLibrary\\Conversions\\ImageGenerators\\Video',
    ),
    'temporary_directory_path' => NULL,
    'image_driver' => 'gd',
    'ffmpeg_path' => '/usr/bin/ffmpeg',
    'ffprobe_path' => '/usr/bin/ffprobe',
    'jobs' => 
    array (
      'perform_conversions' => 'Spatie\\MediaLibrary\\Conversions\\Jobs\\PerformConversionsJob',
      'generate_responsive_images' => 'Spatie\\MediaLibrary\\ResponsiveImages\\Jobs\\GenerateResponsiveImagesJob',
    ),
    'media_downloader' => 'Spatie\\MediaLibrary\\Downloaders\\DefaultDownloader',
    'remote' => 
    array (
      'extra_headers' => 
      array (
        'CacheControl' => 'max-age=604800',
      ),
    ),
    'responsive_images' => 
    array (
      'width_calculator' => 'Spatie\\MediaLibrary\\ResponsiveImages\\WidthCalculator\\FileSizeOptimizedWidthCalculator',
      'use_tiny_placeholders' => true,
      'tiny_placeholder_generator' => 'Spatie\\MediaLibrary\\ResponsiveImages\\TinyPlaceholderGenerator\\Blurred',
    ),
    'enable_vapor_uploads' => false,
    'default_loading_attribute_value' => NULL,
    'prefix' => '',
  ),
  'datatables-buttons' => 
  array (
    'namespace' => 
    array (
      'base' => 'DataTables',
      'model' => '',
    ),
    'pdf_generator' => 'snappy',
    'snappy' => 
    array (
      'options' => 
      array (
        'no-outline' => true,
        'margin-left' => '0',
        'margin-right' => '0',
        'margin-top' => '10mm',
        'margin-bottom' => '10mm',
      ),
      'orientation' => 'landscape',
    ),
    'parameters' => 
    array (
      'dom' => 'Bfrtip',
      'order' => 
      array (
        0 => 
        array (
          0 => 0,
          1 => 'desc',
        ),
      ),
      'buttons' => 
      array (
        0 => 'create',
        1 => 'export',
        2 => 'print',
        3 => 'reset',
        4 => 'reload',
      ),
    ),
    'generator' => 
    array (
      'columns' => 'id,add your columns,created_at,updated_at',
      'buttons' => 'create,export,print,reset,reload',
      'dom' => 'Bfrtip',
    ),
  ),
  'datatables-html' => 
  array (
    'namespace' => 'LaravelDataTables',
    'table' => 
    array (
      'class' => 'table',
      'id' => 'dataTableBuilder',
    ),
    'callback' => 
    array (
      0 => '$',
      1 => '$.',
      2 => 'function',
    ),
    'script' => 'datatables::script',
    'editor' => 'datatables::editor',
  ),
  'datatables' => 
  array (
    'search' => 
    array (
      'smart' => true,
      'multi_term' => true,
      'case_insensitive' => true,
      'use_wildcards' => false,
      'starts_with' => false,
    ),
    'index_column' => 'DT_RowIndex',
    'engines' => 
    array (
      'eloquent' => 'Yajra\\DataTables\\EloquentDataTable',
      'query' => 'Yajra\\DataTables\\QueryDataTable',
      'collection' => 'Yajra\\DataTables\\CollectionDataTable',
      'resource' => 'Yajra\\DataTables\\ApiResourceDataTable',
    ),
    'builders' => 
    array (
    ),
    'nulls_last_sql' => ':column :direction NULLS LAST',
    'error' => NULL,
    'columns' => 
    array (
      'excess' => 
      array (
        0 => 'rn',
        1 => 'row_num',
      ),
      'escape' => '*',
      'raw' => 
      array (
        0 => 'action',
      ),
      'blacklist' => 
      array (
        0 => 'password',
        1 => 'remember_token',
      ),
      'whitelist' => '*',
    ),
    'json' => 
    array (
      'header' => 
      array (
      ),
      'options' => 0,
    ),
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 30,
  ),
  'datatables-fractal' => 
  array (
    'includes' => 'include',
    'serializer' => 'League\\Fractal\\Serializer\\DataArraySerializer',
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
