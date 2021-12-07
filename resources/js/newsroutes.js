import AllNews from './components/AllNews.vue';
import CreateNews from './components/CreateNews.vue';
import EditNews from './components/EditNews.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllNews
    },
    {
        name: 'create',
        path: '/create',
        component: CreateNews
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditNews
    }
];