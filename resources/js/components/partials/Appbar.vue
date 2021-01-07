<template>
    <div class="row p-3 bg-danger z-depth-1 mx-0">
        <div class="col-lg-4">
            <button class="btn btn-danger z-depth-0 waves-effect waves-light text-white">Business Logo</button>
        </div>
        <div class="col-lg-8 text-right">
            <button class="btn btn-danger z-depth-0 waves-effect waves-light text-capitalize transition"
                :class="link == active ? 'font-weight-bold' : null"
                @click="$emit('tab', link), active = link"
                v-for="(link, i) in links" :key="i">
                {{ link.toLowerCase() }}
            </button>
        </div>
    </div>
</template>

<script>
export default {
    
    props: ["links"],

    data() {
        return {
            active: null,
        }
    }
}
</script>

<style>

</style>