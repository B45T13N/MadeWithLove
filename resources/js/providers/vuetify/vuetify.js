import {createVuetify} from "vuetify";
import * as components from "vuetify/components";
import * as directives from "vuetify/directives";
import '@mdi/font/css/materialdesignicons.css'

const vuetify = createVuetify(
    {
        icons: {
            defaultSet: 'mdi',
        },
        components,
        directives,
    }
)

export default vuetify
