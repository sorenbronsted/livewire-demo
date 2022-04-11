
export const CreateAccount = {
    data() {
        return {
            name: '',
            email: '',
            password: '',
        }
    },

    methods: {
        save(event) {
            this.$parent.userIsAuthenticated(event);
        },

        cancel(event) {
            this.$parent.changeToLogin(event);
        }
    },

    template: `
        <div class="col-4 mt-5 m-auto" style="min-height: 800px">
            <form>
                <div class="form-floating mb-2">
                    <input v-model="name" class="form-control" placeholder="name">
                    <label for="email">Name</label>
                </div>
                <div class="form-floating mb-2">
                    <input v-model="email" type="email" class="form-control" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating">
                    <input v-model="password" type="password" class="form-control" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <div class="my-3">
                    <button @click="save" class="w-100 mb-2 btn btn-lg btn-primary">Save</button>
                    <button @click="cancel" class="w-100 btn btn-lg btn-outline-primary">Cancel</button>
                </div>
            </form>
        </div>
    `,
}
