/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                // Warna utama aplikasi — bisa diganti sesuai selera
                primary: {
                    50:  '#fdf2f8',
                    100: '#fce7f3',
                    500: '#ec4899',
                    600: '#db2777',
                    700: '#be185d',
                },
                shelter: {
                    800: '#1e293b',
                    900: '#0f172a',
                }
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}