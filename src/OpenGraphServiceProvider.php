<?php

namespace Iamfredric\OpenGraph;

use Iamfredric\OpenGraph\Clients\LaravelClient;
use Illuminate\Support\ServiceProvider;

class OpenGraphServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(OpenGraph::class, fn () => new OpenGraph(new LaravelClient()));
    }
}
