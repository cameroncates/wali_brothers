<template>
    <div>
        <appbar :links="links" @tab="tab = $event, log($event)"></appbar>

        <div v-if="tab == 'CUSTOMER'" class="row mx-0">
            <customer-list></customer-list>
        </div>

        <div v-if="tab == 'REPORTS'" class="row mx-0">
            <reports></reports>
        </div>

        <div v-if="tab == 'ACCOUNTS'" class="row mx-0">
            <accounts></accounts>
        </div>


    </div>
</template>

<script>
import Appbar from './partials/Appbar.vue'
import CustomerList from './shared/CustomerList.vue'
import Reports from './shared/Reports.vue'
import Accounts from './shared/Accounts.vue'

export default {
    components: { Appbar, CustomerList, Reports, Accounts },

    data() {
        return {
            tab: null,
            links: ["HOME", "CUSTOMER", "REPORTS", "ACCOUNTS"]
        }
    }

}
</script>

<style>

</style>