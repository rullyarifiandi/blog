
import axios from 'axios'
import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import PerfectScrollbar from 'vue3-perfect-scrollbar'
import 'vue3-perfect-scrollbar/dist/vue3-perfect-scrollbar.css'

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

InertiaProgress.init({
    color: '#7c3aed',
    showSpinner: true,
}) 

createInertiaApp({
    title: title => `${title}`,
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(PerfectScrollbar)
      .component('Head', Head)
      .component('Link', Link)
      .mixin({ methods: { route: window.route } })
      .mount(el)
  },
})

