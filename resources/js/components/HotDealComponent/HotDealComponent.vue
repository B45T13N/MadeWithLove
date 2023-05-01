<template>
    <v-carousel hide-delimiter-background
                :show-arrows="false"
                cycle
                :interval="interval"
                :height="400"
    >
        <CarouselItem v-for="(item, key) in items" v-bind:item="item" v-bind:key="key"/>
    </v-carousel>
</template>

<script>

import CarouselItem from "../CarouselItemComponent/CarouselItemComponent.vue";

export default {
    components: {CarouselItem},
    data(){
        return{
            interval: 3000,
            apiUrl : import.meta.env.VITE_BASE_URL + '/api/hotDeals',
            items: [],
        }
    },
    methods: {
        getItems () {
          fetch(this.apiUrl)
              .then(function (response){
                  return response.json();
              })
              .then((data) => {
                  this.items = data.data;
              })
              .catch(function(response){
                  console.log("Error during the API call on HotDeals");
              });
        }
    },
    mounted() {
        this.getItems();
        console.log('Component hotdeal mounted.')
    },
    name: "HotDealComponent"
}
</script>

<style>
</style>
