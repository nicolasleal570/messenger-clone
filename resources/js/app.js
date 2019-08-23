require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import BootstrapVue from 'bootstrap-vue';
import store from './store';

Vue.use(BootstrapVue);
Vue.use(VueRouter);

// IMPORT OF COMPONENTS
import MessengerComponent from './components/Messenger.vue';
import ExampleComponent from './components/ExampleComponent.vue';

//Vue.component('messenger-component', require('./components/Messenger.vue').default);
Vue.component('contact-component', require('./components/Contact.vue').default);
Vue.component('contact-list-component', require('./components/ContactsList.vue').default);
Vue.component('active-conversation-component', require('./components/ActiveConversation.vue').default);
Vue.component('message-conversation-component', require('./components/MessageConversation.vue').default);
Vue.component('conversation-status-component', require('./components/StatusComponent.vue').default);
Vue.component('user-profile-component', require('./components/UserProfile.vue').default);
Vue.component('contact-form-component', require('./components/SearchContactBar.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const routes = [
    { path: '/chat', component: MessengerComponent },
    { path: '/chat/:conversationId', component: MessengerComponent },
    { path: '/example', component: ExampleComponent },
];

const router = new VueRouter({
    routes,
    mode: 'history'
});

const app = new Vue({
    el: '#app',
    store,
    router,
    methods: {
        logout() {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        }
    }
});