<template>
    <v-menu
        v-model="menu"
        :close-on-content-click="false"
        transition="slide-x-transition"
    >
        <template v-slot:activator="{ props }">
            <v-btn
                color=""
                v-bind="props"
                v-on:click="getBasketItems"
            >
                Your basket !
            </v-btn>
        </template>

        <v-card min-width="300">
            <v-card-title>
                {{ this.userName }}
            </v-card-title>

            <v-divider></v-divider>

            <v-list>
                <v-list-item v-for="(object, key) in itemsAdded" class="p-2">
                    <div class="d-flex w-100 justify-content-between">
                        <div>
                            <v-list-item-title>{{object.item.name}}</v-list-item-title>
                            <v-list-item-subtitle>{{object.item.price}} €</v-list-item-subtitle>
                        </div>
                        <div>
                            <v-btn size="x-small" icon="mdi-trash-can" color="error" v-on:click="deleteItemFromBasket(object.id)"/>
                        </div>
                    </div>
                </v-list-item>
            </v-list>

            <v-card-actions>
                <v-spacer/>
                <v-btn
                    color="primary"
                    variant="text"
                    @click="menu = false"
                >
                    Pay
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-menu>
    <v-snackbar
        v-model="snackbar"
        :timeout="timeout"
    >
        {{text}}

        <template v-slot:actions>
            <v-btn
                color="blue"
                variant="text"
                @click="snackbar = false"
            >
                Close
            </v-btn>
        </template>
    </v-snackbar>
</template>

<script>
import {it} from "vuetify/locale";

export default {
    name: "BasketComponent",
    data: () => ({
        userName: "",
        userId: "",
        apiGetBasketUrl: import.meta.env.VITE_BASE_URL + '/api/basket/',
        apiDeleteItemFromBasketUrl: import.meta.env.VITE_BASE_URL + '/api/basket/deleteItem/',
        itemsAdded: [],
        menu: false,
        timeout: 3000,
        snackbar: false,
        text: '',
    }),
    methods: {
        getBasketItems(){
            window.axios.get(this.apiGetBasketUrl+this.userId)
                .then((response) =>
                    {
                        if(response.data.data !== undefined)
                            this.itemsAdded = response.data.data.itemsAdded;
                    }
                )
                .catch((e) =>
                    {
                        console.log(e);
                        console.log("Error when retrieving items")
                    }
                )
        },
        deleteItemFromBasket(addableId){
            window.axios.delete(this.apiDeleteItemFromBasketUrl+addableId)
                .then((response) =>
                    {
                        this.getBasketItems();
                        this.text = "Item deleted";
                        this.snackbar = true;
                    }
                )
                .catch((e) =>
                    {
                        console.log("Error while deleting the item")
                    }
                )
        },
        getUserDetails(){
            this.userName = window.user.name;
            this.userId = window.user.id;
        },
    },
    mounted() {
        this.getUserDetails();
        this.getBasketItems();
    },
}
</script>

<style>

</style>
