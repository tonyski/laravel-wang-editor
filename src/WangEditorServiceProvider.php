<?php

namespace Tonyski\WangEditor;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

/**
 * Class WangEditorServiceProvider
 *
 * @package Tonyski\WangEditor
 */
class WangEditorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param \Illuminate\Routing\Router $router
     */
    public function boot(Router $router)
    {
        //配置
        $this->publishes([
            __DIR__ . '/config/wang-editor.php' => config_path('wang-editor.php'),
        ], 'config');

        //公共资源
        $this->publishes([
            __DIR__ . '/assets/wang-editor' => public_path('vendor/wang-editor'),
        ], 'assets');

        //路由
        $this->registerRoute($router);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/wang-editor.php', 'wang-editor');
    }

    /**
     * Register routes.
     *
     * @param $router
     */
    protected function registerRoute($router)
    {
        if (!$this->app->routesAreCached()) {
            $router->group(array_merge(['namespace' => __NAMESPACE__], config('wang-editor.route.options', [])), function ($router) {
                $router->post(config('wang-editor.route.name', '/wang-editor/upload'), 'WangEditorController@upload');
            });
        }
    }
}