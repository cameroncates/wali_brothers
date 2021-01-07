<template>
    <div class="col-lg-12 py-4 px-0">
        <div class="row h-100 p-0 pt-4 mx-0">
            <div class="col-lg-2 border-right" style="height:100vh">
                <button 
                    @click="tab = link"
                    :key="i"
                    v-for="(link, i) in links" 
                    :class="link == tab ? 'active' : 'text-muted'"
                    class="btn btn-block tab-btn text-left waves-effect waves-light py-2 px-4 z-depth-0 transition" 
                    type="button"
                >
                    {{ prettifyText(link) }}
                </button>
            </div>
            <div class="col-lg-10">
                <create-customer
                    v-if="tab == 'CREATE'"
                ></create-customer>               
            </div>
        </div>
    </div>
</template>

<script>
import CreateCustomer from "./CreateCustomer.vue";

export default {
    components: { CreateCustomer },

    data() {

        return {
            links: ["CREATE", "UPDATE", "DELETE", "INVOICES"],
            tab: "CREATE",
        }
    }


}
</script>

<style>

</style>