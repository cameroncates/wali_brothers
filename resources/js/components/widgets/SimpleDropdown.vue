<template>
<div class="bg-white z-depth-1 animate__animated  animate__zoomIn animate__faster py-2 d-none m-2 border-0 dropdown" 
    :style="styling" 
    ref="container" 
    @mouseleave="remove()" 
    @mouseenter="keep()"
>
    <div v-if="list && list.length > 0">
        <button          
            @click="$emit('select', item), remove()"
            class="btn btn-block tab-btn text-left waves-effect waves-light z-depth-0 transition text-sm text-muted my-0" 
            v-for="(item, i) in list" :key="i" 
        >
            {{ prettifyText(item) }}
        </button>
    </div>
    <p v-else class="w-100 text-center p-4">Nothing to select!</p>
</div>
</template>

<script>
export default {
    props: {
        list: {
            required: true
        },
        width: {
            required: false,
            default: "100%"
        },
        btn: {
            required: true
        },
    },
    data() {
        return {
            styling: {
                width: this.width,
                top: "0px",
                left: "0px",
                position: "absolute",
                borderRadius: '.25rem',
                zIndex: 1000
            },
            state: null,
            container: null
        }
    },
    methods: {
        remove() {
            this.state = setTimeout(() => {
                $(this.container).addClass("d-none")            
            }, 250);
        },
        keep() {
            clearTimeout(this.state)
        }
    },
    mounted() {

        let btn = $(`.${this.btn}`)
        this.container = $(this.$refs.container)


        btn.mousedown(() => this.container.removeClass("d-none"))


    }
}
</script>
