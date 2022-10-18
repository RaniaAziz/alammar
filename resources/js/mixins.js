import moment from "moment/moment";

export default {
    data() {
        return {
            requestForm: {
                disabled: false,
                error: false,
                validations: [],
                message: null,
            },
        }
    },

    methods: {
        __(key, replace) {
            return __(key, replace);
        },
        saveForm(url, method, redirect, $data) {
            this.requestForm.disabled = true;
            axios({
                method: method,
                url: url,
                data: $data
            }).then(response => {
                this.$emit('formSaved', response);
                swal.fire({
                    title: response.data.message,
                    icon: "success",
                    type: "success",
                    timer: 2000,
                    buttons: false,
                });

                setTimeout(()=>{
                    if(redirect !== null) {
                        location.href = redirect;
                    }
                    else {
                        this.requestForm.disabled = false;
                    }
                }, 2000)
            }).catch(error => {
                console.log(error);
                this.requestForm.disabled = false;
                this.requestForm.error = true;
                if(error.response &&error.response.data.errors) {
                    this.requestForm.message = error.response.data.message;
                    this.requestForm.validations = error.response.data.errors;
                }
                else if(error.response && error.response.data.message) {
                    this.requestForm.validations = [];
                    this.requestForm.message = error.response.data.message;
                }
                document.body.scrollTop = 0; // For Chrome, Safari and Opera
                document.documentElement.scrollTop = 0; // For IE and Firefox
            })
        },
        handleError(error) {
            this.hideLoading();
            this.disabledButtons = false;
            if (error.response.data.errors) {
                this.requestForm.validations = error.response.data.errors;
            } else if (error.response.data.error_message) {
                this.requestForm.validations = [];
                this.validation_message = error.response.data.error_message;
                this.notify_error(error.response.data.error_message, 4000);
            } else if (error.response.data.message_error) {
                this.notify_error(error.response.data.message_error, 4000);
            }

            if(this.SWALError) {
                var period_time = 4000;
                if(typeof(error) == 'string') {
                    this.notify_error(error, period_time);
                } else {
                    this.notify_error(this.convertCustomErrorObjectForSwalToString(error.response.message), period_time);
                }

            }

            document.body.scrollTop = 0; // For Chrome, Safari and Opera
            document.documentElement.scrollTop = 0; // For IE and Firefox
        },

        whenFormSuccess(response = null) {

        },

        convertCustomErrorObjectForSwalToString(response) {
            var returned_string = '';
            if (response.message != undefined && response.errors != undefined) // custom error from helpers
            {
                if (response.errors instanceof Object) {
                    $.each(response.errors, function (index, message) { // response is number of errors
                        returned_string = returned_string + message + "<br>";
                    });
                } else { // response is single text message
                    returned_string = response.message ? response.message : response.error_message + "<br>";
                }
            } else if (response.error.data.error_message != undefined) // custom error from helpers
            {
                returned_string = response.error.data.error_message;
            } else { // laravel error
                $.each(response, function (index, message) {
                    returned_string = returned_string + message + "<br>";
                });
            }

            return returned_string;
        },

        getDateFormat(date, format = "DD-MM-YYYY") {
            if (date == null){
                return '';
            }else{
            return moment(date).format(format);}
        },

        getDiffForHuman(date) {
            return this.$moment(date).lang('ar').fromNow();
        },

        showLoading() {
            $('#loading-div').show();
        },

        hideLoading() {
            $('#loading-div').hide();
        },


        notify_error(message, duration = 3000) {
            this.$message({
                showClose: true,
                duration: duration,
                message: message,
                type: 'error'
            });
        },

        notify_success(message, duration = 4000) {
            this.$message({
                showClose: true,
                duration: duration,
                message: message,
                type: 'success'
            });
        },
    },

    computed: {

    }
}
