<template>
  <div class="variation">
    <div class="form-row mb-3">
      <div class="col-2">
        <input type="text" class="form-control" placeholder="Label" />
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Small" />
      </div>
      <div class="col">
        <select v-model="select_type" class="form-control">
          <option value>Select Type</option>
          <option v-for="(item, ind) in types" :key="ind" :value="item.key">{{ item.value }}</option>
        </select>
      </div>
      <div class="col-md-1 d-flex align-items-center justify-content-end">
        <button class="btn btn-sm btn-danger" @click="deleteEmit">Delete</button>
      </div>
    </div>
    <optSelectField @update="updateTypeValues" :key="'select'" v-if="select_type == 'select'" />
    <optSelectField @update="updateTypeValues" :key="'radio'" v-else-if="select_type == 'radio'" />
    <optTextField @update="updateTypeValues" :key="'text'" v-else-if="select_type == 'text'" />
    <hr v-if="has_last" />
  </div>
</template>

<script>
import optSelectField from "./opt-select-field";
import optTextField from "./opt-text-field";
export default {
  props: {
    has_last: {
      default: false,
      type: Boolean,
    },
  },
  components: {
    optSelectField,
    optTextField,
  },
  mounted() {
    this.updateEmit();
  },
  data: function () {
    return {
      types: [
        {
          key: "text",
          value: "Text Field",
        },
        {
          key: "select",
          value: "Select Field",
        },
        {
          key: "radio",
          value: "Radio Field",
        },
      ],
      select_type: "",
      type_values: null,
    };
  },
  watch: {
    select_type() {
      this.type_values = null;
      this.updateEmit();
    },
    type_values() {
      this.updateEmit();
    },
  },
  methods: {
    deleteEmit() {
      this.$emit("delete");
    },
    updateTypeValues(values) {
      this.type_values = values;
    },
    updateEmit() {
      this.$emit("updateData", {
        type: this.select_type,
        options: this.type_values,
      });
    },
  },
};
</script>

<style>
</style>