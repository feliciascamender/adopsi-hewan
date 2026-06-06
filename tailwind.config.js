/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],

    safelist: [
    // Brand variants baru
    'bg-brand-lavender', 'text-brand-lavender', 'border-brand-lavender',
    'bg-brand-mauve',    'text-brand-mauve',    'border-brand-mauve',
    'bg-brand-violet',   'text-brand-violet',   'border-brand-violet',
    'bg-brand-grape',    'text-brand-grape',    'border-brand-grape',
    'bg-brand-plum',     'text-brand-plum',     'border-brand-plum',
    'bg-brand-deep',     'text-brand-deep',     'border-brand-deep',
    // Brand yang udah ada (jaga-jaga)
    'bg-brand-soft',     'text-brand-soft',
    'bg-brand-light',    'text-brand-light',
    'bg-brand-secondary','text-brand-secondary',
    'bg-brand-primary',  'text-brand-primary',
    // Accent
    'bg-accent-soft',    'text-accent-soft',
    'bg-accent-base',    'text-accent-base',
    'bg-accent-strong',  'text-accent-strong',
    // Surface
    'bg-surface-alt',    'text-surface-muted',  'text-surface-dark',
    'border-surface-border',
    // Status
    'bg-status-available-bg',   'text-status-available-text',
    'bg-status-pending-bg',     'text-status-pending-text',
    'bg-status-rejected-bg',    'text-status-rejected-text',
    'bg-status-adopted-bg',     'text-status-adopted-text',
  ],
  
  theme: {
    extend: {

      // ── FONT ─────────────────────────────────────
      
        fontFamily: {
        sans: ['Figtree', 'sans-serif'],    // default semua teks
        brand: ['Inter', 'sans-serif'],     // khusus brand & heading
        },
      colors: {

        // ── PRIMARY (Ungu) ───────────────────────────
        brand: {
          soft:      '#f5eeff',  // bg-brand-soft      → card bg, hover ringan
          lavender:  '#E5C2FD',  // bg-brand-light 3
          mauve:     '#906EA7',  // bg-brand-light 2
          light:     '#c084f5',  // bg-brand-light     → hover btn, gradient
          violet:    '#A474CF',  // bg-brand-secondary 5
          grape:     '#6F4E86',  // bg-brand-secondary 4
          plum:      '#563C73',  // bg-brand-secondary 3
          deep:      '#54346b',  // bg-brand-secondary 2
          secondary: '#7c2fa8',  // bg-brand-secondary → btn secondary
          primary:   '#3f0d61',  // bg-brand-primary   → navbar, btn utama
        },

        // ── ACCENT (Amber) ───────────────────────────
        accent: {
          soft:   '#fff8ed',  // bg-accent-soft   → bg badge pending
          base:   '#fbbf24',  // bg-accent-base   → CTA di atas ungu, bintang
          strong: '#d97706',  // text-accent-strong → teks di atas amber
        },

        // ── NEUTRAL (Abu) ────────────────────────────
        surface: {
          white:  '#ffffff',  // bg-surface-white  → bg halaman utama
          alt:    '#f8f7fa',  // bg-surface-alt    → section selang-seling
          border: '#e4e0eb',  // border-surface-border → border card & input
          muted:  '#6b6578',  // text-surface-muted → teks sekunder
          dark:   '#1a0a26',  // text-surface-dark  → teks utama
        },

        // ── SEMANTIC (Status hewan & pengajuan) ──────
        status: {
          // Tersedia
          'available-bg':   '#dcfce7',
          'available-text': '#16a34a',
          // Pending review
          'pending-bg':     '#fef9c3',
          'pending-text':   '#ca8a04',
          // Ditolak
          'rejected-bg':    '#fee2e2',
          'rejected-text':  '#dc2626',
          // Sudah diadopsi
          'adopted-bg':     '#e0e7ff',
          'adopted-text':   '#4f46e5',
        },

      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),  
  ],
}
