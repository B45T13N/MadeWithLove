<template>
    <v-card>
        <v-card-title>
            {{item.name}}
        </v-card-title>
        <v-card-text>
            <v-img :src="item.img"/>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquid aspernatur, eius eum quidem
            quod recusandae ut veniam. Adipisci debitis ducimus laudantium modi nam officia optio quasi sed suscipit
            voluptates?
        </v-card-text>
        <v-card-subtitle class="text-end">{{item.price}} €</v-card-subtitle>
        <v-card-actions class="justify-end">
            <v-btn icon="mdi-basket" v-on:click="addToBasket(item.id)"/>
        </v-card-actions>

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
    </v-card>
</template>

<script>

export default {
    data(){
        return{
            apiUrl : import.meta.env.VITE_BASE_URL + '/api/basket/addItem',
            userId : "",
            timeout: 3000,
            snackbar: false,
            text: '',
        }
    },
    methods: {
        addToBasket(id){
            axios.post(this.apiUrl, {
                'itemId': id,
                'userId': this.userId,
            })
            .then(
                response => {
                    this.text = response.data;
                    this.snackbar = true;
                }
            )
            .catch(() => {
                console.log("Error during basket add");
            })
        },
        getUserId(){
            this.userId = window.user.id;
        },
    },
    mounted() {
        this.getUserId();
    },
    props: ['item', 'key'],
    name: "CardItemComponent"
}
</script>

<style>
    .list-item .v-img{
        margin-bottom: 10px;
        height: 140px;
    }
</style>
