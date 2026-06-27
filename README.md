# 🏔️ Lavalpine Core
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

<p align="center">
  <img src="art/welcome.png?v=2" alt="Lavalpine Welcome Screen" width="800">
</p>

---

## 🌟 Introduction

Building modern, reactive Laravel applications shouldn't mean wrestling with complex JavaScript frameworks or writing repetitive boilerplate code. **Lavalpine Core** is designed to give you the ultimate developer experience (DX) right out of the box by leveraging the official TALL stack.

Whether you're building a dashboard, an admin panel, or a full-fledged SaaS product, Lavalpine equips your project with robust global UI components (Modals and Toasts) driven by single-file Volt components.

---

## 🎯 Core Features

Lavalpine transforms your standard Laravel installation into a highly interactive, SPA-like experience without writing a single line of React or Vue.

### 1. Real-Time Data Table (`lavalpine-live-table`)
A powerful, reactive data grid.
- **Instant Search:** Filters rows instantly as you type (`wire:model.live.debounce`).
- **Inline Editing:** Click on specific cells to edit and save data directly to the database without page reloads.
- **Real-Time Polling:** Automatically refreshes data (`wire:poll`) to keep users in sync.

<p align="center"><img src="art/live-table.png?v=2" alt="Live Table Preview" width="800"></p>

### 2. Multi-Step Onboarding Wizard (`lavalpine-wizard`)
A complex form broken down into digestible steps.
- **Alpine.js Transitions:** Slick sliding animations between steps.
- **Backend Validation:** Validates data on the backend (Livewire) before allowing the user to proceed.
- **Database Ready:** Automatically saves the aggregated form data to the provided `Registration` model.

<p align="center"><img src="art/wizard.png?v=2" alt="Wizard Preview" width="800"></p>

### 3. Global Dynamic Modal System (`lavalpine-modal`)
A universally accessible modal system built with Alpine.js and Livewire.
- **Trigger Anywhere:** Can be triggered from any component using a simple event.
- **Dynamic Content:** Renders dynamic Livewire components inside the modal body on the fly.

### 4. Global Toast Notifications (`lavalpine-toast`)
A sleek, non-intrusive notification system ready out of the box. Supports `success`, `error`, `info`, and `warning` states.

### 5. Spotlight Command Palette (`lavalpine-spotlight`)
A macOS-style global search interface triggered via `Ctrl + K` (or `Cmd + K`).

---

## 🛠️ System Dependencies

To ensure a smooth experience and prevent version conflicts, Lavalpine explicitly requires the following modern stack:
- **PHP:** 8.2 or higher
- **Laravel Framework:** 11.x, 12.x, or 13.x
- **Livewire:** v3.x (with Volt)
- **Tailwind CSS:** v4.x (Uses explicit `@custom-variant dark`)

---

## 🚀 Quick Start / Installation

Getting started is incredibly easy. You can install and configure the entire stack in less than a minute.

```bash
# 1. Require the package via Composer
composer require lavalpine/core

# 2. Run the installer to publish stubs, models, and migrations
php artisan lavalpine:install

# 3. Start your Vite development server
npm run dev
```

> **Note:** The installation command will automatically run `php artisan migrate` to set up the required tables for the Wizard component.

---

## 💡 Code Snippets

Integrating Lavalpine components into your existing code is seamless.

### Triggering a Toast Notification
You can trigger a beautiful toast directly from your Livewire component or Controller:

```php
// In your Livewire Component
$this->dispatch('show-toast', message: 'Data berhasil disimpan!', type: 'success');
```

### Triggering the Global Modal
To open a modal from any Blade view using Alpine:

```html
<button @click="$dispatch('open-lavalpine-modal', { component: 'your-component' })">
    Open Modal
</button>
```


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
