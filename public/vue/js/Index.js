
import {Main} from './Main.js';
import {Authentication} from './Authentication.js';

export const Index = {
    data() {
        return {
            authenticated: false,
            currentComponent: null,
        }
    },

    created() {
        alert('Authenticate with backend')
        if (this.authenticated) {
            this.currentComponent = Main;
        }
        else {
            this.currentComponent = Authentication;
        }
    },

    methods: {
        authenticationDone() {
            this.currentComponent = Main;
        }
    },

    template: `
        <component :is="currentComponent"/>
    `,
}
