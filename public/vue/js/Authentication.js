
import { Login } from './Login.js';
import { CreateAccount } from "./CreateAccount.js";

export const Authentication = {
    data() {
        return {
            currentComponent: null,
        }
    },

    created() {
        this.currentComponent = Login;
    },

    methods: {
        userIsAuthenticated(event) {
            this.$parent.authenticationDone();
        },

        changeToLogin($event) {
            this.currentComponent = Login
        },

        changeToCreateAccount($event) {
            this.currentComponent = CreateAccount
        }
    },

    template: `
        <component :is="currentComponent"/>
    `,
}
