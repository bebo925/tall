const colors = require("tailwindcss/colors");

module.exports = {
    content: [
        "./app/**/*.php",
        "./resources/**/*.html",
        "./resources/**/*.js",
        "./resources/**/*.php",
        "./vendor/wire-elements/modal/resources/views/**/*.php",
        "./vendor/livewire/livewire/src/views/**/*.php",
        "./vendor/fcps/tall/resources/views/**/*.php",
        "./vendor/livewire-ui/modal/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
    ],
    safelist: [
        "sm:max-w-2xl",
        "sm:max-w-6xl",
        "lg:max-w-2xl",
        "sm:w-full",
        "sm:max-w-md",
        "sm:max-w-xl",
        "xl:max-w-5xl",
        "lg:max-w-3xl",
        "2xl:max-w-6xl",
    ],
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("@tailwindcss/line-clamp"),
    ],
    theme: {
        extend: {
            colors: {
                primary: colors.indigo,
                secondary: colors.gray,
                positive: colors.emerald,
                negative: colors.red,
                warning: colors.amber,
                info: colors.blue,
            },
        },
    },
    plugins: [],
};
