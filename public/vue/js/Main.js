
import {Menu1} from "./Menu1.js";
import {Menu2} from "./Menu2.js";

export const Main = {
    data() {
        return {
            items: [
                {title: 'Menu 1', component: Menu1},
                {title: 'Menu 2', component: Menu2},
            ],
            selected: 0,
            currentComponent: null,
        }
    },

    created() {
        this.currentComponent = Menu1;
    },

    methods: {
        select(event) {
            this.selected = event.target.id;
            this.currentComponent = this.items[this.selected].component;
        }
    },

    template: `
        <div>
            <div class="row mt-5">
                <div class="col-3">
                    <ul class="nav flex-column nav-pills nav-fill">
                        <li v-for="(item, idx) in items" class="nav-item">
                            <a @click="select" :id="idx" href="#" class="nav-link"  :class="(idx == selected) ? 'active' : '' ">{{ item.title }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-9">
                    <component :is="currentComponent"/>
                </div>
            </div>
        </div>
    `,
}
