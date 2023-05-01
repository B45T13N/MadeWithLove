<template>
    <div class="row list-item mt-3">
        <div v-for="(item, key) in items" class="col-md-3 mb-3">
            <CardItemComponent v-bind:item="item" v-bind:key="key"/>
        </div>
    </div>
    <v-pagination v-model="pagination.current"
                  :length="pagination.total"
                  v-on:click="onPageChange"/>
</template>

<script>
import CardItemComponent from "../CardItemComponent/CardItemComponent.vue";
import CarouselItem from "../CarouselItemComponent/CarouselItemComponent.vue";

export default {
    components: {CarouselItem, CardItemComponent},
    data(){
        return{
            apiUrl : import.meta.env.VITE_BASE_URL + '/api/items?page=',
            items: [],
            pagination: {
                current: 1,
                total: 0
            }
        }
    },
    methods: {
        getItems () {
            window.axios.get(this.apiUrl + this.pagination.current)
                .then(response => {
                    this.items = response.data.data;
                    this.pagination.current = response.data.meta.current_page;
                    this.pagination.total = response.data.meta.last_page;
                })
                .catch(function(){
                    console.log("Error during the API call on HotDeals");
                });
        },
        onPageChange() {
            this.getItems();
        }
    },
    mounted() {
        this.getItems();
    },
    name: "ListCardDisplayComponent",
}
</script>

<style>

</style>
