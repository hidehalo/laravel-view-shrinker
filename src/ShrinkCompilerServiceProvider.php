<?php
/**
 * @author hidehalo <tianchen_cc@yeah.net>
 */
namespace Hidehalo\View\Compilers;

use Illuminate\Support\ServiceProvider;

class ShrinkCompilerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('blade.compiler', function () {
            return new ShrinkCompiler(
                $this->app['files'], $this->app['config']['view.compiled']
            );
        });
    }
}
