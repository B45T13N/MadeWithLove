<template>
    <div class="d-flex justify-end mb-5">
        <BasketComponent />
    </div>
    <div class="row justify-content-center mb-15">
        <v-card class="mx-auto" max-width="600" elevation="24">
            <v-card-title class="text-center"><h2>Hot deals !</h2></v-card-title>
            <HotDealComponent />
        </v-card>

    </div>
    <ListCardDisplayComponent />
</template>

<script>

    import ListCardDisplayComponent from "../components/ListCardDisplayComponent/ListCardDisplayComponent.vue";
    import HotDealComponent from "../components/HotDealComponent/HotDealComponent.vue";
    import BasketComponent from "../components/BasketComponent/BasketComponent.vue";

    export default {
        components: {BasketComponent, HotDealComponent, ListCardDisplayComponent},
        mounted() {
        }
    }
</script>

<style>

</style>
