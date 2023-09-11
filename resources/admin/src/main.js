// require("./bootstrap");
import router from "./router";
import Company from "./pages/Company";
import School from "./pages/School";

import { createApp } from "vue";

createApp({
    components: {
        Company,
        School,
    },
})
    .use(router)
    .mount("#app");
