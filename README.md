# 🏔️ Lavalpine Core

<p align="center">
  A SaaS-ready Laravel starter kit package combining Livewire Volt and Alpine.js with a global dynamic modal and toast notification system, elegantly styled with Tailwind CSS.
</p>

---

## 🌟 Features

- **Global Dynamic Modal System:** Render any Livewire Volt component inside a beautifully animated modal from anywhere in your application using a simple Alpine.js event dispatch.
- **Global Toast Notification:** A sleek, self-dismissing toast notification system ready out of the box.
- **Modern Tech Stack:** Built natively for the modern TALL stack ecosystem, prioritizing Single File Components (Volt) for maximum developer experience.
- **Automated Installation:** Simple CLI command to automatically inject the blueprints and assets directly into your fresh Laravel project.

## 🛠️ Tech Stack

- **Backend:** Laravel 11.x / 12.x / 13.x (PHP 8.2+)
- **Reactivity:** Livewire 3 + Livewire Volt
- **Frontend & Animations:** Alpine.js
- **Styling:** Tailwind CSS v4

## 🚀 Installation & Usage

### 1. Requirements
Ensure you have installed a fresh Laravel application and the [Livewire Volt](https://livewire.laravel.com/docs/volt) package.

### 2. Install the Package
Install Lavalpine Core via Composer:

```bash
composer require lavalpine/core
```

### 3. Run the Installer
Execute the artisan command to scaffold the global modal, toast, layout, and Tailwind CSS configurations directly into your application:

```bash
php artisan lavalpine:install
```

### 4. Start Development
Run your Vite development server:

```bash
npm run dev
```

### Usage Example
To trigger the global modal from any blade file, simply dispatch the `open-lavalpine-modal` event from Alpine.js and provide the name of your target Volt component:

```html
<button @click="$dispatch('open-lavalpine-modal', { component: 'your-volt-component-name' })">
    Open Modal
</button>
```

To trigger the toast notification from your backend Volt logic:

```php
$this->dispatch('show-toast', message: 'Successfully saved the data!');
```

## 📜 License

The Lavalpine Core package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## ☕ Support This Project

If you find this starter kit helpful and it saves you hours of boilerplate coding, consider supporting my work!

<a href="https://saweria.co/kirabian" target="_blank">
  <img src="https://img.shields.io/badge/Saweria-Buy_me_a_coffee-FFDD00?style=for-the-badge&logo=buy-me-a-coffee&logoColor=black" alt="Buy Me A Coffee">
</a>
