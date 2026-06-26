<?php

namespace Lavalpine\Core\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    // Perintah yang akan dieksekusi pengguna di laptop lain
    protected $signature = 'lavalpine:install';

    protected $description = 'Instalasi otomatis Lavalpine Core (Otomatis install Volt & Scaffolding UI)';

    public function handle()
    {
        $this->info('🏔️  Memulai Instalasi Lavalpine Starter Kit...');

        // 1. Jalankan 'composer require livewire/volt' otomatis di latar belakang
        $this->info('📦 Mengunduh dependensi Livewire Volt via Composer...');
        $this->executeProcess(['composer', 'require', 'livewire/volt']);

        // 2. Jalankan 'php artisan volt:install' otomatis
        $this->info('⚡ Mengonfigurasi arsitektur Livewire Volt...');
        $this->executeProcess(['php', 'artisan', 'volt:install']);

        // 3. Eksekusi Scaffolding File .stub Lavalpine Core
        $this->info('🏗️  Menyinkronkan komponen antarmuka Lavalpine...');
        $filesystem = new Filesystem();

        // Pastikan folder layouts tersedia
        if (!$filesystem->isDirectory(resource_path('views/layouts'))) {
            $filesystem->makeDirectory(resource_path('views/layouts'), 0755, true);
        }

        // Pastikan folder livewire tersedia (Volt)
        if (!$filesystem->isDirectory(resource_path('views/livewire'))) {
            $filesystem->makeDirectory(resource_path('views/livewire'), 0755, true);
        }

        // Salin Base Layout Utama
        $filesystem->copy(__DIR__.'/../../../stubs/app.blade.php.stub', resource_path('views/layouts/app.blade.php'));
        $this->comment('✔ Berkas layout [views/layouts/app.blade.php] berhasil dipasang.');
        
        // Salin Core Component Modal (Volt) - Ditempatkan di livewire/ agar otomatis dideteksi Volt
        $filesystem->copy(__DIR__.'/../../../stubs/lavalpine-modal.blade.php.stub', resource_path('views/livewire/lavalpine-modal.blade.php'));
        $this->comment('✔ Komponen utama [views/livewire/lavalpine-modal.blade.php] berhasil dipasang.');
        
        // Salin Core Component Toast Notification
        $filesystem->copy(__DIR__.'/../../../stubs/lavalpine-toast.blade.php.stub', resource_path('views/livewire/lavalpine-toast.blade.php'));
        $this->comment('✔ Komponen pembantu [views/livewire/lavalpine-toast.blade.php] berhasil dipasang.');

        // Salin & Sinkronisasi Tailwind v4 Directive CSS
        $filesystem->copy(__DIR__.'/../../../stubs/app.css.stub', resource_path('css/app.css'));
        $this->comment('✔ Konfigurasi modern [css/app.css] berhasil disesuaikan dengan directive Tailwind.');

        $this->info('🎉 [SUCCESS] Lavalpine Stack Berhasil Terpasang Sempurna!');
        $this->info('👉 Silakan jalankan `npm run dev` di terminal proyek barumu.');
    }

    /**
     * Helper internal untuk mengeksekusi perintah terminal secara real-time
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
