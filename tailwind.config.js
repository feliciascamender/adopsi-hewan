/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {

      // ── FONT ─────────────────────────────────────
      fontFamily: {
        sans: ['Poppins', 'sans-serif'],
      },

      colors: {

        // ── PRIMARY (Ungu) ───────────────────────────
        brand: {
          soft:      '#f5eeff',  // bg-brand-soft      → card bg, hover ringan
          light:     '#c084f5',  // bg-brand-light     → hover btn, gradient
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
