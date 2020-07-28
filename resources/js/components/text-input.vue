<template>
  <div class="form-group">
    <label v-if="label != ''" for>
      {{ label }}
      <small v-if="small != ''">{{ small }}</small>
    </label>
    <input type="text" class="form-control" v-model="value" :placeholder="'Enter '+label" />
    <p
      class="text-danger small mt-1"
      v-if="validation.hasError('value')"
    >{{ validation.firstError('value') }}</p>
  </div>
</template>

<script>
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
      if (n.trim() != "") {
        this.$emit("update_input", {
          old: o != "" ? _.get(this.options, "['message']['price']", 0) : 0,
          price: _.get(this.options, "['message']['price']", 0),
        });
      } else {
        this.$emit("update_input", {
          old: _.get(this.options, "['message']['price']", 0),
          price: 0,
        });
      }
    },
  },
  validators: {
    value: function (value) {
      return Validator.value(value).required();
    },
  },
  methods: {
    validate: function () {
      return this.$validate().then(
        function (success) {
          if (success) {
            return { ...this.options["message"], key: this.value };
          }
        }.bind(this)
      );
    },
    reset: function () {
      this.validation.reset();
    },
  },
};
</script>

<style>
</style>