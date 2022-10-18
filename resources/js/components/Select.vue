<template>
    <div class="form-group">
        <label v-if="label">{{ label }} <span v-if="required" class="text-danger"> *</span></label>

        <el-select v-model="val" @input="handelInputSelected" :placeholder="label" :class="'form-control fg-el-select ' + {'is-invalid': error}"
                   v-if="url"
                   filterable
                   remote
                   reserve-keyword
                   :remote-method="remoteMethod"
                   :loading="loading">
            <el-option
                v-for="item in api_options"
                :key="item.id"
                :label="item.name"
                :value="item.id">
            </el-option>
        </el-select>

        <el-select v-model="val" @input="handelInputSelected" :placeholder="label" :class="'fg-el-select ' + {'is-invalid': error}"
                   v-else
                   filterable
                   clearable>
            <el-option
                v-for="item in options"
                :key="item.id"
                :label="item.name"
                :value="item.id">
            </el-option>
        </el-select>

        <div v-if="error" class="invalid-feedback1" style="color: #fd397a;">{{ error }}</div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                val:null,
                loading: false,
                attr: {
                    multiple: true
                },
                api_options:[],
            }
        },
        props: {
            label: String,
            placeholder: String,
            options: Array,
            value: {
                String,
                Number,
                Array,
                required: true,
            },
            name: String,
            url: String,
            multiple: {
                type: Boolean,
                default: false,
            },
            required: {
                type: Boolean,
                default: false
            },
            disabled: {
                type: Boolean,
                default: false
            },
            auto: {
                type: Boolean,
                default: false
            }
        },
        mounted() {
            this.val = this.value;
        },
        methods: {
            handelInputSelected($event) {
                var returned_value = $event ? $event : null;
                this.$emit('input', returned_value);
            },

            remoteMethod(search) {
                this.loading = true;
                setTimeout(() => {
                    axios.get(BASE_URL+'/'+this.url+'?search='+search).then(response => {
                        this.api_options = response.data;
                        this.loading = false;
                    }).catch(error => {
                        this.loading = false;
                        console.log(error);
                    });
                }, 200);
            }

        },
        computed: {
            error() {
                if(this.$parent.requestForm.validations && this.$parent.requestForm.validations[this.name]) {
                    return this.$parent.requestForm.validations[this.name][0];
                }
                return false;
            },
        },
        watch: {
            value(v) {
                this.val = v;
            }
        }
    }
</script>

<style>
.el-select-dropdown__list  {
  padding: 8px 8px !important;
}
</style>
