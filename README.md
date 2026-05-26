# Agency Theme

WordPress theme for digital agency websites. Built from scratch — no Elementor, no Divi, just PHP, React and SCSS.

This is a portfolio project I built to practice modern WordPress development: custom post types, native Gutenberg blocks, and proper security patterns.

## Features

- CPT `project` with `service_type` taxonomy for portfolio
- Native Gutenberg block (Project Hero) — React, `InspectorControls`, live preview
- Customizer settings — hero text, accent color, phone, address
- Project meta fields — client, year, URL — with nonce validation and sanitization
- SCSS split into partials (base / layout / components)
- Responsive layout, sticky header, sticky footer

## Stack

- PHP 8.2
- React via `@wordpress/scripts`
- SCSS with `@use` module system
- WordPress 6.7+

## Local Setup

Requires DDEV, Node.js 20+, npm 10+.

```bash
git clone https://github.com/alexphex/agency-theme.git wp-content/themes/agency-theme
cd wp-content/themes/agency-theme
npm install
npm run build


Then activate the theme in WordPress admin.

For development with auto-rebuild:

```bash
npm run start
```

## Notes

Meta fields use nonce validation to prevent CSRF. All output is escaped with `esc_html()`, `esc_url()`, `esc_attr()`. The Gutenberg block loads its CSS only when the block is present on the page.
