<template>
  <div id="v-app" class="form mt-4 mt-md-0">
    <div class="form-group">
      <label for="box-size">Chest Size</label>
      <select
        v-model="form.sel_size"
        id="box-size"
        class="form-control"
        :class="{'invalid': validation.hasError('form.sel_size')}"
      >
        <option value>Select Size</option>
        <option v-for="(item, ind) in sizes" :key="ind" :value="ind">{{ item.title }}</option>
      </select>
      <p
        class="text-danger small mt-1"
        v-if="validation.hasError('form.sel_size')"
      >{{ validation.firstError('form.sel_size') }}</p>
    </div>
    <div class="form-group">
      <label for>Quantity</label>
      <input
        type="number"
        v-model="form.qty"
        :class="{'invalid': validation.hasError('form.qty')}"
        class="form-control"
        min="1"
        max="10"
      />
      <p
        class="text-danger small mt-1"
        v-if="validation.hasError('form.qty')"
      >{{ validation.firstError('form.qty') }}</p>
    </div>
    <div class="form-row my-3 mx-0 gr-total">
      <div class="col">
        <label class="my-2">Grand Total</label>
      </div>
      <div class="col text-right">
        <label class="my-2">Rs. {{ pr_total }}/-</label>
      </div>
    </div>
    <div class="form-group">
      <label for>Delivery Date/Time</label>
      <div class="form-row mx-0">
        <div class="col">
          <input type="text" id="datepicker2" class="form-control" placeholder="Select Date" />
        </div>
        <div class="col">
          <select v-model="form.sel_time" class="form-control">
            <option value>Select Time</option>
            <option value="9am-12pm">Between 9am - 12pm</option>
            <option value="12pm-3pm">Between 12pm - 3pm</option>
            <option value="3pm-6pm">Between 3pm - 6pm</option>
            <option value="6pm-9pm">Between 6pm - 9pm</option>
          </select>
        </div>
        <div class="w-100"></div>
        <p
          class="text-danger small mt-1"
          v-if="validation.hasError('form.sel_date') || validation.hasError('form.sel_time')"
        >{{ validation.firstError('form.sel_date') || validation.firstError('form.sel_time') }}</p>
      </div>
    </div>
    <div class="form-group">
      <label for>Personal Message</label>
      <textarea name class="form-control" id rows="3" placeholder="Any comments ..."></textarea>
    </div>

    <div class="form-group">
      <button @click="submit" class="btn thm-btn">Add To Cart</button>
    </div>
  </div>
</template>

<script>
import prdMixin from "./mixins/floral_data.js";
import SimpleVueValidation from "simple-vue-validator";
const Validator = SimpleVueValidation.Validator;
export default {
  mixins: [prdMixin],
  computed: {
    pr_total: function() {
      const self = this;
      let pr = 0;
      if (self.form.sel_size !== "") {
        pr += self.sizes[self.form.sel_size].pr;
      }
      if (self.form.qty !== "") {
        if (!isNaN(self.form.qty) && !self.validation.hasError("form.qty")) {
          pr = parseInt(self.form.qty) * pr;
        }
      }
      return pr;
    }
  },
  mounted() {
    const self = this;
    $("#datepicker2")
      .datepicker({
        autoclose: true,
        startDate: new Date()
      })
      .on("changeDate", function(evt) {
        self.form.sel_date = evt.date;
      })
      .on("hide", function(evt) {
        if (typeof evt.date === "undefined") {
          self.form.sel_date = "";
        }
      });
  },
  data() {
    return {
      sizes: [
        {
          title: "Small (Rs.100)",
          pr: 100
        },
        {
          title: "Large (Rs.200)",
          pr: 200
        }
      ],
      form: {
        sel_size: "",
        qty: 1,
        sel_date: "",
        sel_time: ""
      }
    };
  },
  validators: {
    "form.sel_size": function(value) {
      return Validator.value(value).required();
    },
    "form.qty": function(value) {
      let validator = Validator.value(value).required();
      if (!validator.hasImmediateError()) {
        validator.custom(function() {
          const regex = new RegExp(/^([1-9]|10)$/);
          if (!regex.test(value)) {
            return "Order between (1 - 10)";
          }
        });
      }
      return validator;
    },
    "form.sel_date": function(value) {
      return Validator.value(value).required();
    },
    "form.sel_time": function(value) {
      return Validator.value(value).required();
    }
  },
  methods: {
    submit: function() {
      this.$validate().then(function(success) {
        if (success) {
          alert("Order Complete.");
        }
      });
    }
  }
};
</script>

<style lang="scss" scoped>
.gr-total {
  border-top: 1px solid #cacaca;
  border-bottom: 1px solid #cacaca;
}

.invalid {
  border-color: #dc3545;
}
</style>