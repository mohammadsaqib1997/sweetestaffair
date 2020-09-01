<template>
  <div class="form-row mb-3">
    <div class="col-2">
      <h4 class="font-weight-light mt-1">Options</h4>
    </div>
    <div class="col">
      <OptLabelPrice
        v-for="opt in opts"
        @optionUpdated="optionsSet($event, opt.id)"
        @delete="deleteOption(opt.id)"
        :key="opt.id"
        :length="opts.length"
      />
      <div class="text-right mt-2">
        <button class="btn btn-sm btn-primary" @click="addOption">Add</button>
      </div>
    </div>
  </div>
</template>

<script>
import OptLabelPrice from "./opt-lable-price";
import _ from "lodash";
export default {
  components: {
    OptLabelPrice,
  },
  computed: {
    last_id() {
      return _.get(this.opts, [this.opts.length - 1, "id"], 0) + 1;
    },
  },
  data: function () {
    return {
      opts: [
        {
          id: 1,
        },
      ],
    };
  },
  watch: {
    opts(val) {
      this.$emit("update", val);
    },
  },
  methods: {
    addOption() {
      this.opts.push({ id: this.last_id });
    },
    deleteOption(id) {
      this.$delete(this.opts, _.findIndex(this.opts, { id }));
    },
    optionsSet(data, id) {
      let ind = _.findIndex(this.opts, { id });
      this.$set(this.opts, ind, { ...this.opts[ind], ...data });
    },
  },
};
</script>

<style>
</style>