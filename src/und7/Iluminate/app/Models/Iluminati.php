<?php
namespace App\Models;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Illuminate{
    private static $db_host = DBHOST;
    private static $db_user = DBUSER;
    private static $db_pass = DBPASS;
    private static $db_name = DBNAME;
    private static $db_port = DBPORT;
    private $mensaje ='';
    private $capsule ;
    
    abstract protected function get();
    abstract protected function set();
    abstract protected function edit();
    abstract protected function delete();
    public function __construct()
    {
        $this->capsule = new Capsule;
        $this->capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => self::$db_host,
            'database'  => self::$db_name,
            'username'  => self::$db_user,
            'password'  => self::$db_pass,
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        
    }
    public function open_db(){
        $this->capsule->setEventDispatcher(new Dispatcher(new Container));
        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();

    }
}