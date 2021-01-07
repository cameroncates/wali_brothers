<template>
    <div>
        <appbar :links="links" @tab="tab = $event, log($event)"></appbar>

        <div v-if="tab == 'CUSTOMER'" class="row mx-0">
            <manage-customers></manage-customers>
        </div>

        <div v-if="tab == 'INVENTORY'" class="row mx-0">
            <inventory></inventory>
        </div>

        <div v-if="tab == 'EMPLOYEES'" class="row mx-0">
            <employees></employees>
        </div>

        <div v-if="tab == 'ORDERS'" class="row mx-0">
            <orders></orders>
        </div>

        <div v-if="tab == 'REPORTS'" class="row mx-0">
            <reports></reports>
        </div>

        <div v-if="tab == 'ACTIVITES'" class="row mx-0">
            <activities></activities>
        </div>

    </div>
</template>

<script>
import Appbar from './partials/Appbar.vue'
import ManageCustomers from './shared/ManageCustomers.vue'
import Inventory from './shared/Inventory.vue'
import Employees from './shared/Employees.vue'
import Orders from './shared/Orders.vue'
import Reports from './shared/Reports.vue'
import Activities from './shared/Activities.vue'

export default {
    components: { Appbar, ManageCustomers, Inventory, Employees, Orders, Reports, Activities },

    data() {
        return {
            tab: null,
            links: ["HOME", "CUSTOMER", "INVENTORY", "EMPLOYEES", "REPORTS", "ACTIVITES", "ORDERS", "SALES"]
        }
    }

}
</script>

<style>

</style>