<template>
  <div class="form-group">
    <label class="d-block" v-if="label != ''" for>
      {{ label }}
      <small v-if="small != ''">{{ small }}</small>
    </label>
    <div
      v-for="(opt, o_key, o_ind) in options"
      :key="o_ind"
      class="custom-control custom-radio custom-control-inline"
    >
      <input
        type="radio"
        :id="'rad-vrt-'+o_ind"
        :name="'rad-name-'+fm_ind"
        v-model="value"
        :value="o_key"
        class="custom-control-input"
      />
      <label class="custom-control-label" :for="'rad-vrt-'+o_ind">{{ opt['label'] }}</label>
    </div>
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
  props: {
    fm_ind: Number,
  },
};
</script>

<style>
</style>