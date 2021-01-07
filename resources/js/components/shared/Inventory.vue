<template>
    <div class="col-lg-12 py-4 px-0">
        <div class="row h-100 p-0 pt-4 mx-0">
            <div class="col-lg-2 border-right" style="height:100vh">
                <div
                    v-for="(link, i) in links"
                    :key="i"                                        
                >
                    <button 
                        @mouseover="mouseover = link.name"
                        @mouseleave="mouseover = null"
                        @click="!link.links ? tab = link.name : null"
                        :class="[
                            link.name == tab || (link.links && link.links.includes(tab))  ? 'active' : 'text-muted', 
                            link.links ? `dropdown-btn-${i}` : null
                        ]"
                        class="btn btn-block tab-btn text-left waves-effect waves-light py-2 pl-4 pr-2 z-depth-0 transition position-relative" 
                        type="button"
                    >
                        <span class="d-flex justify-content-between align-items-center">
                            <span>{{ prettifyText(link.name) }}</span>
                            <span v-if="link.links && mouseover == link.name" class="mdi mdi-arrow-right-circle animate__animated animate__zoomIn animate__faster"></span>
                        </span>
                    </button>
                    <dropdown 
                        v-if="link.links" 
                        @select="tab = $event"
                        :btn="`dropdown-btn-${i}`" 
                        :list="link.links" 
                        :title="link.name"
                    ></dropdown>

                </div>
            </div>
            <div class="col-lg-10">                
                <add-sku 
                    v-if="tab == 'ADD_SKU'"
                ></add-sku>

            </div>
        </div>
    </div>
</template>

<script>
import dropdown from '../widgets/DropdownWithBackButton.vue'
import AddSku from './AddSku.vue'
export default {
  components: { dropdown, AddSku },

    
    data() {
        return {            
            links: [
                { name: "SKUS", links: ["ADD_SKU", "REMOVE_SKU", "MODIFY"] },
                { name: "PLANNING" },
                { name: "PRODUCTS" }
            ],
            tab: "SKUS",
            mouseover: "SKUS"
        }
    }
}
</script>

<style>

</style>