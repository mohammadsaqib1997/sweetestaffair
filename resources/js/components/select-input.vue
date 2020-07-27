<template>
  <div class="form-group">
    <label v-if="label != ''" for>
      {{ label }}
      <small v-if="small != ''">{{ small }}</small>
    </label>
    <select class="form-control" :class="{'invalid': validation.hasError('value')}" v-model="value">
      <option value>Select {{ label }}</option>
      <option v-for="(opt, o_key, o_ind) in options" :key="o_ind" :value="o_key">{{ opt['label'] }}</option>
    </select>
    <p
      class="text-danger small mt-1"
      v-if="validation.hasError('value')"
    >{{ validation.firstError('value') }}</p>
  </div>
</template>

<script>
import inputMixin from "./mixins/input-mixin.js";
export default {
  mixins: [inputMixin],
};
</script>

<style>
</style>