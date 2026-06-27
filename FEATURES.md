# 🚀 Lavalpine Core Features

Lavalpine is the ultimate **TALL Stack** (Tailwind, Alpine.js, Laravel, Livewire) starter kit, designed to help developers build highly interactive web applications without the complexity of traditional JavaScript frameworks (like React or Vue) or REST APIs.

Here is a comprehensive list of out-of-the-box features included in the Lavalpine Stack:

## 🌟 Core UI Systems

### 1. Global Dynamic Modal (`lavalpine-modal`)
A universally accessible modal system built with Alpine.js and Livewire.
- **Trigger Anywhere:** Can be triggered from any component using Livewire events (`$dispatch('open-modal')`).
- **Smooth Transitions:** Beautiful enter/leave animations handled by Alpine.js.
- **Dynamic Content:** Can render dynamic Livewire components inside the modal body on the fly.

### 2. Global Toast Notifications (`lavalpine-toast`)
A sleek, non-intrusive notification system.
- **Types:** Supports `success`, `error`, `info`, and `warning` states.
- **Auto-dismiss:** Toasts automatically disappear after a few seconds.
- **Backend Dispatch:** Easily trigger a toast from your PHP code after a successful action (e.g., `$this->dispatch('show-toast', message: 'Saved!', type: 'success')`).

### 3. Spotlight Command Palette (`lavalpine-spotlight`)
A macOS-style global search interface.
- **Keyboard Shortcut:** Instantly open the palette from anywhere using `Ctrl + K` (or `Cmd + K`).
- **Quick Navigation:** Quickly jump to different pages or execute global actions without touching the mouse.

---

## ⚡ Advanced Interactive Components

### 4. Real-Time Data Table (`lavalpine-live-table`)
A powerful, reactive data grid that feels like a Single Page Application (SPA).
- **Instant Search:** Filters rows instantly as you type (`wire:model.live.debounce`).
- **Inline Editing:** Click on specific cells (like 'Role') to edit and save data directly to the database without page reloads.
- **Real-Time Polling:** Automatically refreshes data in the background (`wire:poll`) to keep multiple users in sync.
- **Targeted Loading States:** Shows loading spinners only on the specific row or cell being updated.

### 5. Multi-Step Onboarding Wizard (`lavalpine-wizard`)
A complex form broken down into digestible steps.
- **Alpine.js Transitions:** Slick sliding animations between steps.
- **Step-by-step Validation:** Validates data on the backend (Livewire) before allowing the user to proceed to the next step.
- **Database Integration:** Automatically saves the aggregated form data to the MySQL database upon final submission.

### 6. Interactive UI Blocks (`lavalpine-ui-blocks`)
Pre-built micro-components for common complex UI needs:
- **Autocomplete/Select:** Searchable dropdowns with instant Livewire filtering.
- **Date Picker:** Native inputs enhanced with Alpine and Tailwind styling.
- **File Upload Preview:** Instantly preview images (Livewire Temporary URLs) before they are permanently saved to the server.

---

## 🛠️ Developer Experience & Architecture

### 7. Seamless Dark Mode
- **Tailwind v4 Integration:** Fully configured to use Tailwind CSS v4's explicit `@custom-variant dark`.
- **Alpine.js State Management:** Automatically reads the user's OS preference (`prefers-color-scheme`) and persists their manual choice in browser `localStorage`.
- **Instant Initialization:** No "flash of light mode" when refreshing the page.

### 8. Automated Database Setup
- **Publishable Models & Migrations:** The `lavalpine:install` command automatically copies the `Registration` model and database migrations to the host application.
- **Auto-Migrate:** Automatically runs `php artisan migrate` during installation so the developer can start testing instantly without manual DB setup.

### 9. Premium Layout & Design
- **Responsive Dashboard:** A beautiful, responsive layout out of the box using modern Tailwind utilities (glassmorphism, gradients, micro-interactions).
- **Volt Architecture:** Uses Laravel Livewire Volt (Single File Components) to keep PHP logic and Blade views elegantly contained in a single file, reducing context switching.
