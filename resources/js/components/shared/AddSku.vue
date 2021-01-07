<template>
    <div>
        <h2 class="archivo-font">Add <span class="highlight-bold">SKU's</span></h2>
        <div class="row justify-content-center my-5">
            <div class="col-lg-5">
                <div v-if="error" class="row animate__animated animate__fadeIn animate__faster">
                    <div class="alert alert-danger alert-dismissible fade show col-lg-12" role="alert">{{ error }}</div>
                </div>
                <div v-if="success" class="row animate__animated animate__fadeIn animate__faster">
                    <div class="alert alert-success alert-dismissible fade show col-lg-12" role="alert">{{ success }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-12 input-container px-1">
                        <p>Choose Product</p>
                        <input type="text" v-model="sku.product_name" class="product-name">
                        <span class="mdi mdi-menu-down"></span>
                        <dropdown 
                            @select="
                                active = $event, 
                                sku.product_name = prettifyText($event), 
                                product = $event.toLowerCase(), 
                                sku.product_type = null,
                                sku.packaging = null"
                            btn="product-name" 
                            width="100%"
                            :list="products" 
                        ></dropdown>                        
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6 input-container px-1">
                        <p>Choose Product Type</p>
                        <input type="text" v-model="sku.product_type" class="product-type" :disabled="!sku.product_name">
                        <span class="mdi mdi-menu-down"></span>
                        <dropdown 
                            @select="
                                active = $event, 
                                sku.product_type = prettifyText($event), 
                                type = $event.toLowerCase(), 
                                sku.packaging = null"
                            btn="product-type" 
                            width="100%"
                            :list="types[product]" 
                        ></dropdown>                        
                    </div>
                    <div class="col-lg-6 input-container px-1">
                        <p>Choose Packaging</p>
                        <input type="text" v-model="sku.packaging" class="packaging" :disabled="!sku.product_type">
                        <span class="mdi mdi-menu-down"></span>
                        <dropdown 
                            @select="active = $event, sku.packaging = prettifyText($event)"
                            btn="packaging" 
                            width="100%"
                            :list="packagings[type]" 
                        ></dropdown>                        
                    </div>                                        
                </div>
                <br>

                <div class="row text-right">
                    <div class="col-lg-12 px-1">
                        <div v-if="loading" id="loading"></div>                        
                        <button v-else @click="loading = true, error = null, success = null, create(sku)" class="btn btn-danger px-4">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Dropdown from '../widgets/SimpleDropdown.vue'
export default {
  components: { Dropdown },

    data() {
        return {
            sku: {
                product_name: null,
                product_type: null,
                packaging: null,
            },
            product: null, type: null,
            products: ["COOKING_OIL", "CANOLA_OIL", "GHEE"],

            types: {
                cooking_oil: ["BOTTLE", "COTTON", "TIN", "CAN"],
                canola_oil: ["BOTTLE", "COTTON", "TIN", "CAN"],
                ghee: ["COTTON_(GHEE)", "TIN_(GHEE)", "BUCKET"],
            },
            packagings: {
                bottle: ["3_LIT", "5_LIT"],
                cotton: ["1_X_5_LIT", "1_X_12_LIT"],
                tin: ["2.5_LIT", "5_LIT", "10_LIT", "16_LIT"],
                can: ["10_LIT"],

                bucket: ["2.5_KG", "5_KG", "10_KG", "16_KG_(EVULIN)"],
                "cotton_(ghee)": ["1X5_KG", "1X12_KG"],
                "tin_(ghee)": ["2.5_KG", "5_KG", "10_KG", "16_KG"],
                
            },

            loading: false,
            error: null,
            success: null
        }
    },

    methods: {
        async create(customer) {        
            let formData = this.formData(customer)

            await axios.post(`${this.APP_URL}api/customer/store`, formData)
            .then(response => {
                
                if (response.data.status == 500) {
                    this.error = response.data.message
                    return

                } else {
                    this.success = response.data.message
                }

                console.log(response.data, 'RESPONSE')


            })
            .catch(error => console.log(error.response, 'ERR'))           
            
            this.loading = false
            
        }
    }
}
</script>

<style>

</style>