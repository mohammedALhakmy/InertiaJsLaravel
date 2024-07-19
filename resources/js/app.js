import { createApp, h } from 'vue'
// import { createInertiaApp,Link } from '@inertiajs/vue3'
import { createInertiaApp } from '@inertiajs/vue3'
import NProgress from 'nprogress'
import Layout from "./Pages/Shsred/Layout.vue";
import {Link,Head} from "@inertiajs/inertia-vue3";

createInertiaApp({
    resolve: async name => {
        const pages =await import.meta.glob('./Pages/**/*.vue', { eager: true })
        const page = pages[`./Pages/${name}.vue`];
        if (page.default.layout === undefined) {
            page.default.layout = Layout;
        }
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component("Link",Link)
            .component("Head",Head)
            .mount(el)
    },
    // title: title =>  "My App :" +title,
    // title: title =>  title+ "-My App ",
    title: title =>  `My App - ${title}`,
    progress: {
        delay: 200,
        color: '#dd2222',
        includeCSS: true,
        showSpinner: true,
    },
})
NProgress.start();
