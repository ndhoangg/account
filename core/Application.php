<?php 
namespace starter\core;


class Application {
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    private static $app = NULL;
    /**
     * Construct an application instance, 
     * initialize environment variables
     * and SQL connection
     */
    private function __construct()
    {
        // $ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->router = new Router($this->request);
        include_once dirname(__DIR__) . "/init.php";
        include_once dirname(__DIR__).'/repositories/InitSQL.php';
    }

    public static function getInstance() {
        if (static::$app) {
            return static::$app;
        }
        static::$app = new Application();
        return static::$app;
    }

    public function run()
    {
        $this->router->resolve();
    }
}