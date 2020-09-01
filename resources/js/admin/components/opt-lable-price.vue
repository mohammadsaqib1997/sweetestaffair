<template>
  <div class="form-row mb-2">
    <div class="col">
      <input type="text" v-model="label" class="form-control" placeholder="Option Name" />
    </div>
    <div class="col">
      <input type="text" v-model="price" class="form-control" placeholder="Option Price" />
    </div>
    <div class="col-2">
      <button class="btn btn-sm btn-danger" v-if="length > 1" @click="deleteEmit">Delete</button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    length: {
      type: Number,
      default: 1,
    },
  },
  data: function () {
    return {
      label: "",
      price: "",
    };
  },
  mounted() {
    this.updateFields();
  },
  computed: {
    price_in_number() {
      return 1 * (isNaN(this.price) ? 0 : this.price);
    },
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
    deleteEmit() {
      this.$emit("delete");
    },
    updateFields() {
      this.$emit("optionUpdated", {
        label: this.label,
        price: this.price_in_number,
      });
    },
  },
};
</script>

<style>
</style>