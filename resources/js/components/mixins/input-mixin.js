import _ from "lodash";
import SimpleVueValidation from "simple-vue-validator";
const Validator = SimpleVueValidation.Validator;
export default {
    props: {
        options: Object,
        label: String,
        small: String,
    },
    data: function () {
        return {
            value: "",
        };
    },
    watch: {
        value: function (n, o) {
            this.$emit("update_input", { old: _.get(this.options, '[' + o + '][\'price\']', 0), price: _.get(this.options, '[' + n + '][\'price\']', 0) });
        },
    },
    validators: {
        value: function (value) {
            return Validator.value(value).required();
        },
    },
    methods: {
        validate: function () {
            return this.$validate()
                .then(function (success) {
                    if (success) {
                        if (this.options.hasOwnProperty(this.value)) {
                            return { ...this.options[this.value], key: this.value }
                        }
                    }
                }.bind(this));
        },
        reset: function () {
            this.validation.reset();
        }
    }
}