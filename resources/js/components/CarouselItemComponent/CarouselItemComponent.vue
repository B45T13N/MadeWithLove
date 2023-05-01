<template>
    <div>
        <v-carousel-item class="carousel-item" :key="key" :src="item.img" cover>
            <v-card-title class="text-center">
                <div class="carousel-card-title">
                    {{item.name}}
                    <b>{{item.price}} €</b>
                    <v-btn icon="mdi-basket" class="ml-3" variant="tonal" v-on:click="addToBasket(item.id)"/>
                </div>
            </v-card-title>
        </v-carousel-item>

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
    </div>
</template>

<script>

export default {
    props: ['item', 'key'],
    name: "CarouselItemComponent",
    data(){
      return {
          apiUrl: import.meta.env.VITE_BASE_URL + '/api/basket/addItem',
          userId: "",
          timeout: 3000,
          snackbar: false,
          text: '',
      };
    },
    methods: {
        addToBasket(id){
            axios.post(this.apiUrl, {
                'itemId': id,
                'userId': this.userId,
                timeout: 3000,
                snackbar: false,
                text: '',
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
    }
}
</script>

<style>
    .carousel-item img{
        max-height: 350px;
    }
    .carousel-card-title{
        display: inline-block;
        background: rgba(230, 230, 230, 0.3);
        border-radius: 15px;
    }
</style>
