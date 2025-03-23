import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                primary: "#111113",
                secondary: "#1a1a1e",
                tertiary: "#232327",

                accent: {
                  purple: "#6f3dc9",
                  orange: "#ff8c42",
                  yellow: "#ffd700",
                },
                text: {
                  primary: "#ffffff",
                  secondary: "#cfcfcf",
                  muted: "#8c8c8c",
                },
                button: {
                  DEFAULT: "#28282d",
                  hover: "#3a3a42",
                  active: "#4e4e58",
                },
                status: {
                  success: "#4caf50",
                  warning: "#ff9800",
                  error: "#f44336",
                  info: "#2196f3",
                },
                border: "#33333a",
                shadow: "rgba(0, 0, 0, 0.5)",
            },
        },
    },
    blocklist: [
        'container',
        'collapse',
        'offcanvas',
        'dropdown',
    ],
    plugins: [forms],
};
