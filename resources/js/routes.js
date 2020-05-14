import Welcome from './view/Welcome'
import Home from './view/Home';
import Login from './views/authViews/Login';
import Register from './views/authViews/Register';

export default [
    {
        path: '/',
        name: 'welcome',
        component: Welcome
    },
    {
        path: '/home',
        name: 'home',
        component: Home
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    }
];