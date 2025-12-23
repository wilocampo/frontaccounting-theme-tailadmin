# TailAdmin Theme for FrontAccounting

A modern, responsive theme for [FrontAccounting](https://frontaccounting.com/) based on [TailAdmin](https://tailadmin.com/) design system.

![License](https://img.shields.io/badge/license-GPL--3.0-blue.svg)
![FrontAccounting](https://img.shields.io/badge/FrontAccounting-2.4.x-green.svg)

## ✨ Features

- 🎨 **Modern Design** - Clean, professional UI based on TailAdmin
- 🌙 **Dark Mode** - Full dark mode support with smooth transitions
- 📱 **Responsive** - Mobile-friendly sidebar and layout
- 🎯 **Heroicons** - Beautiful SVG icons throughout
- ⚡ **Alpine.js** - Lightweight interactivity for menus and toggles
- 🎨 **Tailwind CSS** - Utility-first CSS framework
- 🔔 **Styled Alerts** - Beautiful error, warning, and info messages
- 📅 **Modern Date Picker** - Styled calendar with icon inside input
- 🔘 **Consistent Buttons** - Color-coded action buttons

## 📸 Screenshots

<!-- Add screenshots here -->

## 📋 Requirements

- FrontAccounting 2.4.x or higher
- Modern web browser (Chrome, Firefox, Safari, Edge)

## 🚀 Installation

### Method 1: Download ZIP

1. Download the latest release from [Releases](../../releases)
2. Extract the `tailadmin` folder to your FrontAccounting `themes/` directory
3. Log in to FrontAccounting as administrator
4. Go to **Setup** → **User Preferences** or **Company Setup**
5. Select **tailadmin** from the Theme dropdown
6. Save changes

### Method 2: Git Clone

```bash
cd /path/to/frontaccounting/themes/
git clone https://github.com/YOUR_USERNAME/fa-theme-tailadmin.git tailadmin
```

## 📁 Directory Structure

```
tailadmin/
├── index.php           # Theme index (redirect)
├── renderer.php        # Main theme renderer
├── default.css         # Theme styles
├── images/
│   └── logo/          # Logo files
├── vendor/
│   ├── alpinejs/      # Alpine.js
│   ├── tailwindcss/   # Tailwind CSS
│   └── fonts/         # Outfit font
└── README.md
```

## 🎨 Customization

### Colors

The theme uses a consistent color palette. Main colors can be customized in `default.css`:

| Color | Variable | Default | Usage |
|-------|----------|---------|-------|
| Brand | `#465fff` | Blue | Primary actions, links |
| Success | `#10b981` | Green | Add, Save, Update buttons |
| Danger | `#ef4444` | Red | Delete, Remove buttons |
| Warning | `#f59e0b` | Amber | Warning alerts |
| Gray | `#6b7280` | Gray | Cancel buttons |

### Logo

Replace the logo files in `images/logo/`:
- `logo.svg` - Light mode logo
- `logo-dark.svg` - Dark mode logo
- `logo-icon.svg` - Collapsed sidebar icon

### Dark Mode

Dark mode is automatically detected from system preferences and can be toggled via the header button. The preference is saved to localStorage.

## 🔧 Button Styling

Buttons are automatically styled based on their value/text:

| Button Text Contains | Color | Icon |
|---------------------|-------|------|
| Add | Green | Plus (+) |
| Update, Save | Green | Save |
| Place, Process, Submit, Confirm | Green | Checkmark |
| Cancel | Gray | X |
| Delete, Remove | Red | Trash |
| Search | Blue | Magnifying glass |

## 📝 Alert Styles

FrontAccounting messages are styled as modern alerts:

- **Error** (`.err_msg`) - Red background with exclamation icon
- **Warning** (`.warn_msg`) - Amber background with warning icon
- **Notice** (`.note_msg`) - Blue background with info icon

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This theme is released under the [GNU General Public License v3.0](LICENSE), the same license as FrontAccounting.

## 🙏 Credits

- [FrontAccounting](https://frontaccounting.com/) - The ERP system
- [TailAdmin](https://tailadmin.com/) - Design inspiration and components
- [Tailwind CSS](https://tailwindcss.com/) - CSS framework
- [Alpine.js](https://alpinejs.dev/) - JavaScript framework
- [Heroicons](https://heroicons.com/) - SVG icons

## 📧 Support

- **FrontAccounting Issues**: [FrontAccounting Forum](https://frontaccounting.com/punbb/)
- **Theme Issues**: [GitHub Issues](../../issues)

---

Made with ❤️ for the FrontAccounting community
