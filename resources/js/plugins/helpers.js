import moment from 'moment';

const Helpers = {
    install(Vue, options) {
  
      Vue.mixin({
        mounted() {
        },

        methods: {
            slugify(text) {

                if (!text) return text

                return text.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                .replace(/^-+/, '')             // Trim - from start of text
                .replace(/-+$/, ''); 
            },
            formData(object) {
                var form_data = new FormData();

                for ( var key in object ) {
                    form_data.append(key, object[key]);
                }          
                
                return form_data
            },
            pluck(array, key) {

                if ( !array[0] || ! array[0][key] ) return array

                return array.map(function(item) { return item[key]; });
            },
            refreshPicker() {
                setTimeout(() => $('.selectpicker').val('default').selectpicker('refresh'), 500)           
            },
            emptyPicker() {
                $('.selectpicker').selectpicker('val', '');
            },

            files(container, callback) {

                let inputElement = container.find("input[type='file']")[0]

                if (!inputElement) {
                    console.log('Input Files is not initialized, File helper.js Line 48')
                    return
                }

                inputElement.onchange = function(event) {
                    var fileList = inputElement.files;
                    callback(fileList)
                    //TODO do something with fileList.  
                 }
            },
            formData(object) {
                var form_data = new FormData();
    
                for ( var key in object ) {
                    form_data.append(key, object[key])

                    if (object[key] && object[key].constructor == FileList) {

                        for (let i=0; i < object[key].length; i++) {

                            form_data.append(key+'[]', object[key][i])
                        }
                    }
                }          
                
                return form_data
            },
            
            formatDate(datetime) {
                return moment.utc(datetime).format("MMM DD, YYYY")
            },
            getStatus(title) {
                
                if (!title) return title

                let status = null

                switch(title) {
                    case "UNDER REVIEW":
                        status = "Review"
                        break

                    case "PLANNED":
                        status = "Planned"
                        break

                    case "IN PROGRESS":
                        status = "Progress"
                        break

                    case "COMPLETE":
                        status = "Done"
                        break

                }

                return status
            },
            prettifyText(str) {

                if (!str) return str
    
                if (str.split("_").length > 0) {
                    str = str.split("_").join(" ")
                }
    
                return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase()
            }, 
            
            log(text) {
                console.log(text, 'logged!')
            }
        }
    });
  
    }
  };

export default Helpers;