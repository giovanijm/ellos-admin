import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/appv2.scss',
                'resources/css/app.scss',
                'resources/js/app.js',
                'resources/js/admin/manager-user/permissions.js',
                'resources/js/admin/manager-user/roles.js',
                'resources/js/admin/manager-user/users.js',
                'resources/js/admin/manager-customers/customers.js',
                'resources/js/admin/manager-customers/providers.js',
                'resources/js/admin/jquery.mask.js',
                'resources/js/message-toast.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '$': 'jQuery'
        },
    },
});
