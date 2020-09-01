<template>
  <div class="row" id="main">
    <div class="col-md-8">
      <div class="form-row mb-3">
        <div class="col-2">
          <label class="mt-2 d-block" for="title">Title</label>
        </div>
        <div class="col">
          <input
            class="form-control"
            id="title"
            v-model="form.title"
            type="text"
            placeholder="Enter Title"
          />
        </div>
      </div>
      <div class="form-row mb-3">
        <div class="col-2">
          <label class="mt-2 d-block" for="description">Description</label>
        </div>
        <div class="col">
          <textarea
            v-model="form.description"
            id="description"
            class="form-control"
            placeholder="Enter Description"
            rows="5"
          ></textarea>
        </div>
      </div>
      <div class="form-row mb-3">
        <div class="col-2">
          <label class="mt-2 d-block" for="price">Price (Rs.)</label>
        </div>
        <div class="col">
          <input
            class="form-control"
            id="price"
            v-model="form.price"
            type="text"
            placeholder="Enter Price"
          />
        </div>
      </div>
      <div class="vt-sec" v-if="variations.length > 0">
        <variationField
          v-for="(item, ind) in variations"
          :key="item.id"
          :has_last="ind != variations.length-1"
          @updateData="updateVariation($event, item.id)"
          @delete="deleteVariation(item.id)"
        />
      </div>
      <button class="btn btn-primary" @click="addVariation">Add Variation</button>
    </div>
    <div class="col-md-4">
      <div class="card shadow">
        <div class="card-header">
          <h5>Add Images</h5>
        </div>
        <div class="card-body">
          <draggable v-model="myArray" draggable=".item">
            <div v-for="element in myArray" :key="element.id" class="item">{{element.name}}</div>
            <button class="btn btn-primary" slot="footer">Add</button>
          </draggable>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import draggable from "vuedraggable";
import _ from "lodash";
import variationField from "./variation-fields";

export default {
  components: {
    draggable,
    variationField,
  },
  computed: {
    var_max() {
      let data = _.chain(this.variations)
        .map(function (o) {
          return _.has(o, "options") ? o.options : {};
        })
        .flatten()
        .map("price")
        .filter(function (val) {
          if (typeof val != "undefined") return true;
          return false;
        })
        .sortBy()
        .reverse()
        .take(1)
        .value();
      return data.length > 0 ? data[0] : 0;
    },
    var_min() {
      let data = _.chain(this.variations)
        .map(function (o) {
          return _.has(o, "options") ? o.options : {};
        })
        .flatten()
        .map("price")
        .filter(function (val) {
          if (typeof val != "undefined") return true;
          return false;
        })
        .sortBy()
        .take(1)
        .value();
      return data.length > 0 ? data[0] : 0;
    },
    price_range() {
      let main_price = (isNaN(this.form.price) ? 0 : this.form.price) * 1;
      let min = main_price + this.var_min;
      let max = main_price + this.var_max;
      min = min == 0 ? max : min;
      return min + (min < max ? " ~ " : "") + (min < max ? max : "");
    },
    variation_last_id() {
      return _.get(this.variations, [this.variations.length - 1, "id"], 0) + 1;
    },
  },
  watch: {
    // variations: function (val) {
    //   let var_price = _.chain(this.variations)
    //     .map(function (o) {
    //       return _.has(o, "options") ? o.options : {};
    //     })
    //     .flatten()
    //     .map("price")
    //     .filter(function (val) {
    //       if (typeof val != "undefined" && val > 0) return true;
    //       return false;
    //     })
    //     .sortBy()
    //     .take(1)
    //     .value();
    //   console.log(var_price);
    // },
  },
  data: function () {
    return {
      form: {
        title: "",
        desc: "",
        price: "",
      },
      variations: [],
      myArray: [
        {
          id: 1,
          name: "test 1",
        },
        {
          id: 2,
          name: "test 2",
        },
        {
          id: 3,
          name: "test 3",
        },
        {
          id: 4,
          name: "test 4",
        },
      ],
    };
  },
  methods: {
    addVariation() {
      this.variations.push({ id: this.variation_last_id });
    },
    deleteVariation(id) {
      this.$delete(this.variations, _.findIndex(this.variations, { id }));
    },
    updateVariation(data, id) {
      this.$set(this.variations, _.findIndex(this.variations, { id }), {
        id,
        ...data,
      });
    },
  },
};
</script>

<style scoped>
.vt-sec {
  border: 1px solid #d0d2e1;
  padding: 15px;
  border-radius: 8px;
  margin-bottom: 15px;
}
</style>