<?php

namespace Lavalpine\Core\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    // The command to be executed by the user
    protected $signature = 'lavalpine:install';

    protected $description = 'Automatically install Lavalpine Core (Volt setup & UI scaffolding)';

    public function handle()
    {
        $this->info('🏔️  Starting Lavalpine Starter Kit Installation...');

        // 1. Run 'composer require livewire/volt' in the background
        $this->info('📦 Downloading Livewire Volt dependencies via Composer...');
        $this->executeProcess(['composer', 'require', 'livewire/volt']);

        // 2. Run 'php artisan volt:install'
        $this->info('⚡ Configuring Livewire Volt architecture...');
        $this->executeProcess(['php', 'artisan', 'volt:install']);

        // 3. Scaffold Lavalpine Core Stub Files
        $this->info('🏗️  Synchronizing Lavalpine UI components...');
        $filesystem = new Filesystem();

        // Ensure layouts directory exists
        if (!$filesystem->isDirectory(resource_path('views/layouts'))) {
            $filesystem->makeDirectory(resource_path('views/layouts'), 0755, true);
        }

        // Ensure livewire directory exists (for Volt)
        if (!$filesystem->isDirectory(resource_path('views/livewire'))) {
            $filesystem->makeDirectory(resource_path('views/livewire'), 0755, true);
        }

        // Copy Main Base Layout
        $filesystem->copy(__DIR__.'/../../../stubs/app.blade.php.stub', resource_path('views/layouts/app.blade.php'));
        $this->comment('✔ Main layout [views/layouts/app.blade.php] successfully installed.');
        
        // Copy Premium Welcome UI
        $filesystem->copy(__DIR__.'/../../../stubs/welcome.blade.php.stub', resource_path('views/welcome.blade.php'));
        $this->comment('✔ Premium Welcome UI [views/welcome.blade.php] successfully installed.');
        
        // Copy Core Modal Component (Volt)
        $filesystem->copy(__DIR__.'/../../../stubs/lavalpine-modal.blade.php.stub', resource_path('views/livewire/lavalpine-modal.blade.php'));
        $this->comment('✔ Core component [views/livewire/lavalpine-modal.blade.php] successfully installed.');
        
        // Copy Demo Modal Component (Volt)
        $filesystem->copy(__DIR__.'/../../../stubs/welcome-demo-modal.blade.php.stub', resource_path('views/livewire/welcome-demo-modal.blade.php'));
        
        // Copy Core Toast Notification Component
        $filesystem->copy(__DIR__.'/../../../stubs/lavalpine-toast.blade.php.stub', resource_path('views/livewire/lavalpine-toast.blade.php'));
        $this->comment('✔ Helper component [views/livewire/lavalpine-toast.blade.php] successfully installed.');
        
        // Copy Core Spotlight Component
        $filesystem->copy(__DIR__.'/../../../stubs/lavalpine-spotlight.blade.php.stub', resource_path('views/livewire/lavalpine-spotlight.blade.php'));
        $this->comment('✔ Global component [views/livewire/lavalpine-spotlight.blade.php] successfully installed.');
        
        // Copy Advanced Features Stubs
        $filesystem->copy(__DIR__.'/../../../stubs/lavalpine-live-table.blade.php.stub', resource_path('views/livewire/lavalpine-live-table.blade.php'));
        $filesystem->copy(__DIR__.'/../../../stubs/lavalpine-wizard.blade.php.stub', resource_path('views/livewire/lavalpine-wizard.blade.php'));
        $filesystem->copy(__DIR__.'/../../../stubs/lavalpine-ui-blocks.blade.php.stub', resource_path('views/livewire/lavalpine-ui-blocks.blade.php'));
        $filesystem->copy(__DIR__.'/../../../stubs/dashboard.blade.php.stub', resource_path('views/livewire/dashboard.blade.php'));
        $this->comment('✔ Advanced UI components (Live Table, Wizard, Dashboard) successfully installed.');

        // Register Dashboard Route
        $routePath = base_path('routes/web.php');
        if ($filesystem->exists($routePath)) {
            $routes = $filesystem->get($routePath);
            if (!str_contains($routes, "Volt::route('/dashboard'")) {
                $filesystem->append($routePath, "\n\\Livewire\\Volt\\Volt::route('/dashboard', 'dashboard')->name('dashboard');\n");
                $this->comment('✔ Dashboard route successfully registered in routes/web.php.');
            }
        }

        // Database & Models
        $filesystem->copy(__DIR__.'/../../../stubs/Registration.php.stub', app_path('Models/Registration.php'));
        $this->comment('✔ Registration Model [app/Models/Registration.php] successfully installed.');
        
        $filesystem->copy(__DIR__.'/../../../stubs/create_registrations_table.php.stub', database_path('migrations/2026_01_01_000000_create_registrations_table.php'));
        $this->comment('✔ Database Migration [create_registrations_table.php] successfully installed.');

        // Copy Tailwind v4 CSS Directive
        $filesystem->copy(__DIR__.'/../../../stubs/app.css.stub', resource_path('css/app.css'));
        $this->comment('✔ Modern configuration [css/app.css] successfully updated with Tailwind directives.');

        // Run migrations
        $this->info('🗄️ Running database migrations...');
        $this->executeProcess(['php', 'artisan', 'migrate']);

        $this->info('🎉 [SUCCESS] Lavalpine Stack successfully installed!');
        $this->info('👉 Please run `npm run dev` in your project terminal.');
    }

    /**
     * Internal helper to execute terminal commands in real-time
     */
    protected function executeProcess(array $command)
    {
        $process = new Process($command, base_path(), null, null, null);
        $process->setTimeout(null);
        
        // Menampilkan log download composer/artisan langsung ke layar pengguna
        $process->run(function ($type, $buffer) {
            $this->output->write($buffer);
        });
    }
}
