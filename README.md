# 🏔️ Lavalpine Core

<p align="center">
  <img src="https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExNTZrcnQyOXFqNDhhdnAzZTNpeDA5MmNxOGZ6ODZveGQyZDcwNHd3biZlcD12MV9pbnRlcm5hbF9naWZzX2dpZklkJmN0PWc/xT9IgzoKnwFNmISR8I/giphy.gif" alt="Coding Animation" width="100%" style="border-radius: 12px; max-height: 400px; object-fit: cover;">
</p>

<p align="center">
  A SaaS-ready Laravel starter kit package combining Livewire Volt and Alpine.js with a global dynamic modal and toast notification system, elegantly styled with Tailwind CSS.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x|12.x|13.x-FF2D20?style=for-the-badge&logo=laravel" alt="Laravel Version">
  <img src="https://img.shields.io/badge/Livewire-3.x-FB70A9?style=for-the-badge&logo=livewire" alt="Livewire Version">
  <img src="https://img.shields.io/badge/Alpine_JS-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=white" alt="Alpine.js">
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">
  <a href="https://packagist.org/packages/lavalpine/core"><img src="https://img.shields.io/packagist/dt/lavalpine/core?style=for-the-badge&color=blue" alt="Total Downloads"></a>
</p>

---

## 🌟 Introduction

Building modern, reactive Laravel applications shouldn't mean wrestling with complex JavaScript frameworks or writing repetitive boilerplate code. **Lavalpine Core** is designed to give you the ultimate developer experience (DX) right out of the box by leveraging the official TALL stack.

Whether you're building a dashboard, an admin panel, or a full-fledged SaaS product, Lavalpine equips your project with robust global UI components (Modals and Toasts) driven by single-file Volt components.

---

## 🎯 Features

- **Global Dynamic Modal System:** Render any Livewire Volt component inside a beautifully animated modal from anywhere in your application using a simple Alpine.js event dispatch. No more hidden `<dialog>` elements polluting your views!
- **Global Toast Notification:** A sleek, self-dismissing toast notification system ready out of the box. Notify users of successful actions straight from your PHP backend.
- **Modern Tech Stack:** Built natively for the modern TALL stack ecosystem, prioritizing Single File Components (Volt) for maximum developer experience.
- **Automated Installation:** Simple CLI command to automatically inject the blueprints and assets directly into your fresh Laravel project.
- **Tailwind v4 Ready:** Fully pre-configured for the latest Tailwind CSS standalone engine.

---

## 🛠️ System Requirements

- **PHP:** 8.2 or higher
- **Laravel Framework:** 11.x, 12.x, or 13.x
- **Livewire Volt:** 1.0 or higher
- **Node.js & NPM:** For building Vite assets

---

## 🚀 Installation & Usage

### 1. Require the Package
Install Lavalpine Core via Composer in your Laravel application:

```bash
composer require lavalpine/core
```

### 2. Run the Installer
Execute the artisan command. This will scaffold the global modal, toast, layout, and Tailwind CSS configurations directly into your application's `resources` directory:

```bash
php artisan lavalpine:install
```

### 3. Start Development
Compile your assets and start your local server:

```bash
npm run dev
```

---

## 💡 How to Use

### Triggering the Global Modal
To trigger the global modal from any blade file, simply dispatch the `open-lavalpine-modal` event from Alpine.js and provide the name of your target Volt component:

```html
<button @click="$dispatch('open-lavalpine-modal', { component: 'your-volt-component-name' })" class="px-4 py-2 bg-indigo-600 text-white rounded-lg">
    Open Modal
</button>
```

### Triggering Toast Notifications
To trigger a toast notification directly from your backend Volt logic after an action (like saving data):

```php
<?php
use function Livewire\Volt\{state};

$save = function () {
    // Save your data here...
    
    // Trigger the global toast
    $this->dispatch('show-toast', message: 'Successfully saved the data!');
};
?>
```

---

## 🎨 Customization

Because Lavalpine Core publishes its components directly into your `resources/views/livewire` and `resources/views/layouts` directories, you have absolute freedom to customize the HTML, Tailwind classes, and Alpine animations to match your brand's specific design guidelines.

---

## 🤝 Contributing & Contributors

We welcome contributions from the community! Lavalpine is open-source and powered by the collective effort of developers around the world. 

If you'd like to contribute:
1. Fork the repository.
2. Create your feature branch (`git checkout -b feature/amazing-feature`).
3. Commit your changes (`git commit -m 'Add some amazing feature'`).
4. Push to the branch (`git push origin feature/amazing-feature`).
5. Open a Pull Request.

### 🎉 Thanks to Contributors
A massive thank you to everyone who has contributed to making Lavalpine better. Your pull requests, bug reports, and feature suggestions are deeply appreciated!

<a href="https://github.com/kirabian/lavalpine-core/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=kirabian/lavalpine-core" alt="Contributors" />
</a>

---

## 🛡️ Security Vulnerabilities

If you discover a security vulnerability within Lavalpine, please send an e-mail to Fabian Syah Al Ghiffari via [fabiansyahalghiffarireal@gmail.com](mailto:fabiansyahalghiffarireal@gmail.com). All security vulnerabilities will be promptly addressed.

---

## 📜 License

The Lavalpine Core package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## ☕ Support This Project

If you find this starter kit helpful and it saves you hours of boilerplate coding, consider supporting my work! It helps keep the open-source maintenance alive.

<a href="https://saweria.co/kirabian" target="_blank">
  <img src="https://img.shields.io/badge/Saweria-Buy_me_a_coffee-FFDD00?style=for-the-badge&logo=buy-me-a-coffee&logoColor=black" alt="Buy Me A Coffee">
</a>
