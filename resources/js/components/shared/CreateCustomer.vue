<template>
    <div>
        <h2 class="archivo-font">Create <span class="highlight-bold">Customer Profile</span></h2>
        <div class="row justify-content-center my-5">
            <div class="col-lg-5">
                <div v-if="error" class="row animate__animated animate__fadeIn animate__faster">
                    <div class="alert alert-danger alert-dismissible fade show col-lg-12" role="alert">{{ error }}</div>
                </div>
                <div v-if="success" class="row animate__animated animate__fadeIn animate__faster">
                    <div class="alert alert-success alert-dismissible fade show col-lg-12" role="alert">{{ success }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-6 input-container px-1">
                        <p>First Name</p>
                        <input type="text" v-model="customer.first_name">
                    </div>
                    <div class="col-lg-6 input-container px-1">
                        <p>Last Name (optional)</p>
                        <input type="text" v-model="customer.last_name">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12 input-container px-1">
                        <p>Shop Name</p>
                        <input type="text" v-model="customer.shop_name">
                    </div>
                </div>          
                <br>
                <div class="row">
                    <div class="col-lg-12 input-container px-1">
                        <p>Address</p>
                        <input type="text" v-model="customer.address">
                    </div>
                </div>      
                <br>
                <div class="row">
                    <div class="col-lg-6 input-container px-1">
                        <p>Town Name</p>
                        <input type="text" v-model="customer.town_name">
                    </div>
                    <div class="col-lg-6 input-container px-1">
                        <p>Locality Name</p>
                        <input type="text" v-model="customer.locality_name">
                    </div>
                </div>
                <br>                
                <div class="row">
                    <div class="col-lg-12 input-container px-1">
                        <p>CNIC</p>
                        <input type="number" v-model="customer.cnic">
                    </div>
                </div>       
                <br>  
                <div class="row">
                    <div class="col-lg-6 input-container px-1">
                        <p>Mobile Number</p>
                        <input type="number" v-model="customer.mobile_number">
                    </div>
                    <div class="col-lg-6 input-container px-1">
                        <p>Phone Number</p>
                        <input type="number" v-model="customer.phone_number">
                    </div>
                </div>
                <br>
                <div class="row text-right">
                    <div class="col-lg-12 px-1">
                        <div v-if="loading" id="loading"></div>                        
                        <button v-else @click="loading = true, error = null, success = null, create(customer)" class="btn btn-danger px-4">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    data() {
        return {
            customer: {
                first_name: "Kamran",
                last_name: "Khan",
                shop_name: "Wali Brothers",
                address: "D Plaza،, opposite Fatima Jinnah Park،, F-10 Markaz F 10/3 F-10, Islamabad, Islamabad Capital Territory 44000",
                cnic: "1234567891011",
                mobile_number: "03353404022",
                phone_number: "03353404022",
                town_name: "Peshawar Cantt",
                locality_name: "Sardar Ahmad Jan Colony"
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