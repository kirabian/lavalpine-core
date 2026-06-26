<?php

namespace Lavalpine\Core\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{
    protected $signature = 'lavalpine:install';
    protected $description = 'Instalasi otomatis Lavalpine Core components (Modal, Toast, Layouts, & Tailwind Setup)';

    public function handle()
    {
        $this->info('🏔️ Memulai instalasi Lavalpine Starter Kit...');
        $filesystem = new Filesystem();

        // 1. Memastikan folder layout utama tersedia
        if (!$filesystem->isDirectory(resource_path('views/layouts'))) {
            $filesystem->makeDirectory(resource_path('views/layouts'), 0755, true);
        }

        // 1b. Memastikan folder livewire tersedia
        if (!$filesystem->isDirectory(resource_path('views/livewire'))) {
            $filesystem->makeDirectory(resource_path('views/livewire'), 0755, true);
        }

        // 2. Menyalin Berkas Layout Utama
        $filesystem->copy(
            __DIR__.'/../../../stubs/app.blade.php.stub',
            resource_path('views/layouts/app.blade.php')
        );
        $this->comment('✔ Berkas layout utama [views/layouts/app.blade.php] berhasil dipasang.');

        // 3. Menyalin Komponen Core Modal (Volt)
        $filesystem->copy(
            __DIR__.'/../../../stubs/lavalpine-modal.blade.php.stub',
            resource_path('views/livewire/lavalpine-modal.blade.php')
        );
        $this->comment('✔ Komponen utama [views/livewire/lavalpine-modal.blade.php] berhasil dipasang.');

        // 4. Menyalin Komponen Core Toast Notifikasi
        $filesystem->copy(
            __DIR__.'/../../../stubs/lavalpine-toast.blade.php.stub',
            resource_path('views/livewire/lavalpine-toast.blade.php')
        );
        $this->comment('✔ Komponen pembantu [views/livewire/lavalpine-toast.blade.php] berhasil dipasang.');

        // 5. Memperbarui Aset CSS Tailwind Modern
        $filesystem->copy(
            __DIR__.'/../../../stubs/app.css.stub',
            resource_path('css/app.css')
        );
        $this->comment('✔ Konfigurasi modern [css/app.css] berhasil disesuaikan dengan directive Tailwind.');

        $this->info('🚀 Lavalpine Stack berhasil dikonfigurasi sepenuhnya! Jalankan `npm run dev` untuk memulai.');
    }
}
