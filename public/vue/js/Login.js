
export const Login = {
    data() {
        return {
            email: '',
            password: '',
        }
    },

    methods: {
        signIn(event) {
            this.$parent.userIsAuthenticated(event);
        },

        createAccount(event) {
            this.$parent.changeToCreateAccount(event);
        }
    },

    template: `
        <div class="col-4 mt-5 m-auto" style="min-height: 800px">
            <form>
                <div class="form-floating mb-2">
                    <input v-model="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating">
                    <input v-model="password" type="password" class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <div class="my-3">
                    <button @click="signIn" class="w-100 mb-2 btn btn-lg btn-primary">Sign in</button>
                    <button @click="createAccount" class="w-100 btn btn-lg btn-outline-primary">Create Account</button>
                </div>
            </form>
        </div>
    `,
}
