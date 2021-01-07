const Data = {
    install(Vue, options) {
  
      Vue.mixin({
        mounted() {
        },

        data() {

            return {
                APP_URL: "http://localhost:8000/"
            }
        }
      });
  
    }
  };

export default Data;