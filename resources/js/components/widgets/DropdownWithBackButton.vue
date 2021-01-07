<template>
<div class="bg-white z-depth-1 animate__animated  animate__zoomIn animate__faster pb-2 d-none m-2 border-0 dropdown" 
    :style="styling" 
    ref="container" 
    @mouseleave="remove()" 
    @mouseenter="keep()"
>
    <div class="w-100 mb-2">
        <button 
            class="btn btn-block tab-btn py-2 z-depth-0 transition position-relative" 
            type="button"
            @click="remove()"
        >
            <span class="d-flex align-items-center">
                <span class="mdi mdi-arrow-left-circle mdi-24px mr-3"></span>
                <span class="font-weight-bold text-sm">Back to {{ prettifyText(title) }}</span>
            </span>
        </button>

        <div class="w-100 px-2 my-1"><div class="border-bottom w-100"></div></div>
    </div>
    <button          
        @click="$emit('select', item), remove()"
        class="btn btn-block tab-btn text-left waves-effect waves-light px-4 z-depth-0 transition text-sm text-muted my-0" 
        v-for="(item, i) in list" :key="i" 
    >
        {{ prettifyText(item) }}
    </button>
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
            // default: 250
        },
        btn: {
            required: true
        },
        title: {
            required: false,
            default: ""
        }
    },
    data() {
        return {
            styling: {
                // width: this.width + 'px',
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


        btn.click(() => this.container.removeClass("d-none"))

        return
        // let top = 0,
        //     left = 0,
        //     container = $(this.$refs.container),
        //     w = $(window).width(),
        //     h = $(window).height(),
        //     w_ = $(container).width(),
        //     h_ = $(container).height()
        // if(top+h_ > h) {
        //     this.styling.top = (h - h_ - 10) + 'px'            
        // } else {
        //     this.styling.top = (top + 10) + 'px'
        // }
        // if(left+w_ > w) {
        //     this.styling.left = (w - w_ - 10) + 'px'
        // } else {
        //     this.styling.left = (left) + 'px'
        // }

        // $(window).resize(() => container.remove())
        // $(window).click((e) => {
        //     console.log('i am clicked')
        //     if(e.target.parentNode != container[0] && !$(e.target).hasClass('dropdown-btn') && e.target !== container[0]) {
        //         // container.remove()
        //     }
        // })

    }
}
</script>
