<template>
  <div class="form-row mb-3">
    <div class="col-2">
      <h4 class="font-weight-light mt-1">Text Option</h4>
    </div>
    <div class="col">
      <input type="text" v-model="label" class="form-control" placeholder="Label" />
    </div>
    <div class="col">
      <input type="text" v-model="price" class="form-control" placeholder="Price" />
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.updateFields();
  },
  computed: {
    price_in_number() {
      return 1 * (isNaN(this.price) ? 0 : this.price);
    },
  },
  data: function () {
    return {
      label: "",
      price: "",
    };
  },
  watch: {
    label() {
      this.updateFields();
    },
    price_in_number(val) {
      this.updateFields();
    },
  },
  methods: {
    updateFields() {
      this.$emit("update", {
        label: this.label,
        price: this.price_in_number,
      });
    },
  },
};
</script>

<style>
</style>