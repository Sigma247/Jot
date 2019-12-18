import vue from 'vue';
import VueRouter from 'vue-router';
import App from './components/App';
//VueRouter is a plugin, to use it you have to do it like this Vue.use(the name of the plugin)
vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/', component: App}
    ],
    mode: 'history' //for new browsers
});